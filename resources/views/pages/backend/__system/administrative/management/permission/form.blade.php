<div class="form-group row">
  <label class="col-4 col-form-label">
    <a href="/dashboard/administratives/managements/users/create" target="_blank" class="text-danger font-weight-bold"><u> User </u></a>
  </label>
  <div class="col-8">
    {{ Html::select('model_id', ManagementUsers(), (isset($data->model_id) ? $data->model_id : NULL))->placeholder('- Select User -')->class('form-control')->required() }}
    @error('model_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-4 col-form-label">
    <a href="/dashboard/administratives/managements/roles/create" target="_blank" class="text-danger font-weight-bold"><u> Role </u></a>
  </label>
  <div class="col-8">
    {{ Html::select('role_id', ManagementRoles(), (isset($data->role_id) ? $data->role_id : NULL))->placeholder('- Select Role -')->class('form-control')->required() }}
    @error('role_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
