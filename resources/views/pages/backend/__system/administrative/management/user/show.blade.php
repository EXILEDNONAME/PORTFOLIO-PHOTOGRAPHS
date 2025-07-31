@extends('layouts.backend.__templates.show', ['extension' => 'management-users', 'date' => 'false', 'datetime' => 'false', 'administrative' => 'true'])
@section('title', 'Management Users')

@section('table-header')
<tr>
  <td class="align-middle font-weight-bold"> Name </td>
  <td class="align-middle"> {!! $data->name !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Email </td>
  <td class="align-middle"> {!! $data->email !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Phone </td>
  <td class="align-middle"> {!! $data->phone !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Username </td>
  <td class="align-middle"> {!! $data->username !!} </td>
</tr>
@endsection
