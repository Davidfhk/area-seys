<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','cache'];

    public function conciertos()
    {
        return $this->belongsToMany(Concierto::class,'grupos_conciertos');
    }
}
