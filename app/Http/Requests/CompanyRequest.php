<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required',
            'company_role' => 'required',
            'address' => 'required'
        ];
    }

    public function message(): array{
        return[
            'company_name.required'=>'ce champ doit etrev remplit',
            'company_role.required'=>'ce champ doit etrev remplit',
            'address.required'=>'ce champ doit etrev remplit',
        ];
    }
}
