<!DOCTYPE html>
<html lang="en">
<head>
  <base href="../../../../">
  <meta charset="utf-8"/>
  <title>
    @php $title = DB::table('system_settings')->first(); @endphp
    {{ $title->application_name; }} - Forget Password
  </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Forgot Password">
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

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

  <div class="d-flex flex-column flex-root">
    <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
      <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{ env('APP_URL') }}/assets/backend/media/bg/bg-2.jpg);">
        <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
          <div class="login-signin text-white">
            <div class="mb-10">
              <h3 class="opacity-40 font-weight-normal"> - FORGET PASSWORD - </h3>
              <p class="opacity-40"> Enter Your Email Account For Reset Password </p>
            </div>

            <form class="form" method="POST" action="{{ route('password.email') }}">
              @csrf

              <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="email" placeholder="Email" name="email" autocomplete="off" required/>
              </div>

              <center>
                @error('email')
                <div class="fv-plugins-message-container mt-0">
                  <div data-field="password" class="fv-help-block"><strong>{{ $message }}</strong></div>
                </div>
                <br>
                @enderror
                @if (session('status'))
                <div class="fv-plugins-message-container mt-0">
                  {{ session('status') }}
                </div>
                @endif
              </center>

              <div class="form-group text-center mt-10">
                <button type="submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3"> {{ __('Send Password Reset Link') }} </button>
              </div>
            </form>

            <div class="form-group text-center mt-10">
              <a href="{{ URL::previous() }}"><span class="btn btn-pill btn-danger opacity-90 px-15 py-3"> {{ __('default.label.back') }} </span></a>
            </div>

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
