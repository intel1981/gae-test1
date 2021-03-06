<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciclo extends Model
{
    use SoftDeletes;

    protected $table    = 'ciclos';
    protected $fillable = ['inicio', 'fin', 'status'];
    protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
    protected $casts    = ['status' => 'boolean'];

    public function getPeriodoAttribute(){
        return "{$this->inicio} - {$this->fin}";
    }
}
