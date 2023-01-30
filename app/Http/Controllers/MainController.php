<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOption\None;

class MainController extends Controller
{

    /*
    * Retornar página principal da aplicação
    */
    public function index()
    {
        return view('main', ['view' => 'empty']);
    }
}
