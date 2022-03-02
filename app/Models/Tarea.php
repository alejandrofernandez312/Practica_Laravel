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
        "P" => "Pendiente"
    ];


    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function Empleado()
    {
            return $this->belongsTo(Empleado::class, 'empleado_id');

    }

    public function descripcionEstado()
    {
        if(isset($this->estados[$this->estado])){
            return $this->estados[$this->estado];
        }else {
            return "Sin asignar";
        }
    }

    public function asignarEmpleado()
    {
        if($this->empleado!=null){
            return $this->empleado->nombre;
        }else {
            return "Sin asignar";
        }
    }

    public function fechaRealizacion()
    {
        if($this->f_rea!=null){
            return date('d-m-Y', strtotime($this->f_rea));
        }else {
            return "Sin asignar";
        }
    }

    public function obtenerFechaRealizacion()
    {
        if($this->f_rea!=null){
            return date('d-m-Y', strtotime($this->f_rea));
        }else {
            return null;
        }
    }
}
