<script src="{{ env('APP_URL') }}/assets/backend/plugins/global/plugins.bundle.js"></script>
<script src="{{ env('APP_URL') }}/assets/backend/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="{{ env('APP_URL') }}/assets/backend/js/scripts.bundle.js"></script>
<script src="{{ env('APP_URL') }}/assets/backend/js/pages/widgets.js"></script>
<script src="{{ env('APP_URL') }}/assets/backend/js/toast-options.js"></script>
<script>
  $("#logout").click(function(e) {
    Swal.fire({ text: "{{ __('default.notification.confirm.logout-session') }}?", icon: "warning", showCancelButton: true, confirmButtonText: '{{ __("default.label.yes") }}', cancelButtonText: '{{ __("default.label.no") }}', reverseButtons: false }).then(function(result) {
      if (result.value) { Swal.fire({ text: "{{ __('default.label.redirect-login') }}", timer: 2000, onOpen: function(){ Swal.showLoading() }}).then(function(result){ if(result.dismiss === "timer"){ window.location = "{{ url('/dashboard/logout') }}"; }}) }
    });
  });

  $("#logout_topbar").click(function(e) {
    Swal.fire({ text: "{{ __('default.notification.confirm.logout-session') }}?", icon: "warning", showCancelButton: true, confirmButtonText: '{{ __("default.label.yes") }}', cancelButtonText: '{{ __("default.label.no") }}', reverseButtons: false }).then(function(result) {
      if (result.value) { Swal.fire({ text: "{{ __('default.label.redirect-login') }}", timer: 2000, onOpen: function(){ Swal.showLoading() }}).then(function(result){ if(result.dismiss === "timer"){ window.location = "{{ url('/dashboard/logout') }}"; }}) }
    });
  });
</script>

@if ($message = Session::get('success')) <script> toastr.success('{{ $message }}'); </script> @endif
@if ($message = Session::get('error')) <script> toastr.error('{{ $message }}'); </script> @endif
@stack('js')
