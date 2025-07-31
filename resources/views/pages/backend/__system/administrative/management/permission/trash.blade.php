@extends('layouts.backend.__templates.trash', ['administrative' => 'true'])
@section('title', 'Management Permissions')

@section('table-header')
<th> Name </th>
@endsection

@section('table-body')
{ data: 'name' },
@endsection
