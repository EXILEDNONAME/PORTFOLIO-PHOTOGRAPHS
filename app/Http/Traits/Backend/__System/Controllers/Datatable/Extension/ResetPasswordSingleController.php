<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;
use Redirect, Response;
use Illuminate\Support\Facades\Hash;

trait ResetPasswordSingleController {

  /**
  **************************************************
  * @return DELETE
  **************************************************
  **/

  public function reset_password_single($id) {
    $data = $this->model::where('id', $id)->update([
      'password'  => Hash::make('12345678'),
    ]);
    return redirect($this->url)->with('success', __('default.notification.success.reset-password'));
  }

}
