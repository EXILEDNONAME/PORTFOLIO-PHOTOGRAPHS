@extends('layouts.backend.__templates.trash', ['administrative' => 'true'])
@section('title', 'Management Users')

@section('table-header')
<th> Name </th>
@endsection

@section('table-body')
{ data: 'name' },
@endsection
