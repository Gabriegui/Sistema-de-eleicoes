<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Candidato;
use App\Models\Cargo;
use App\Models\Partido;
use App\Models\Status;

class Candidatura extends Model
{
    use SoftDeletes;

    protected $table = 'public.candidaturas';
    protected $fillable = [
        'candidato_id', 'partido_id', 'Nome_urna',
        'Numero_urna', 'cargo_id', 'status_id'
    ];

    public function candidato(){
        return $this->belongsTo(Candidato::class, 'id');
    }

    public function partido(){
        return $this->belongsTo(Partido::class, 'id');
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class, 'id');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'id');
    }
}
