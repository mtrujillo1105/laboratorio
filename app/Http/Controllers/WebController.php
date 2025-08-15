<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
    	return redirect('ensayos');
    }

    public function ensayos(){
    	return view('web.ensayos');
    }

    public function calibraciones(){
    	return view('web.calibraciones');
    }

    public function capacitaciones(){
    	return view('web.capacitaciones');
    }    
}
