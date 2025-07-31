@php $customizations = DB::table('system_customizations')->first(); @endphp

@if ($customizations->topbar_notifications == 1)
<div class="dropdown">
  <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
    <div class="btn btn-icon btn-clean btn-lg btn-dropdown pulse pulse-primary">
      <i class="fa fa-bell"></i>
      <span class="pulse-ring"></span>
    </div>
  </div>
  <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
    <form>
      <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url({{ env('APP_URL') }}/assets/backend/media/misc/bg-1.jpg)">
        <h4 class="d-flex flex-center rounded-top">
          <span class="text-white"> User Notifications </span>
          <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2"> 23 New </span>
        </h4>
        <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
          <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications">Alerts</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#topbar_notifications_events">Events</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs">Logs</a></li>
        </ul>
      </div>
      <div class="tab-content">

        <!-- TAB 1 -->
        <div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
          <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200">
            <div class="d-flex align-items-center mb-6">
              <div class="symbol symbol-40 symbol-light-info mr-5">
                <span class="symbol-label">
                  <i class="fa fa-caret-right text-dark"></i>
                </span>
              </div>
              <div class="d-flex flex-column font-weight-bold">
                <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Cool App</a>
                <span class="text-muted">Marketing campaign planning</span>
              </div>
            </div>
          </div>
          <div class="d-flex flex-center pt-7">
            <a href="#" class="btn btn-light-primary font-weight-bold text-center">See All</a>
          </div>
        </div>

        <!-- TAB 2 -->
        <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
          <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
            <a href="#" class="navi-item">
              <div class="navi-link">
                <div class="navi-icon mr-2">
                  <i class="flaticon2-line-chart text-success"></i>
                </div>
                <div class="navi-text">
                  <div class="font-weight-bold">New report has been received</div>
                  <div class="text-muted">23 hrs ago</div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <!-- TAB 3 -->
        <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
          <div class="d-flex flex-center text-center text-muted min-h-200px">
            All caught up! <br />No new notifications.
          </div>
        </div>
      </div>

    </form>
  </div>
</div>
@endif
