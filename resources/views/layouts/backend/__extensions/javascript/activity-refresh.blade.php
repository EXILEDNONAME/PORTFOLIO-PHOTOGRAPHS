@if(empty($activities) || $activities == 'true')
<script>
  $("#activity-refresh").on("click", function() {
    KTApp.block('#exilednoname_activity', {
      overlayColor: '#000000',
      state: 'primary',
      message: "{{ __('default.label.please-wait') }} ..."
    });
    setTimeout(function() {
      KTApp.unblock('#exilednoname_activity');
    }, 500);
  });
</script>
@endif
