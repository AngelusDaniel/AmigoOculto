<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmGrupo extends Model
{
    use HasFactory;
    public function grupo(){
        return $this->belongsTo(app\Models\Grupo);
    }
}
