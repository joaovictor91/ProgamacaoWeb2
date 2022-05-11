<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forncedor extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'telefone', 'logadouro',
                             'cep', 'cidade', 'estado', 'nome_fantasia', 'produto_id'];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }                        
                             
}
