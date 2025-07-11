<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Candidatura;

class Partido extends Model
{
    use SoftDeletes;
    
    protected $table = 'public.partidos';
    protected $fillable = ['Nome', 'Sigla'];

    public function politico(){
        return $this->hasOne(Candidatura::class, 'partido_id');
    }
}
