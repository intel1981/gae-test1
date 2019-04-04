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
        $tipos = Tipo::select('id as value', 'nombre as text')
                 ->orderBy('id','asc')
                 ->get()
                 ->toArray();
        array_unshift($tipos,['value' =>'', 'text' => '']);
        return $tipos;

//        return response()->json([
//            'tipos' => Tipo::orderBy('id','asc')->get()
//        ]);
    }
}
