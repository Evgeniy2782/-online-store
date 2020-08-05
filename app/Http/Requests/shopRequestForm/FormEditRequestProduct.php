<?php

namespace App\Http\Requests\shopRequestForm;

use Illuminate\Foundation\Http\FormRequest;

class FormEditRequestProduct extends FormRequest
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
            'item'         => 'min:3|max:64',
            'description'  => 'min:3|max:255',
            'price'        => 'min:1',
            'picture'      => 'mimes:jpeg,jpg,png|max:1000',
            'category_id'  => 'min:1|max:255',
            'active'       => 'min:1',
        ];
    }

    public function messages()
    {
        return[
            'max'      => 'Поле: :attribute max размер :max символа',
            'size'     => 'Поле: :attribute max размер файла :size  kB',
            'mimes'    => 'Поле: :attribute проверте что фото имеет формат: jpeg,jpg,png',
            'min'      => 'Поле: :attribute минимальная длина :min символов',
        ];
    }
}