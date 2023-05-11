<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'name' => 'required|regex:/^[A-Za-z]*\s?()[A-Za-z]*$/|string|max:30',
            'apellidopaterno' => 'required|alpha|string|max:30',
            'apellidomaterno' => 'alpha|string|max:30',
            'cedula' => 'required|numeric|digits_between:5,8|unique:users,cedula',
            'codigosiss' => 'required|numeric|digits_between:9,10|unique:users,codigosiss',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|regex:/^.*(?=.{4,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[.!$#%]).*$/',
            'roles' => 'required',
        ];
    }

}
