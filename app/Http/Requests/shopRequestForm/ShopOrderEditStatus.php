<?php

namespace App\Http\Requests\shopRequestForm;

use Illuminate\Foundation\Http\FormRequest;

class ShopOrderEditStatus extends FormRequest
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
            'status_id' => 'max:255',
        ];
    }

    public function messages()
    {
        return[

            'max'      => 'Поле: :attribute max размер :max',
          
        ];
    }
}
