<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmigoSecreto extends Model
{
    use HasFactory;
    
    protected $fillable = ['perfil_id', 'perfilsorteado_id', 'grupo_id'];

    public function perfil(){
        return $this->belongsTo(perfil::class);
    }
    public function grupoSorteio(){
        return $this->belongsTo(GrupoSorteio::class);
    }
}