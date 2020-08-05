<?php

namespace App\Http\Requests\shopRequestForm;

use Illuminate\Foundation\Http\FormRequest;

class FormEditRequestCategory extends FormRequest
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
                'category'    => 'required|unique:categories|min:3|max:64',
                'category_id' => 'min:1|max:255',
        ];
    }

    public function messages()
    {
        return[

            'required' => 'Поле: :attribute обязательно к заполнению..',
            'min'      => 'Поле: :attribute минимальная длина :min символов',
            'max'      => 'Поле: :attribute max длина :max символов',
            'unique' =>   'Поле: :attribute вы не изменили название категории ',
        ];
    }
}