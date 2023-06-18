<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $msisdn = "";
        if (isset($_SERVER['HTTP_X_UP_CALLING_LINE_ID'])) {
            $msisdn = trim($_SERVER['HTTP_X_UP_CALLING_LINE_ID']);
        } else if (isset($_SERVER['HTTP_X_HTS_CLID'])) {
            $msisdn = trim($_SERVER['HTTP_X_HTS_CLID']);
        } else if (isset($_SERVER['HTTP_MSISDN'])) {
            $msisdn = trim($_SERVER['HTTP_MSISDN']);
        } else if (isset($_COOKIE['User-Identity-Forward-msisdn'])) {
            $msisdn = $_COOKIE['User-Identity-Forward-msisdn'];
        } else if (isset($_SERVER["HTTP_X_MSISDN"])) {
            $msisdn = $_SERVER["HTTP_X_MSISDN"];
        }
        // set cookie
        setcookie('msisdn', $msisdn, time() + (86400 * 30), "/"); // 86400 = 1 day

       
    }


  

    public function get_msisdn()
    {
        if (isset($_COOKIE['msisdn'])) {
            // true, cookie is set
            return $_COOKIE['msisdn'];
        } else {
            // false, cookie is not set
            return "";
        }
    }

    public function get_opr()
    {
        $phoneNum = $this->get_msisdn();
        $opr = substr($phoneNum, 0, 5);
        if (
            $opr == '88017' ||
            $opr == '88013'
        ) {
            $opr = 'GP';
        } else if (
            $opr == '88018'
            || $opr == '88016'
        ) {
            $opr = 'Robi';
        } else if (
            $opr == '88019'
            || $opr == '88014'
        ) {
            $opr = 'BLink';
        } else if (
            $opr == '88015'
        ) {
            $opr = 'Taletalk';
        } else {
            $opr = 'NA';
        }
        return $opr;
    }

    public function getIPAddress()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }



    // For Web Session message
    protected function flashMessageSuccess($message, $class = 'success')
    {
        Session::flash('message', $message);
        Session::flash('class', $class);
    }

    protected function flashMessageError($message, $class = 'danger')
    {
        Session::flash('message', $message);
        Session::flash('class', $class);
    }

    protected function flashMessageValidatorError($errors, $class = 'danger')
    {
        foreach ($errors as $key => $value) {
            $errors[$key] = $value[0];
        }
        // make a message
        $message = '';
        foreach ($errors as $key => $value) {
            $message .= $value . ' ';
        }
        Session::flash('message', $message);
        Session::flash('class', $class);
    }

    // For API
    protected function respondWithSuccess($message = '', $data = [], $code = 200)
    {
        return response()->json([
            'status'   => true,
            'errors'  => false,
            'message'  => $message,
            'data'     => $data
        ], $code);
    }
    protected function respondWithError($message, $data = [], $code = 203)
    {
        return response()->json([
            'status'   => false,
            'errors'  => true,
            'message'  => $message,
            'data'     => $data
        ], $code);
    }

    protected function getRandomBadge()
    {
        $badges = [
            "primary",
            "secondary",
            "success",
            "danger",
            "warning",
            "info",
        ];
        return $badges[rand(0, count($badges) - 1)];
    }
}
