<?php

namespace App\Models;

use App\Models\Admin\Nivel;
use App\Models\Admin\Servicio;
use App\Models\Admin\Tipo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Escuela extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'escuelas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cct', 'incorporacion', 'nombre', 'tipo_id', 'nivel_id', 'servicio_id',
        'turno', 'sostenimiento', 'calle', 'exterior', 'interior', 'entrecalles',
        'colonia', 'codpost', 'pais', 'entidad', 'municipio', 'localidad', 'status'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status'   => 'boolean'
    ];

    /**
     * Pone en mayusculas las letras de la clave del centro de trabajo
     *
     * @param  string  $value
     * @return void
     */
    public function setCctAttribute($value)
    {
        $this->attributes['cct'] = mb_strtoupper($value);
    }

    /**
     * Mutator
     * Establece el status de la escuela. 1=true, 0= false
     * Sucede cuando el valor no existe o no se envia por el Request
     *
     * @param  string  $value
     * @return void
     */
    public function setStatusAttribute($value)
    {
        if(isset($value)){
            $this->attributes['status'] = $value;
        }
        else{
            $this->attributes['status'] = false;
        }
    }

    /*
     * Relacion: TIPOS:ESCUELAS (1:M)
     * Lado M
     * Obtener el tipo al que pertenece esta escuela
     */
    public function tipo(){
        return $this->belongsTo(Tipo::class,'tipo_id','id');
    }

    /*
     * Relacion: NIVELES:ESCUELAS (1:M)
     * Lado M
     * Obtener el nivel al que pertenece esta escuela
     */
    public function nivel(){
        return $this->belongsTo(Nivel::class,'nivel_id','id');
    }

    /*
     * Relacion: SERVICIOS:ESCUELAS (1:M)
     * Lado M
     * Obtener el servicio al que pertenece esta escuela
     */
    public function servicio(){
        return $this->belongsTo(Servicio::class,'servicio_id','id');
    }
}
