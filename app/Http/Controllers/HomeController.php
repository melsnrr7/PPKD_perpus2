<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index1(){
        return view('admin.dashboard');
    }
    public function index2(){
        return view('operator.dashboard');
    }
    public function index3(){
        return view('kepsek.dashboard');
    }
}
