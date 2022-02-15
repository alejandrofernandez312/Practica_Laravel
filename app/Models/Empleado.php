<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Empleado extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = "empleado";
    protected $primaryKey = "empleado_id";
    protected $cargos = [
        "A" => "Administrador",
        "O" => "Operario"
    ];

    public function descripcionTipo()
    {
        if(isset($this->cargos[$this->tipo])){
            return $this->cargos[$this->tipo];
        }else {
            return "Sin asignar";
        }
    }
}
