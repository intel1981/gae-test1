<?php

namespace App\Http\Requests;

use App\Models\Ciclo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CicloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()){
            case 'GET':
            case 'DELETE':
            case 'POST':{
                return [
                    'inicio' => 'required|integer|digits:4|lt:fin|unique:ciclos',
                    'fin'    => 'required|integer|digits:4|gt:inicio|unique:ciclos'
                ];
            }
            case 'PATCH': {
                return [
                    'inicio' => [
                        'required',
                        'integer',
                        'digits:4',
                        'lt:fin',
                        Rule::unique('ciclos')->ignore($this->ciclo->id)
                    ],
                    'fin' => [
                        'required',
                        'integer',
                        'digits:4',
                        'gt:inicio',
                        Rule::unique('ciclos')->ignore($this->ciclo->id)
                    ],
                ];
            }
            case 'PUT':
            default: break;
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'inicio.required' => 'Obligatorio',
            'fin.required'    => 'Obligatorio',
            'inicio.unique'   => 'Ya existe',
            'fin.unique'      => 'Ya existe',
            'inicio.integer'  => 'Debe ser num. entero',
            'fin.integer'     => 'Debe ser num. entero',
            'inicio.digits'  => 'Deben ser 4 digitos',
            'fin.digits'     => 'Deben ser 4 digitos',
            'inicio.lt'       => ':input >= :value',
            'fin.gt'          => ':input <= :value',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [

        ];
    }
}
