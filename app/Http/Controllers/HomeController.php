<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //frontend home page
    public function index(){
        return view('frontend.index');
    }//end method
}
