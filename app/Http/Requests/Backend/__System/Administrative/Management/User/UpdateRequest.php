<?php

namespace App\Http\Requests\Backend\__System\Administrative\Management\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Validator;

Validator::extend('validateWithoutSpaces', function ($attribute, $value, $parameters, $validator) {
  return !Str::contains($value, ' '); // Checks for spaces
});

class UpdateRequest extends FormRequest
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
      'email'     => ['required', Rule::unique('users', 'email')->ignore($this->id), Rule::unique('users', 'phone')->ignore($this->id), Rule::unique('users', 'username')->ignore($this->id)],
      'phone'     => ['required', Rule::unique('users', 'email')->ignore($this->id), Rule::unique('users', 'phone')->ignore($this->id), Rule::unique('users', 'username')->ignore($this->id)],
      'username'  => ['required', 'validateWithoutSpaces', Rule::unique('users', 'email')->ignore($this->id), Rule::unique('users', 'phone')->ignore($this->id), Rule::unique('users', 'username')->ignore($this->id)],
    ];
  }

  public function messages(): array
  {
    return [
      'validate_without_spaces' => 'Spaces are not allowed.',
    ];
  }
}
