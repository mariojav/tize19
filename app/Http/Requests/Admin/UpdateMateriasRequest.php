<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMateriasRequest extends FormRequest
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
        return [
            'nombremateria' => 'required|max:100|unique:materias,nombremateria,'.$this->route('materia'),
            'codigomateria' => 'required|max:7|unique:materias,codigomateria,'.$this->route('materia'),
        ];
    }
}

