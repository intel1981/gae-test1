<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigUser extends Model
{
    protected $table    = 'config_user';
    protected $fillable = ['user_id','ciclo_id', 'ciclo_periodo'];
    protected $dates    = ['created_at', 'updated_at'];
}
