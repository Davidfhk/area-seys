<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concierto extends Model
{
    use HasFactory;
    protected $fillable = ['id_promotor','id_recinto','nombre','numero_espectadores','fecha','rentabilidad'];

    public function promotor()
    {
        return $this->belongsTo(Promotor::class);
    }

    public function recinto()
    {
        return $this->belongsTo(Recinto::class);
    }

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class);
    }

    public function medios()
    {
        return $this->belongsToMany(Medio::class);
    }
}
