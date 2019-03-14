<?php

namespace App\Models;

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
     * Pone en mayusculas el nombre de la escuela.
     *
     * @param  string  $value
     * @return void
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value);
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
}
