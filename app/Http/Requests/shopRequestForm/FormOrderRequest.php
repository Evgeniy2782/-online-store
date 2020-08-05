<?php

namespace App\Http\Requests\shopRequestForm;

use Illuminate\Foundation\Http\FormRequest;

class FormOrderRequest extends FormRequest
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
            'name'         => 'required|min:3|max:64',
            'patronymic'   => 'required|min:3|max:255',
            'surname'      => 'required|min:3|max:255',
            'pfone'        => 'required|min:17|max:17',
            'city'         => 'required|min:3|max:255',
            'street'       => 'required|min:3|max:255',
            'house'        => 'required|min:1|max:255',
            'flat'         => 'required|min:1|max:255',
            'floor'        => 'required|min:1|max:255',
        ];
    }

    public function messages()
    {
        return[

            'required' => 'Поле: :attribute обязателен к заполнению..',
            'min'      => 'Поле: :attribute длина :min символов',
            'max'      => 'Поле: :attribute max длина :max символов',

        ];
    }
}