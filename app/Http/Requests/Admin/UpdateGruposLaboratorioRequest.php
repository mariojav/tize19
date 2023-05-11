<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGruposLaboratorioRequest extends FormRequest
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
            'nombregrupolab' => 'required|max:20|unique:grupos_laboratorio,nombregrupolab,'.$this->route('gruposLaboratorio'),
            'diagrupo' => 'required',
            'horagrupo' => 'required',
        ];
    }
}
