@php $customizations = DB::table('system_customizations')->first(); @endphp

@if ($customizations->topbar_search == 1)
<div class="dropdown">
  <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
    <div class="btn btn-icon btn-clean btn-lg btn-dropdown">
      <i class="fa fa-search"></i>
    </div>
  </div>

  <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
    <div class="quick-search quick-search-dropdown">
      <form method="get" class="quick-search-form">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search..." />
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
            </span>
          </div>
        </div>
      </form>
      <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325" data-mobile-height="200"></div>
    </div>
  </div>
</div>
@endif
