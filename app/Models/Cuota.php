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
        "N" => "No",
    ];

    /**
     * Asocia el cliente con la cuota
     *
     * @return void
     */
    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    /**
     * Devuelve la opción de pagado si existe, si no devuelve Sin asignar
     *
     * @return void
     */
    public function opcionesPagado()
    {
        if (isset($this->opPagado[$this->pagada])) {
            return $this->opPagado[$this->pagada];
        } else {
            return "Sin asignar";
        }
    }

    /**
     * Devuelve la fecha de pagado si existe, si no devuelve Sin asignar
     *
     * @return void
     */
    public function fechaPago()
    {
        if ($this->f_pago != null) {
            return date('d-m-Y', strtotime($this->f_pago));
        } else {
            return "Sin asignar";
        }
    }
}
