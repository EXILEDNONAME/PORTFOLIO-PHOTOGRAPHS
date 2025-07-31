@extends('layouts.backend.__templates.index', ['page' => 'datatable-index', 'active' => 'true', 'status' => 'false', 'date' => 'false', 'datetime' => 'false'])
@section('title', 'Datatable Relations')

@section('table-header')
<th> Table General </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'id_table_generals' },
{ data: 'description' },
@endsection
