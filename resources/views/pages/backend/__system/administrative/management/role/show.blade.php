@extends('layouts.backend.__templates.show', ['date' => 'false', 'datetime' => 'false', 'administrative' => 'true'])
@section('title', 'Management Roles')

@section('table-header')
<tr>
  <td class="align-middle font-weight-bold"> Name </td>
  <td class="align-middle"> {{ $data->name }} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> View </td>
  <td class="align-middle"> {{ ucwords(str_replace(['-', '_'], ' ', $data->name)) }} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Description </td>
  <td class="align-middle"> {!! nl2br(e($data->description)) !!} </td>
</tr>
@endsection
