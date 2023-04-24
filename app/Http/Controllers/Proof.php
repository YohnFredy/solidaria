<?php

namespace App\Http\Controllers;

use App\Models\Proof as ModelsProof;
use Illuminate\Http\Request;

class Proof extends Controller
{
    public function show(){
        $resul = ModelsProof::all();

        return view('proof', compact('resul'));
    }
}
