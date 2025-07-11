<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Candidatura;

class Candidato extends Model
{
    use SoftDeletes;
    
    protected $table = 'public.candidatos';
    protected $fillable = [
        'Nome','E-mail',
        'Telefone','Titulo_eleitor'
    ];

    public function politico(){
        return $this->hasOne(Candidatura::class, 'candidato_id');
    }
}
