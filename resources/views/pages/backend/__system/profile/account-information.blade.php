@extends('layouts.backend.default')
@section('title', 'Account Informations')

@section('content')

@if ($message = Session::get('token'))
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b">
      <div class="input-daterange input-group" id="ex_datepicker_date" bis_skin_checked="1">
        <input class="form-control" type="text" value="{{ $message }}" id="clipboard_api" readonly="">
        <div class="input-group-append" bis_skin_checked="1">
          <span class="input-group-text">
            <i class="ki ki-copy" data-clipboard="true" data-clipboard-target="#clipboard_api"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.account-informations') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>

      <div class="card-body">
        <form method="POST" id="exilednoname-form" action="{{ URL::current() }}/update/{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ method_field('PATCH') }}
          {{ csrf_field() }}

          <div class="form-group row">
            <label class="col-4 col-form-label"> Avatar </label>
            <div class="col-8">
              <div class="image-input image-input-outline" id="kt_profile_avatar" style="background: white">
                @if(Auth::User()->avatar)
                <div class="image-input-wrapper" style="background-image: url({{ env('APP_URL') }}/storage/avatar/{{ Auth::User()->id }}/{{ Auth::User()->avatar }})"></div>
                @else
                <div class="image-input-wrapper" style="background-image: url({{ env('APP_URL') }}/assets/backend/media/users/blank.png)"></div>
                @endif

                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                  <i class="fa fa-pen icon-sm text-muted"></i>
                  <input type="file" name="avatar" accept=".jpg, .jpeg">
                  <input type="hidden" name="avatar_remove">
                </label>

                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                  <i class="ki ki-bold-close icon-xs text-muted"></i>
                </span>

                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                  <i class="ki ki-bold-close icon-xs text-muted"></i>
                </span>
              </div>
              <span class="form-text text-muted">Allowed file types: jpg, jpeg.</span>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-4 col-form-label"> Name </label>
            <div class="col-8">
              {{ Html::text('name', (isset($data->name) ? $data->name : ''))->class([ $errors->has('name ') ? 'form-control is-invalid' : 'form-control'])->required() }}
              @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-4 col-form-label"> Email </label>
            <div class="col-8">
              {{ Html::email('email', (isset($data->email) ? $data->email : ''))->class([ $errors->has('email') ? 'form-control is-invalid' : 'form-control'])->isReadOnly() }}
              @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-4 col-form-label"> Phone </label>
            <div class="col-8">
              {{ Html::text('phone', (isset($data->phone) ? $data->phone : ''))->class([ $errors->has('phone ') ? 'form-control is-invalid' : 'form-control'])->isReadOnly() }}
              @error('phone') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-4 col-form-label"> Username </label>
            <div class="col-8">
              {{ Html::text('username', (isset($data->username) ? $data->username : ''))->class([ $errors->has('username ') ? 'form-control is-invalid' : 'form-control'])->isReadOnly() }}
              @error('username') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-4 col-form-label"> Role </label>
            <div class="col-8">
              <tags class="tagify form-control" readonly="" tabindex="-1">
                @if(empty(\DB::table('model_has_roles')->where('model_id', Auth::user()->id)->first()))
                <tag class="tagify__tag tagify--noAnim"><div><span class="tagify__tag-text"> user </span></div></tag>
                @else
                @php $roles = \DB::table('model_has_roles')->where('model_id', Auth::user()->id)->get(); @endphp
                @foreach($roles as $roles)
                @php $data = \DB::table('roles')->where('id', $roles->role_id)->get(); @endphp
                @foreach($data as $data)
                <tag class="tagify__tag tagify--noAnim"><div><span class="tagify__tag-text"> {{ $data->name }} </span></div></tag>
                @endforeach
                @endforeach
                @endif
              </tags>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-4 col-form-label"> API Token </label>
            <div class="col-8">
              <div class="input-group">
                @if(!empty($token->token))
                <input type="password" class="form-control" value="{{ $token->token }}">
                @else
                <input type="password" class="form-control" value="">
                @endif
                <div class="input-group-append">
                  <a href="{{ URL::Current() }}/generate-new-token" class="btn btn-secondary"> Generate New Token </a>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="form-group row">
          <div class="col-4"></div>
          <div class="col-8">
            <button type="submit" form="exilednoname-form" class="btn btn-success font-weight-bold mr-2"><span class="ml-1 mr-1"> {{ __('default.label.save') }} </span></button>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
@endsection

@push('js')
<script> var card = new KTCard('exilednoname_card'); </script>
<script>
  new ClipboardJS('[data-clipboard=true]').on('success', function(e) {
    Swal.fire("Copied", "", "success");
    e.clearSelection();
  });
</script>
<script src="{{ env('APP_URL') }}/assets/backend/js/pages/custom/profile/profile.js?v=7.0.6"></script>
@endpush
