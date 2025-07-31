<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Application;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomizationController extends Controller {

  function __construct() {
    $this->middleware(['auth', 'verified', 'role:master-administrator']);
    $this->model = 'App\Models\Backend\__System\Administrative\Application\Customization';
    $this->path = 'pages.backend.__system.administrative.application.customization.';
    $this->url = '/dashboard/administratives/applications/customizations';
    $this->data = $this->model::get();
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $data = $this->model::first();
    return view($this->path . 'index', compact('data'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(Request $request, $id) {
    $this->model::where('id', $id)->update([
      'sticky_toolbar'        => $request->get('sticky_toolbar'),
      'topbar_search'         => $request->get('topbar_search'),
      'topbar_notifications'  => $request->get('topbar_notifications'),
      'topbar_quick_actions'  => $request->get('topbar_quick_actions'),
      'topbar_cart'           => $request->get('topbar_cart'),
      'topbar_chat'           => $request->get('topbar_chat'),
    ]);
    return redirect($this->url)->with('success', __('default.notification.success.customization-updated'));
  }

}
