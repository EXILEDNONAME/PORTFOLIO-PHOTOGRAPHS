@if (empty($datetime) || $datetime == 'true')
<div class="form-group row">
  <label class="col-4 col-form-label"> {{ __('default.label.datetime') }} </label>
  <div class="col-8">
    <div class="input-daterange input-group" id="ex_datepicker_datetime">
      {{ Html::text('date_start', (isset($data->date_start) ? $data->date_start : ''))->class([ $errors->has('date_start') ? 'form-control is-invalid' : 'form-control', ])->id('date_start')->placeholder('- ' . __("default.select.date-start") . ' -')->isReadOnly() }}
      <div class="input-group-append">
        <span class="input-group-text">
          <i class="la la-ellipsis-h"></i>
        </span>
      </div>
      {{ Html::text('date_end', (isset($data->date_end) ? $data->date_end : ''))->class([ $errors->has('date_end') ? 'form-control is-invalid' : 'form-control', ])->id('date_end')->placeholder('- ' . __("default.select.date-end") . ' -')->isReadOnly() }}
    </div>
  </div>
</div>
@endif
