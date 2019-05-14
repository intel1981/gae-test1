<?php

namespace App\Http\Controllers;
use App\Models\Admin\Tipo;

class NivelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Filtrar los niveles de acuerdo al tipo de servicio elegido.
     * Relacion TIPOS-NIVELES
     * Lado Muchos: Un tipo de servicio esta asociado con muchos niveles de escuela
     *
     * @param  int  $tipo_id
     * @return \Illuminate\Http\Response
     */
    public function niveltipo($tipo_id){

        $niveles = Tipo::find($tipo_id)->niveles()
                   ->select(['id as value','nombre as text'])->get()->toArray();

        array_unshift($niveles, ['value' => '', 'text' => '']);

        return $niveles;

    }
}
