<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOption\None;

class MainController extends Controller
{
    public function index(){

        return view('main', ['view' => 'empty']);
    }
}
