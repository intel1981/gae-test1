<?php

namespace App\Http\Controllers;

use App\Models\Admin\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /*
     * Obtener todos los registros de la tabla TIPOS
     *
     * @return \Illuminate\Http\Response
     */
    public function tipos(){

        return response()->json([
            'tipos' => Tipo::orderBy('id','asc')->get()
        ]);
    }
}
