<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'msisdn',
        'opr',
        'channel',
        'service',
        'subs_source',
        'unsubs_source',
        'browser',
        'entry',
        'last_update',
        'sub_service',
        'subs_date',
        'unsubs_date',
        'shortcode',
        'flag',
        'status',
        'created',
        'modified',
    ];


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
}
