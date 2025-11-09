<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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

    //: pending/in-progress/completed
    public function rules(): array
    {
        return [
            'title' =>['required','string','max:255'],
            'description'=>['required','string'], 
            'status'=>['sometimes', Rule::in(['pending','in-progress','completed'])],
            'user_id'=>['required'],
        ];
    }
}
