@extends('layouts.backend.__templates.index', ['page' => 'datatable-index', 'active' => 'true', 'status' => 'true'])
@section('title', 'Datatable Generals')

@section('table-header')
<th> Name </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'name' },
{ data: 'description' },
@endsection
