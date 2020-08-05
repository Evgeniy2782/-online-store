<?php

namespace App\Http\Requests\shopRequestForm;
use Illuminate\Foundation\Http\FormRequest;


class FormRequestCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //return auth->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category' => 'required|unique:categories|min:3|max:64',
        ];
    }

    public function messages()
    {
        return[

            'required' => 'Поле: :attribute обязательно к заполнению..',
            'min' => 'Поле: :attribute минимальная длина :min символов',
            'max' => 'Поле: :attribute max длина :max символов',
            'unique' => 'Поле: :attribute такое имя есть в БД ',
        ];
    }

}
