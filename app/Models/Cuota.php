<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    use HasFactory;
    protected $table = "cuota";
    protected $primaryKey = "cuota_id";
    protected $opPagado = [
        "S" => "Si",
        "N" => "No"
    ];

    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function opcionesPagado()
    {
        if(isset($this->opPagado[$this->pagada])){
            return $this->opPagado[$this->pagada];
        }else {
            return "Sin asignar";
        }
    }
}
