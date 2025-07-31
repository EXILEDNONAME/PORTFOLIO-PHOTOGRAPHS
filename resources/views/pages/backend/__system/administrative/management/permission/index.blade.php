@extends('layouts.backend.__templates.index', ['page' => 'datatable-index', 'date' => 'false', 'datetime' => 'false', 'charts' => 'false', 'activities' => 'false', 'administrative' => 'true'])
@section('title', 'Management Permissions')

@section('table-header')
<th> Role </th>
<th> User </th>
@endsection

@section('table-body')
{ data: 'role' },
{ data: 'user' },
@endsection
