<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'skill' => 'required',
            'experience' => 'required',
        ];
    }

    // public function message(): array{
    //     return[
    //         'skill.required' => 'ce champ doit etrev remplit',
    //         'experience.required' => 'ce champ doit etrev remplit',
    //     ];
    // }
}
