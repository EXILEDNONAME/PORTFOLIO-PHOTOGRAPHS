@php $customizations = DB::table('system_customizations')->first(); @endphp

@if ($customizations->topbar_quick_actions == 1)
<div class="dropdown">
  <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
    <div class="btn btn-icon btn-clean btn-lg btn-dropdown">
      <i class="fas fa-shapes"></i>
    </div>
  </div>
  <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
    <div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url({{ env('APP_URL') }}/assets/backend/media/misc/bg-1.jpg)">
      <h4 class="text-white font-weight-bold">Quick Actions</h4>
      <span class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">23 tasks pending</span>
    </div>
    <div class="row row-paddingless">
      <div class="col-6">
        <a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-right border-bottom">
          <span class="svg-icon svg-icon-3x svg-icon-success">
            <i class="fas fa-dollar-sign icon-2x text-success"></i>
          </span>
          <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Accounting</span>
          <span class="d-block text-dark-50 font-size-lg">eCommerce</span>
        </a>
      </div>
      <div class="col-6">
        <a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-bottom">
          <span class="svg-icon svg-icon-3x svg-icon-success">
            <i class="fas fa-mail-bulk icon-2x text-success"></i>
          </span>
          <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Administration</span>
          <span class="d-block text-dark-50 font-size-lg">Console</span>
        </a>
      </div>
      <div class="col-6">
        <a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-right">
          <span class="svg-icon svg-icon-3x svg-icon-success">
            <i class="fas fa-box-open icon-2x text-success"></i>
          </span>
          <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Projects</span>
          <span class="d-block text-dark-50 font-size-lg">Pending Tasks</span>
        </a>
      </div>
      <div class="col-6">
        <a href="#" class="d-block py-10 px-5 text-center bg-hover-light">
          <span class="svg-icon svg-icon-3x svg-icon-success">
            <i class="fas fa-user-friends icon-2x text-success"></i>
          </span>
          <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Customers</span>
          <span class="d-block text-dark-50 font-size-lg">Latest cases</span>
        </a>
      </div>
    </div>
  </div>
</div>
@endif
