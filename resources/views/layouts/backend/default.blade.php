<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('layouts.backend.__includes.head')
  <body id="kt_body" class="page-loading header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable footer-fixed">
      <!-- @!include('layouts.backend.__includes.components.page-loader') -->
      @include('layouts.backend.__includes.header-mobile')

      <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
          @include('layouts.backend.__includes.sidebar')
          <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            @include('layouts.backend.__includes.header')
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
              @include('layouts.backend.__includes.subheader')
              <div class="d-flex flex-column-fluid">
                <div class="container-fluid">
                  @yield('content')
                </div>
              </div>
            </div>

            @include('layouts.backend.__includes.footer')
          </div>
        </div>
      </div>

      @include('layouts.backend.__includes.chat-panel')
      @include('layouts.backend.__includes.scrolltop')
      @include('layouts.backend.__includes.sticky-toolbar')
      @include('layouts.backend.__includes.js')

  </body>
</html>
