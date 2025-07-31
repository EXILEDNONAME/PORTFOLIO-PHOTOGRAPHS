<script>
  $('body').on('click', '#inactive', function () {
    var id = $(this).data("id");
    $.ajax({
      type: "get", url: "{{ URL::current() }}/inactive/"+id, processing: true, serverSide: true,
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
          toastr.success("{{ __('default.notification.success.item-inactive') }}");
        }, 1000);
      },
      error: function (data) {
        toastr.error("{{ __('default.notification.error./') }}");
      }
    });
  });
</script>
