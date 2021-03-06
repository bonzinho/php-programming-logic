<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserRequest extends FormRequest
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


        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'min:3', 'max:255', "unique:users,email"],
            'birthday' => ['required', 'date'],
            'gender' => ['required', 'in:m,f'],
        ];


        return $rules;
    }
}
