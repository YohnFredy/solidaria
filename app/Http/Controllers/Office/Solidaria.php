<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Solidaria extends Controller
{
    public function index(){
        return view('office.solidaria');
    }
}
