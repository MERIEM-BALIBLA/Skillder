<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnoucmentRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'company_id' => 'required'
        ];
    }

    public function message(): array{
        return[
            'title.required'=>'ce champ doit etrev remplit',
            'content.required'=>'ce champ doit etrev remplit',
            'company_id.required'=>'ce champ doit etrev remplit',
        ];
    }
}
