@if (empty($date) || $date == 'true')
<div class="form-group row">
  <label class="col-4 col-form-label"> {{ __('default.label.date') }} </label>
  <div class="col-8">
    <div class="input-daterange input-group" id="ex_datepicker_date">
      {{ Html::text('date', (isset($data->date) ? $data->date : ''))->class([ $errors->has('date') ? 'form-control is-invalid' : 'form-control', ])->id('date')->placeholder('- ' . __("default.select.date") . ' -')->isReadOnly() }}
      <div class="input-group-append">
        <span class="input-group-text">
          <i class="ki ki-calendar"></i>
        </span>
      </div>
    </div>
  </div>
</div>
@endif
