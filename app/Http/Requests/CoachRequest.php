<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoachRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255', 'digits:11', 'unique:coaches,mobile'],
            'status' => ['required', 'numeric', 'max:255', 'digits:1', 'min:0', 'max:1'],
            'email' => ['required', 'email', 'max:255', 'unique:coaches,email'],
        ];
    }
}
