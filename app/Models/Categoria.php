<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public function comerciantes() {
        return $this->hasMany(Comerciante::class, 'id_categoria', 'id_categoria');
    }
}
