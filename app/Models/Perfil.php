<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $fillable = ['nome, sobrenome'];
    public function user(){
        return $this->belongsTo(app\Models\User);
    }
}
