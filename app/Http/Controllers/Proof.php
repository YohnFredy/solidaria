<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Proof as ModelsProof;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class Proof extends Controller
{

    public function create(){
        User::create([
            'name' => 'fredy',
            'apellido' => 'guapacha',
            'cedula' => 94154629,
            'email' => 'fredy.guapacha@gmail.com',
            'usuario' => 'master',
            'country_id' => 1,
            'state_id' => 1,
            'city' => 'Tuluá',
            'direccion' => 'calle busquela',
            'telefono' => 3145207814
        ]);

        Country::create([
            'name' => 'Colombia',
        ]);

        State::create([
            'country_id' => 1,
            'name' => 'Valle Del Cauca',
        ]);

    }





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
