@extends('layouts.backend.default', ['administrative' => 'true'])
@section('title', 'Customizations')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.customizations') }} </h3>
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
            <div class="col-4 col-form-label"> Sticky Toolbar </div>
            <div class="col-8">
              {{ Html::select('sticky_toolbar', ['1' => __('default.label.yes'), '0' => __('default.label.no')], (isset($data->sticky_toolbar) ? $data->sticky_toolbar : '1'))->class($errors->has('sticky_toolbar') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('sticky_toolbar') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-4 col-form-label"> Topbar Search </div>
            <div class="col-8">
              {{ Html::select('topbar_search', ['1' => __('default.label.yes'), '0' => __('default.label.no')], (isset($data->topbar_search) ? $data->topbar_search : '1'))->class($errors->has('topbar_search') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('topbar_search') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-4 col-form-label"> Topbar Notifications </div>
            <div class="col-8">
              {{ Html::select('topbar_notifications', ['1' => __('default.label.yes'), '0' => __('default.label.no')], (isset($data->topbar_notifications) ? $data->topbar_notifications : '1'))->class($errors->has('topbar_notifications') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('topbar_notifications') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-4 col-form-label"> Topbar Quick Actions </div>
            <div class="col-8">
              {{ Html::select('topbar_quick_actions', ['1' => __('default.label.yes'), '0' => __('default.label.no')], (isset($data->topbar_quick_actions) ? $data->topbar_quick_actions : '1'))->class($errors->has('topbar_quick_actions') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('topbar_quick_actions') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-4 col-form-label"> Topbar Cart </div>
            <div class="col-8">
              {{ Html::select('topbar_cart', ['1' => __('default.label.yes'), '0' => __('default.label.no')], (isset($data->topbar_cart) ? $data->topbar_cart : '1'))->class($errors->has('topbar_cart') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('topbar_cart') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-4 col-form-label"> Topbar Chat </div>
            <div class="col-8">
              {{ Html::select('topbar_chat', ['1' => __('default.label.yes'), '0' => __('default.label.no')], (isset($data->topbar_chat) ? $data->topbar_chat : '1'))->class($errors->has('topbar_chat') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('topbar_chat') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
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
