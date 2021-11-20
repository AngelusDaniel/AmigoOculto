<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteio extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(app\Models\User);
    }
    public function grupo(){
        return $this->belongsTo(app\Models\Grupo);
    }
}
