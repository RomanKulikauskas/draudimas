<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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

    public function messages()
    {
        return  [
            'reg_number'=>'Registracinis numeris yra privalomas ir turi būti 5 simbolių ilgio',
            'brand'=>'Brendas yra privalomas ir turi būti nuo 3 iki 32 simbolių ilgio',
            'model'=>'Modelis yra privalomas ir turi būti nuo 3 iki 32 simbolių ilgio',
            'owner'=>'Sąvininkas yra privalomas',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'reg_number'=>'required|min:5|max:5',
            'brand'=>'required|min:3|max:32',
            'model'=>'required|min:3|max:32',
            'owner'=>'required'
        ];
    }
}
