<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiangui extends Model
{
    use HasFactory;

    public function locales() {
        return $this->hasMany(Local::class, 'id_tianguis', 'id_tianguis');
    }
}
