<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller {

  function __construct() {
    $this->middleware(['auth', 'verified', 'role:master-administrator']);
    $this->model = 'App\Models\Backend\__System\Administrative\Application\Setting';
    $this->path = 'pages.backend.__system.administrative.application.setting.';
    $this->url = '/dashboard/administratives/applications/settings';
    $this->data = $this->model::get();
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $data = $this->model::first();
    return view('pages.backend.__system.administrative.application.setting.index', compact('data'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(Request $request, $id) {
    $this->model::where('id', $id)->update(['application_name' => $request->get('application_name'), 'application_version' => $request->get('application_version'),]);
    return redirect('/dashboard/administratives/applications/settings')->with('success', __('default.notification.success.setting-updated'));
  }

}
