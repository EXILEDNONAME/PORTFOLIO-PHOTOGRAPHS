<script>
  $("#table-reset").on("click", function() {

    Swal.fire({ text: "{{ __('default.notification.confirm.reset-session') }}?", icon: "warning", showCancelButton: true, confirmButtonText: '{{ __("default.label.yes") }}', cancelButtonText: '{{ __("default.label.no") }}', reverseButtons: false }).then(function(result) {
      if (result.value) {
        $.ajax({
          type: "get", url: "{{ URL::current() }}/reset", processing: true, serverSide: true,
          success: function (data) {
            KTApp.block('#exilednoname_body', {
              overlayColor: '#000000',
              state: 'info',
              message: '{{ __('default.label.processing') }} ...'
            });
            setTimeout(function() {
              KTApp.unblock('#exilednoname_body');
              table.ajax.reload();
              toastr.info("{{ __('default.notification.success.table-reset') }}");
            }, 1000);
          },
          error: function (data) {
            toastr.error("{{ __('default.notification.error./') }}");
          }
        });
      }
    });
  });
</script>
