@extends('layouts.backend.default')
@section('title', 'Change Password')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.change-password') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>

      <div class="card-body">
        <form id="exilednoname-form" method="POST" action="{{ URL::current() }}/../update-password" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group row">
            <label class="col-4 col-form-label"> Current Password </label>
            <div class="col-8">
              {{ Html::password('current-password')->class($errors->has('current-password') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('current-password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-4 col-form-label"> New Password </label>
            <div class="col-8">
              {{ Html::password('new-password')->class($errors->has('new-password') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('new-password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-4 col-form-label"> Confirm Password </label>
            <div class="col-8">
              {{ Html::password('confirm-password')->class($errors->has('confirm-password') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('confirm-password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
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
@endpush
