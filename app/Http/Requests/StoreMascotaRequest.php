<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMascotaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'slug'              => 'required|string|min:2|max:255|unique:mascotas,slug',
            'nombre'            => 'required|string|min:2|max:255',
            'tipo'              => 'required|string',
            'edad'              => 'required|integer|min:0|max:25',
            'fecha_nacimiento'  => 'required|date',
            'sexo'              => 'required|string',

        ];
    }

    public function messages()
    {
        return [
            'nombre' => 'Como va tener su mascota sin nombre boludo' 
        ];
    }

    public function attributes()
    {
        return [
            'nombre'    => 'Nombre de mascota',
            'slug'      => 'slug a mostrar'
        ];
    }
}
