@extends('layouts.backend.__templates.index', ['page' => 'datatable-index', 'date' => 'false', 'datetime' => 'false', 'charts' => 'false', 'activities' => 'false', 'administrative' => 'true'])
@section('title', 'Management Roles')

@section('table-header')
<th> Name </th>
<th> View </th>
@endsection

@section('table-body')
{ data: 'name' },
{ data: 'view' },
@endsection
