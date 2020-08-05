<?php

namespace App\Http\Requests\userRequestForm;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestUser extends FormRequest
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
            'name'      => 'required|min:3|max:255',
            'email'     => 'required|unique:users|min:3|max:255',
            'password'  => 'required|min:3|max:255',
            'picture'   => 'min:3|max:255',

        ];
    }

    public function messages()
    {
        return[
            'required' => 'Поле: :attribute обязательно к заполнению..',
            'min' => 'Поле: :attribute минимальная длина :min символа',
            'max' => 'Поле: :attribute max длина :max символа',
            'unique' => 'Поле: :attribute такое имя есть в БД ',
        ];
    }
}
