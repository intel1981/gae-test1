<?php

namespace App\Http\Controllers;

use App\Models\Admin\Tipo;

class NivelController extends Controller
{
    /**
     * Filtrar los niveles de acuerdo al tipo de servicio elegido.
     * Relacion TIPOS-NIVELES
     * Lado Muchos: Un tipo de servicio esta asociado con muchos niveles de escuela
     *
     * @param  int  $tipo_id
     * @return \Illuminate\Http\Response
     */
    public function niveltipo($tipo_id){
        return response()->json([
            'niveles' => Tipo::find($tipo_id)->niveles()->with('tipo')->get()
        ]);
    }
}
