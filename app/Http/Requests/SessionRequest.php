<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
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
            'name'=> ['required', 'string', 'max:255'],
            'coach_id'=> ['required','exists:coaches,id'],
            'day'=> ['required', 'date'],
            'session_time'=> ['required'],
            'duartion'=> ['required', 'numeric','min:1'],
            'applicable_from'=> ['required', 'date'],
            'applicable_to'=> ['required', 'date'],
            'seats'=> ['required','numeric','min:1'],
        ];
    }
}
