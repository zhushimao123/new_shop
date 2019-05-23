<?php

namespace App\Http\Controllers\contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact.contact');
    }
    //执行
    public  function  sendmail()
    {
        var_dump($_POST);
    }
}
