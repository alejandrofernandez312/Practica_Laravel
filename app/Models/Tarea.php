<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table = "tarea";
    protected $primaryKey = "tarea_id";
    protected $estados = [
        "F" => "Finalizado",
        "C" => "Cancelado",
        "P" => "Pendiente",
    ];

    /**
     * Asocia el cliente con la tarea
     *
     * @return void
     */
    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    /**
     * Asocia el empleado con la cliente
     *
     * @return void
     */
    public function Empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');

    }

    /**
     * Devuelve el estado de la tarea si existe, si no devuelve Sin asignar
     *
     * @return void
     */
    public function descripcionEstado()
    {
        if (isset($this->estados[$this->estado])) {
            return $this->estados[$this->estado];
        } else {
            return "Sin asignar";
        }
    }

    /**
     * Devuelve el empleado de la tarea si existe, si no devuelve Sin asignar
     *
     * @return void
     */
    public function asignarEmpleado()
    {
        if ($this->empleado != null) {
            return $this->empleado->nombre;
        } else {
            return "Sin asignar";
        }
    }

    /**
     * Devuelve la fecha de realización de la tarea si existe, si no devuelve Sin asignar
     *
     * @return void
     */
    public function fechaRealizacion()
    {
        if ($this->f_rea != null) {
            return date('d-m-Y', strtotime($this->f_rea));
        } else {
            return "Sin asignar";
        }
    }

    /**
     * Devuelve la fecha de realización de la tarea si existe, si no devuelve null (para a la hora de mostrar en la vista que no ponga fecha de 1970 por defecto)
     *
     * @return void
     */
    public function obtenerFechaRealizacion()
    {
        if ($this->f_rea != null) {
            return $this->f_rea;
        } else {
            return null;
        }
    }
}
