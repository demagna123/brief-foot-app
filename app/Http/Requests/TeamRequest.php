<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:4000',
            'name'=>'required',
            'year_creation' =>'required',
        ];
    }

           public function messages(): array
    {
        return [
            
            'name.required' => 'the name is required',
            'year_creation.required' => 'the year_creation is required'
        ];
    }
}
