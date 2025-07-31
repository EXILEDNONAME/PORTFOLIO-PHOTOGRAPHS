<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Application;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use Redirect, Response;

class OptimizationController extends Controller {

  use DefaultController;
  use ExtensionController;

  function __construct() {
    $this->middleware(['auth', 'verified', 'role:master-administrator']);
    $this->model = 'App\Models\Backend\__System\Administrative\Application\Optimization';
    $this->path = 'pages.backend.__system.administrative.application.optimization.';
    $this->url = '/dashboard/administratives/applications/optimizations';
    $this->data = $this->model::get();
  }

  /**
  **************************************************
  * @return OPTIMIZE
  **************************************************
  **/

  public function start_optimizing($id) {
    if ($id == 1) {
      $data_1 = \Artisan::call('optimize:clear');
      $data_2 = \Artisan::call('config:clear');
      return Response::json([$data_1, $data_2]);
    }
    if ($id == 2) {
      $data = system('composer dump-autoload');
      return Response::json($data);
    }
  }

}
