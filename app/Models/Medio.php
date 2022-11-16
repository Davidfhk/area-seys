<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medio extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function conciertos()
    {
        return $this->belongsToMany(Concierto::class,'grupos_medios');
    }
}
