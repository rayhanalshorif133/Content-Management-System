<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Illuminate\Support\Facades\Cookie;


class FileUploadController extends Controller
{



    public function index()
    {
        return view('upload-file.index');
    }

    public function uploadFiles(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        // get path of uploaded file
        if ($request->hasHeader('path')) {
            $path = $request->header('path');
        } else {
            $path = 'upload/temp-data';
        }

        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.' . $extension, '', $this->generateRandomString(10)); //file name without extenstion
            $fileName .= '_' . date('d_m_y_h_m_s') . '__user_id-'. Auth::user()->id . '.' . $extension; // a unique file name
            $file->move($path, $fileName);

            // set cokkie directory

            // $info = [
            //     'filename' => $fileName,
            //     'user_id' => Auth::user()->id,
            //     'status' => 'uploaded'
            // ];
            // setcookie('content_is_file', json_encode($info), time() + 300, "/"); 


            return [
                'path' => asset($path . '/' . $fileName),
                'filename' => $fileName,
                'storage_path' => $path . '/' . $fileName,
            ];
        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

    function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
}
