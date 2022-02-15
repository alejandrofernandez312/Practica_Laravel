<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "cliente";
    protected $primaryKey = "cliente_id";

    public function Pais()
    {
        return $this->belongsTo(Pais::class);
    }
}
