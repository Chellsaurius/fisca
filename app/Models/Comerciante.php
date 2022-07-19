<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comerciante extends Model
{
    use HasFactory;

    public function categoria() {
        return $this->belongsTo(Categoria::class,'id_categoria', 'id_categoria');
    }

    public function pago() {
        return $this->hasMany(Pago::class, 'id_comerciante', 'id_comerciante');
    }

    
}
