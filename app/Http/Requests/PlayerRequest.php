<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'team_id' =>'required',
            'name' =>'required',
            'age' =>'nullable',
            'size'=>'nullable',
            'speed' =>'nullable',
            'country' =>'required'

        ];
    }

       public function messages(): array
    {
        return [
            'team_id.required' =>'the team is required',
            'name.required' => 'the name is required',
            'country.required' => 'the country is required'
        ];
    }
}
