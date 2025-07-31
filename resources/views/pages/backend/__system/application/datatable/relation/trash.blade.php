@extends('layouts.backend.__templates.trash')
@section('title', 'Datatable Relations')

@section('table-header')
<th> Table General </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'id_table_generals' },
{ data: 'description' },
@endsection
