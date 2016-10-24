<?php

/*
 * 邮件发送接口
 */

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model {

    public static function send() {
        Mail::send('emails.welcome', array('key' => 'value'), function($message) {
            $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
        });
    }

}
