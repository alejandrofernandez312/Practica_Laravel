<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{

    protected $redirectRoute = 'clientes.añadirCliente';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:3|max:255',
            'cif' => 'required|unique:cliente',
            'telefono' => 'required',
            'email' => 'required|email|unique:cliente',
            'cuenta_corriente' => 'required',
            'importe' => 'numeric'
        ];
    }
}
