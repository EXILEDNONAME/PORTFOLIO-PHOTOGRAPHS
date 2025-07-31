<?php

namespace App\Http\Requests\Backend\__System\Application\Datatable\General;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest {

  public function authorize(): bool {
    return true;
  }

  public function rules(): array {
    return [
      'name' => ['required', 'max:20', Rule::unique('system_application_table_generals')->ignore($this->id)],
    ];
  }

}
