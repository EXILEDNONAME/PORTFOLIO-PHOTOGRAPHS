@extends('layouts.backend.__templates.index', ['page' => 'datatable-index', 'date' => 'false', 'datetime' => 'false', 'charts' => 'false', 'activities' => 'false', 'extension' => 'management-users', 'administrative' => 'true'])
@section('title', 'Management Users')

@section('table-header')
<th> Avatar </th>
<th> Name </th>
<th> Username </th>
<th> Email </th>
<th> Phone </th>
@endsection

@section('table-body')
{ data: 'avatar', orderable: false, 'className': 'align-middle text-center', 'width': '1', },
{ data: 'name' },
{ data: 'username' },
{ data: 'email' },
{ data: 'phone' },
@endsection
