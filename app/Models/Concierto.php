<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concierto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['promotor_id','recinto_id','nombre','numero_espectadores','fecha','rentabilidad'];

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
        return $this->belongsToMany(Grupo::class,'grupos_conciertos');
    }

    public function medios()
    {
        return $this->belongsToMany(Medio::class,'grupos_medios');
    }
}
