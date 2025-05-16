<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:50|regex:/^[a-zA-Z\s\'\-]+$/',
            'lastname' => 'required|string|max:50|regex:/^[a-zA-Z\s\'\-]+$/',
            'bod' => 'required|date',
            'sex' => 'required|in:Male,Female',
            'email' => 'required|email|unique:usersinfo,email',
            'username' => 'required|string|unique:usersinfo,username',
            'password' => 'required|string|min:8|confirmed', // ✅ Password confirmation
            'terms' => 'accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.regex' => 'The first name may only contain letters, spaces, hyphens, and apostrophes.',
            'lastname.regex' => 'The last name may only contain letters, spaces, hyphens, and apostrophes.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'firstname' => ucwords(strtolower(trim($this->firstname))),
            'lastname' => ucwords(strtolower(trim($this->lastname))),
            'username' => trim($this->username),
        ]);
    }
}
