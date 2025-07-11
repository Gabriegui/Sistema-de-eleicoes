<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Candidatura;

class Cargo extends Model
{
    use SoftDeletes;

    protected $table = 'public.cargos';
    protected $fillable = ['Descricao'];

    public function politico(){
        return $this->hasOne(Candidatura::class, 'cargo_id');
    }
}
