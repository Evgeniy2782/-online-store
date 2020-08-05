<?php

namespace App\Http\Requests\shopRequestForm;
use Illuminate\Foundation\Http\FormRequest;

class FormRequestProduct extends FormRequest
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

            'item'         => 'required|unique:products|min:3|max:64',
            'description'  => 'required|min:3|max:255',
            'price'        => 'required',
            'picture'      => 'mimes:jpeg,jpg,png|max:1500',
            'category_id'  => 'required|min:1|max:255',

        ];
    }

    public function messages()
    {
        return[

            'required' => 'Поле: :attribute обязателен к заполнению..',
            'min'      => 'Поле: :attribute минимальная длина :min символов',
            'max'      => 'Поле: :attribute max размер :max символа',
            'unique'   => 'Поле: :attribute такое имя есть в БД ',
            'size'     => 'Поле: :attribute max размер файла :size  kB',
            'mimes'    => 'Поле: :attribute проверте что фото имеет формат: jpeg,jpg,png'
            
        ];
    }


}