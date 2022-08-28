<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    { 
        return $rules = [
            'fio' => 'required|min:3|max:255',
            'phone'=> 'required|integer|min:3|max:255|unique:contacts',
            'email'=> 'required|min:5|unique:contacts',
            'company_name' => 'string',
            'birth_date' => 'date',
            'foto' => 'string|min:3|max:255',
         ];
        
    }

    public function messages() {
        return [
            'required' => 'Поле :attribute обязательно для ввода',
            'min' => 'Поле :attribute должно содержать минимум :min символа',
            'max' => 'Поле :attribute должно содержать минимум :max символа',
            'string' => 'Поле :attribute должно содержать текстовое значение',
            'email' => 'Поле :attribute должно содержать email',
            'integer' => 'Поле :attribute должно содержать числовое значение без специальных символов',
            'date' => 'Полу :attribute должно содержать дату в числовом формате ГГГГ-ММ-ДД'
        ];
    }
}
