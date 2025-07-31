<script>
  $('body').on('click', '.reset-password', function () {
    var id = $(this).data("id");
    Swal.fire({ text: "{{ __('default.notification.confirm.reset-password') }}?", icon: "warning", showCancelButton: true, confirmButtonText: '{{ __("default.label.yes") }}', cancelButtonText: '{{ __("default.label.no") }}', reverseButtons: false }).then(function(result) {
      if (result.value) {
        $.ajax({
          type: "get", url: "{{ URL::current() }}/reset-password/"+id,
          success: function (data) {
            KTApp.block('#exilednoname_body', {
              overlayColor: '#000000',
              state: 'primary',
              message: '{{ __('default.label.processing') }} ...'
            });
            setTimeout(function() {
              KTApp.unblock('#exilednoname_body');
              var oTable = $('#exilednoname_table').dataTable();
              oTable.fnDraw(false);
              toastr.info("{{ __('default.notification.success.reset-password') }}");
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
