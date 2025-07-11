<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eleicao extends Model
{
    use SoftDeletes;
    
    protected $table = 'public.eleicoes';
    protected $fillable = ['Ano', 'Descricao'];

}
