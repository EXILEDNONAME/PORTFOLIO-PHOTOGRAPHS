@php $customizations = DB::table('system_customizations')->first(); @endphp

@if ($customizations->topbar_chat == 1)
<div class="topbar-item">
  <div class="btn btn-icon btn-clean btn-lg" data-toggle="modal" data-target="#kt_chat_modal">
    <i class="fa fa-comment-alt"></i>
  </div>
</div>
@endif
