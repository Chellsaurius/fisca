<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    public function tiangui() {
        return $this->belongsTo(Tiangui::class, 'id_tiangui', 'id_tiangui');
    }
}
