@extends('layouts.backend.__templates.show', ['date' => 'false', 'datetime' => 'false', 'administrative' => 'true'])
@section('title', 'Management Permissions')

@section('table-header')
<tr>
  <td class="align-middle font-weight-bold"> Role </td>
  <td class="align-middle">
    @php
    $permission = \DB::table('roles')->where('id', $data->role_id)->first();
    @endphp
    {{ ucwords(str_replace(['-', '_'], ' ', $permission->name)) }}
  </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> User </td>
  <td class="align-middle">
    @php $user = \DB::table('users')->where('id', $data->model_id)->first(); @endphp
    {{ $user->name }}
  </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Description </td>
  <td class="align-middle"> {!! nl2br(e($data->description)) !!} </td>
</tr>
@endsection
