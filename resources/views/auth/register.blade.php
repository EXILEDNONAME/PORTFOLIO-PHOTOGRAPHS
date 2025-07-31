<!DOCTYPE html>
<html lang="en">
<head>
  <base href="../../../../">
  <meta charset="utf-8"/>
  <title>
    @php $title = DB::table('system_settings')->first(); @endphp
    {{ $title->application_name; }} - Register
  </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Register">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/assets/backend/css/pages/login/classic/login-5.css">
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/assets/backend/plugins/global/plugins.bundle.css">
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/assets/backend/plugins/custom/prismjs/prismjs.bundle.css">
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/assets/backend/css/style.bundle.css">
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/assets/backend/css/themes/layout/header/base/light.css">
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/assets/backend/css/themes/layout/header/menu/light.css">
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/assets/backend/css/themes/layout/brand/dark.css">
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/assets/backend/css/themes/layout/aside/dark.css">
  <link rel="shortcut icon" href="{{ env('APP_URL') }}/assets/favicon.png"/>
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

  <div class="d-flex flex-column flex-root">
    <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
      <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{ env('APP_URL') }}/assets/backend/media/bg/bg-2.jpg);">
        <div class="login-form text-center text-white p-7 position-relative overflow-hidden">

          <div class="login-signin text-white">
            <div class="mb-10">
              <h3 class="opacity-40 font-weight-normal"> - REGISTER - </h3>
              <p class="opacity-40"> Enter Your Details Account </p>
            </div>

            <form class="form" method="POST" action="{{ route('register') }}">
              @csrf

              <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Name" name="name" value="{{ old('name') }}" required/>
              </div>
              <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required/>
              </div>
              <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="number" placeholder="Phone" name="phone" value="{{ old('phone') }}" required/>
              </div>
              <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Username" name="username" value="{{ old('username') }}" required/>
              </div>
              <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" required/>
              </div>
              <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password Confirmation" name="password_confirmation" required/>
              </div>

              <center>
                @error('name')
                <div class="fv-plugins-message-container mt-0"><div data-field="name" class="fv-help-block"><strong>{{ $message }}</strong></div></div><br>
                @enderror

                @error('email')
                <div class="fv-plugins-message-container mt-0"><div data-field="email" class="fv-help-block"><strong>{{ $message }}</strong></div></div><br>
                @enderror

                @error('phone')
                <div class="fv-plugins-message-container mt-0"><div data-field="phone" class="fv-help-block"><strong>{{ $message }}</strong></div></div><br>
                @enderror

                @error('username')
                <div class="fv-plugins-message-container mt-0"><div data-field="username" class="fv-help-block"><strong>{{ $message }}</strong></div></div><br>
                @enderror

                @error('password')
                <div class="fv-plugins-message-container mt-0"><div data-field="password" class="fv-help-block"><strong>{{ $message }}</strong></div></div><br>
                @enderror

                @error('password_confirmation')
                <div class="fv-plugins-message-container mt-0"><div data-field="password_confirmation" class="fv-help-block"><strong>{{ $message }}</strong></div></div><br>
                @enderror
              </center>

              @if ($message = Session::get('status'))
              <div id="toast-container" class="toast-bottom-right">
                <div class="toast toast-success" aria-live="polite">
                  <div class="toast-message">{{ $message }}</div>
                </div>
              </div>
              @endif

              <div class="form-group text-center d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
                <div class="checkbox-inline">
                  <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                    <input type="checkbox" name="remember"/>
                    <span></span>
                    Remember me
                  </label>
                </div>
                <a href="{{ route('password.request') }}" class="text-white font-weight-bold">Forget Password ?</a>
              </div>
              <div class="form-group text-center mt-10">
                <button type="submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Sign In</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="{{ env('APP_URL') }}/assets/backend/plugins/global/plugins.bundle.js?v=7.0.6"></script>
  <script src="{{ env('APP_URL') }}/assets/backend/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
  <script src="{{ env('APP_URL') }}/assets/backend/js/scripts.bundle.js?v=7.0.6"></script>

</body>
</html>
