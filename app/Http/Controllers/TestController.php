<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;

class TestController extends Controller
{


    public function sendMail(){
        Helper::introMail('tayyab', 'jesaxet782@svcache.com');
    

    }
     
}
