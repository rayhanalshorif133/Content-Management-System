<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class FileUploadController extends Controller
{

    /**
     * @return Application|Factory|View
     */
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
            $path = 'upload/unknown';
        }

        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.' . $extension, '', $this->generateRandomString(10)); //file name without extenstion
            $fileName .= '_' . date('y_m_d_H_m_s') . '.' . $extension; // a unique file name
            $file->move($path, $fileName);
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
