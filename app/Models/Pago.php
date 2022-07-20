<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    public function comerciante() {
        return $this->belongsTo(Comerciante::class,'id_comerciante', 'id_comerciante');
    }

    public function local() {
        return $this->belongsTo(Local::class, 'id_local', 'id_local');
    }
}
