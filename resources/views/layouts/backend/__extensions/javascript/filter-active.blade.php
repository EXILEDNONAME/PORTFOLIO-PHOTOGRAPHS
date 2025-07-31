<script>
@if (empty($active) || $active == 'true')
$('.filter_active').change(function () {
  var card = new KTCard('exilednoname_card');
  KTApp.block('#exilednoname_body', {
    overlayColor: '#000000',
    state: 'primary',
    message: '{{ __('default.label.processing') }} ...'
  });
  setTimeout(function() {
    KTApp.unblock('#exilednoname_body');
    var oTable = $('#exilednoname_table').dataTable();
    oTable.fnDraw(false);
  }, 1000);
  table.column(-2).search( $(this).val() ).draw();
});
@endif
</script>
