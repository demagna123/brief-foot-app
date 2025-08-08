<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoalRequest extends FormRequest
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
        'matche_team_id' => 'required',
        'player_id' =>'required',
        'minutes' => 'nullable|integer|min:0|max:120',
        'secondes' => 'nullable|integer|min:0|max:59',        ];
    }
}
