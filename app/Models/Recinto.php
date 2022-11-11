<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recinto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','coste_alquiler','precio_entrada'];

    public function conciertos()
    {
        return $this->hasMany(Conciertos::class);
    }
}
