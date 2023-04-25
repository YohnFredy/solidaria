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



    public function upload(Request $request)
    {
        /* $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName); */

        // obtén el nombre original del archivo cargado
        $nombreImagen = $request->file('imagen')->getClientOriginalName();

        // mueve la imagen cargada desde el formulario a la ruta especificada con el mismo nombre original
        $request->file('imagen')->move(public_path('img'), $nombreImagen);

        return response()->json(['mensaje' => 'La imagen ha sido guardada con éxito']);

    }
}
