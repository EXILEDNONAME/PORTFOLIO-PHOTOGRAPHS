@extends('layouts.backend.default')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.create') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>
      <div class="card-body">
        <form method="POST" id="exilednoname-form" action="{{ URL::current() }}/../" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input class="form-control" name="created_by" type="hidden" value="{{ Auth::User()->id }}">
          @include($path . 'form', ['formMode' => 'create'])
          @include('layouts.backend.__extensions.form.active')
          @include('layouts.backend.__extensions.form.date')
          @include('layouts.backend.__extensions.form.datetime')
          @include('layouts.backend.__extensions.form.status')
        </form>
        <div class="form-group row">
          <div class="col-4"></div>
          <div class="col-8">
            <button type="submit" form="exilednoname-form" class="btn btn-success font-weight-bold mr-2"><span class="ml-1 mr-1"> {{ __('default.label.submit') }} </span></button>
            <a href="{{ $url }}"><button class="btn btn-secondary font-weight-bold"><span class="ml-1 mr-1"> {{ __('default.label.back') }} </span></button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="{{ env('APP_URL') }}/assets/backend/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
<script> var card = new KTCard('exilednoname_card'); </script>
@endpush
