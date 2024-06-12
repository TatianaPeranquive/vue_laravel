<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $filiable = ['user_id','fecha', 'cantidad', 'estado'];

    /**
     * Cajero Test
     *
     */
    public function users() {
        return $this->belongsTo(User::class);
    }
}
