<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
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
        'cct', 'nombre', 'nivel', 'turno', 'sostenimiento', 'status'
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
     * Pone en minusculas el nombre de la escuela.
     *
     * @param  string  $value
     * @return void
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtolower($value);
    }

    /**
     * Mutator
     * Establece el status de la escuela. 1=true, 0= false
     *
     * @param  string  $value
     * @return void
     */
    public function setStatusAttribute($value)
    {
        if(isset($value)){
            $this->attributes['status'] = true;
        }
        else{
            $this->attributes['status'] = false;
        }

    }
}
