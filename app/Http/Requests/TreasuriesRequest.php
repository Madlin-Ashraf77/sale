<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class TreasuriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'is_master'=>'required',
            'last_isal_exhcange'=>'required|integer|min:0',
            'last_isal_collect'=>'required|integer|min:0',
            'active'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'The treasuries name is required',
            'is_master.required'=>'The type of master is required',
            'active.required'=>'The ststus of master is required',
            'last_isal_exhcange.required'=>'The last cash receipt number of this treasury is required',
            'last_isal_exhcange.integer'=>'The last cash receipt number of this treasury is integer number',
            'last_isal_collect.required'=>'The last cash collect number of this treasury is required',
            'last_isal_collect.integer'=>'The last cash collect number of this treasury is integer number',
        ];
    }
}
