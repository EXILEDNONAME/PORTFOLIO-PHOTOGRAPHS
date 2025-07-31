<script>
  $('body').on('click', '#restore', function () {
    var id = $(this).data("id");
    Swal.fire({ text: "{{ __('default.notification.confirm.restore') }}?", icon: "warning", showCancelButton: true, confirmButtonText: '{{ __("default.label.yes") }}', cancelButtonText: '{{ __("default.label.no") }}', reverseButtons: false }).then(function(result) {
      if (result.value) {
        $.ajax({
          type: "get",
          url: "{{ URL::current() }}/../restore/"+id,
          processing: true,
          serverSide: true,
          success: function (data) {
            KTApp.block('#exilednoname_body', {
              overlayColor: '#000000',
              state: 'info',
              message: '{{ __('default.label.processing') }} ...'
            });
            setTimeout(function() {
              KTApp.unblock('#exilednoname_body');
              var oTable = $('#exilednoname_table').dataTable();
              oTable.fnDraw(false);
              toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
              toastr.success("{{ __('default.notification.success.item-restore') }}");
            }, 1000);
          },
          error: function (data) {
            toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
            toastr.error("{{ __('default.notification.error./') }}");
          }
        });
      }
    });
  });
</script>
