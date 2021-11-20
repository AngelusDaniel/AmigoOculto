<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $fillable = ['status'];
    public function user(){
        return $this->hasMany(app\Models\User);
    }
    public function admgrupo(){
        return $this->hasMany(app\Models\AdmGrupo);
    }
    public function sorteio(){
        return $this->belongsTo(app\Models\Sorteio);
    }
}
