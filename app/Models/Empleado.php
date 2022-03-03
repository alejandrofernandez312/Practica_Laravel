<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Empleado extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = "empleado";
    protected $primaryKey = "empleado_id";
    protected $cargos = [
        "A" => "Administrador",
        "O" => "Operario",
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

    /**
     * Devuelve el tipo si existe, si no devuelve Sin asignar
     *
     * @return void
     */
    public function descripcionTipo()
    {
        if (isset($this->cargos[$this->tipo])) {
            return $this->cargos[$this->tipo];
        } else {
            return "Sin asignar";
        }

    }

    /**
     * Devuelve true si es administrador
     *
     * @return bool
     */
    public function esAdministrador(): bool
    {
        return $this->tipo == 'A';
    }

    /**
     * Devuelve true si es administrador
     *
     * @return bool
     */
    public function esOperario(): bool
    {
        return $this->tipo == 'O';
    }
}
