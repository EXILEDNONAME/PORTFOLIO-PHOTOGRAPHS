@extends('layouts.backend.default', ['administrative' => 'true'])
@section('title', 'Settings')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.settings') }} </h3>
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
            <label class="col-4 col-form-label"> Application Name </label>
            <div class="col-8">
              {{ Html::text('application_name', (isset($data->application_name) ? $data->application_name : ''))->class([ $errors->has('application_name ') ? 'form-control is-invalid' : 'form-control'])->required() }}
              @error('application_name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-4 col-form-label"> Application Version </label>
            <div class="col-8">
              {{ Html::text('application_version', (isset($data->application_version) ? $data->application_version : ''))->class([ $errors->has('application_version ') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid'])->isReadOnly()->required() }}
              @error('application_version') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
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
