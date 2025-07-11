<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Candidatura;

class Status extends Model
{
    use SoftDeletes;
    
    protected $table = 'public.status';
    protected $fillable = ['Descricao'];

    public function politico(){
        return $this->hasOne(Candidatura::class, 'status_id');
    }
}
