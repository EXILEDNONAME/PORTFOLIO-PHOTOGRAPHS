@if (!empty($status) && $status == 'true')
<div class="form-group row">
  <label class="col-4 col-form-label"> {{ __('default.label.status') }} </label>
  <div class="col-8">
    {{ Html::select('status', [
    '1' => __('default.label.default'),
    '2' => __('default.label.pending'),
    '3' => __('default.label.in-progress'),
    '4' => __('default.label.success'),
    '5' => __('default.label.failed')
    ], (isset($data->status) ? $data->status : ''))->class($errors->has('status') ? 'form-control is-invalid' : 'form-control')->placeholder('- ' . __("default.select.status") . ' -')->required() }}
    @error('status') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
  </div>
</div>
@endif
