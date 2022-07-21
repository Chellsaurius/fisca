<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    public function tiangui() {
        return $this->belongsTo(Tiangui::class, 'id_tianguis', 'id_tianguis');
    }

    public function pago() {
        return $this->hasMany(Pago::class, 'id_local', 'id_local');
    }
}
