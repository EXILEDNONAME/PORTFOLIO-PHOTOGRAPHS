<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;
use Redirect, Response;
use Illuminate\Support\Facades\Hash;

trait ResetPasswordController {

  /**
  **************************************************
  * @return DELETE
  **************************************************
  **/

  public function reset_password($id) {
    $data = $this->model::where('id', $id)->update([
      'password'  => Hash::make('12345678'),
    ]);
    return Response::json($data);
  }

}
