@extends('layouts.backend.__templates.show', ['active' => 'true', 'status' => 'false', 'date' => 'false', 'datetime' => 'false'])
@section('title', 'Datatable Relations')

@section('table-header')
<tr>
  <td class="align-middle font-weight-bold"> Table General </td>
  <td> {{ $data->application_table_generals->name }} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Description </td>
  <td> {{ $data->description }} </td>
</tr>
@endsection
