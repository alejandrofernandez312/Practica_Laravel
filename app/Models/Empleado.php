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

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'avatar',
        'external_id',
        'external_auth',
        'tipo',
        'f_alta',
        'dni',
        'telefono',
        'direccion',
    ];

    public function descripcionTipo()
    {
        if(isset($this->cargos[$this->tipo])){
            return $this->cargos[$this->tipo];
        }else {
            return "Sin asignar";
        }

    }

    public function esAdministrador() :bool {
        // $administradores=['A', 'C', 'J', 'Q'];
        // return in_array($this->tipo, $administradores);
        return $this->tipo=='A';
    }

    public function esOperario() :bool {
        // $administradores=['A', 'C', 'J', 'Q'];
        // return in_array($this->tipo, $administradores);
        return $this->tipo=='O';
    }
}
