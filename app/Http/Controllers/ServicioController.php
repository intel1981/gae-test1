<?php

namespace App\Http\Controllers;

use App\Models\Admin\Nivel;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $servicios = Nivel::find($nivel_id)->servicios()
                     ->select(['id as value', 'nombre as text'])->get()->toArray();

        array_unshift($servicios, ['value' => '', 'text' => '']);

        return $servicios;
    }
}
