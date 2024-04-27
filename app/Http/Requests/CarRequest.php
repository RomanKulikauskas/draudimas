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
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'reg_number'=>'required|min:5|max:5',
            'brand'=>'required|min:3|max:16',
            'model'=>'required|min:3|max:16',
        ];
    }

    public function messages()
    {
        return  [
            'reg_number.required'=>__('Registracinis numeris yra privalomas'),
            'reg_number.min'=>__('Turi būti 5 simbolių ilgio'),
            'brand'=>__('Brendas yra privalomas ir turi būti nuo 3 iki 32 simbolių ilgio'),
            'model'=>__('Modelis yra privalomas ir turi būti nuo 3 iki 32 simbolių ilgio'),
            'owner'=>__('Sąvininkas yra privalomas')
        ];
    }

}
