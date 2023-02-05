<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateListingRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'area'=> 'required | in:Αθήνα,Θεσσαλονίκη,Πάτρα,Ηράκλειο',
            'availability'=> 'required | in:ενοικίαση,πώληση',
            'size'=> 'required|integer|between:20,1000',
            'price'=> 'required|integer|between:50,5000000',
            'active'=> 'required|boolean',
        ];
    }
}
