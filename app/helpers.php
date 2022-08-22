<?php

use Illuminate\Support\Facades\DB;

if (! function_exists('isExistsDB')) {
    function isExistsDB($email) : bool
    {
        if(DB::table('emails')->where('email', $email)->exists()){
            return true;
        } else return false;
    }
}
