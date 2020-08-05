<?php

namespace App\Http\Requests\shopRequestForm;

use Illuminate\Foundation\Http\FormRequest;

class FormEditRequestUser extends FormRequest
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
            'name'                 => 'min:3|max:64',
            'email'                => 'min:3|max:255',
            'new_password'         => 'min:8|max:255',
            'password'             => 'same:new_password',
            'active'               => 'min:1',
            'right'                => 'min:3|max:255',
            'picture'              => 'mimes:jpeg,jpg,png|max:1000',

        ];
    }

    public function messages()
    {
        return[
            'max'      => 'Поле: :attribute max размер :max КБ',
            'size'     => 'Поле: :attribute max размер файла :size  kB',
            'mimes'    => 'Поле: :attribute проверте, что фото имеет формат: jpeg,jpg,png',
            'min'      => 'Поле: :attribute минимальная длина :min',
            'same'     => 'Пароли не совпадают',
        ];
    }

}
