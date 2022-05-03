<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $filable = ['nome' , 'descricao', 'categoria_id'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
