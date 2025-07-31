<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Management;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use Redirect, Response;
use Illuminate\Http\Request;
use DataTables;

use App\Http\Requests\Backend\__System\Administrative\Management\Permission\StoreRequest;
use App\Http\Requests\Backend\__System\Administrative\Management\Permission\UpdateRequest;

class PermissionController extends Controller {

  use DefaultController;
  use ExtensionController;

  function __construct() {
    $this->middleware(['auth', 'verified', 'role:master-administrator']);
    $this->model = 'App\Models\Permission';
    $this->path = 'pages.backend.__system.administrative.management.permission.';
    $this->url = '/dashboard/administratives\managements\permissions';
    $this->data = $this->model::get();
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->editColumn('role', function ($order) {
        $permission = \DB::table('roles')->where('id', $order->role_id)->first();
        return ucwords(str_replace(['-', '_'], ' ', $permission->name));
      })
      ->editColumn('user', function ($order) {
        $user = \DB::table('users')->where('id', $order->model_id)->first();
        return $user->name;
      })
      ->rawColumns(['description'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(StoreRequest $request) {
    $store = $request->all();
    $store['model_type'] = 'App\Models\User';
    $this->model::create($store);
    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(UpdateRequest $request, $id) {
    if ($id == 1) { return redirect($this->url)->with('error', __('default.notification.error.restrict')); }
    else {
      $data = $this->model::findOrFail($id);
      $update = $request->all();
      $data->update($update);
    }
    return redirect($this->url)->with('success', __('default.notification.success.item-updated'));
  }

  /**
  **************************************************
  * @return DESTROY
  **************************************************
  **/

  public function destroy($id) {
    if ($id == 1) { return redirect($this->url)->with('error', __('default.notification.error.restrict')); }
    else {
      try {
        $this->model::destroy($id);
        return redirect($this->url)->with('success', __('default.notification.success.item-deleted'));
      } catch (\Exception $e) {
        return redirect($this->url)->with('error', __('default.notification.error'));
      }
    }
  }

  /**
  **************************************************
  * @return DELETE
  **************************************************
  **/

  public function delete($id) {
    if ($id == 1) {
      $data = 'RESTRICT!';
      return Response::json($data, 500);
    }
    else {
      $this->model::destroy($id);
      $data = $this->model::where('id',$id)->delete();
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return SELECTED_DELETE
  **************************************************
  **/

  public function selected_delete(Request $request) {
    $data = "0," . $request->EXILEDNONAME;
    $array = explode(",", $data);

    if (array_search("1", $array)){
      $data = 'RESTRICT!';
      return Response::json($data, 500);
    }
    else {
      $data = $request->EXILEDNONAME;
      $data2 = $this->model::whereIn('id',explode(",",$data))->get();
      foreach ($data2 as $data3) {
        $this->model::destroy($data3->id);
      }
      return Response::json($data);
    }

  }

}
