<?php

namespace App\Http\Controllers;

use App\Models\Admin\Nivel;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Filtrar los servicios de acuerdo al nivel elegido.
     * Relacion NIVELES:SERVICIOS
     * Lado Muchos: Un nivel esta asociado con muchos servicios
     *
     * @param  int  $nivel_id
     * @return \Illuminate\Http\Response
     */
    public function servnivel($nivel_id)
    {
        return response()->json([
           'servicios' => Nivel::find($nivel_id)->servicios()->with('nivel','tipo')->get()
        ]);
    }
}
