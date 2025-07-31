@extends('layouts.backend.default', ['administrative' => 'true'])
@section('title', 'Optimizations')

@push('head')
<link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/assets/backend/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" />
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.optimizations') }} </h3>
        </div>
        <div class="card-toolbar">
          <a id="table-refresh" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>
      <div class="card-body" id="exilednoname_body">

        <div class="row dataTables_wrapper dt-bootstrap4 no-footer">
          <div class="col-sm-12 col-md-6"><div id="ex_table_length"></div></div>
          <div class="col-sm-12 col-md-6"><div id="ex_table_filter"></div></div>
        </div>

        <div class="table-responsive">
          <table width="100%" class="table table-hover table-checkable table-sm rounded" id="exilednoname_table">
            <thead>
              <tr>
                <th> No. </th>
                <th> Name </th>
                <th> Description </th>
                <th class="no-export"> </th>
              </tr>
            </thead>
          </table>
        </div>

        <div class="row dataTables_wrapper dt-bootstrap4 no-footer">
          <div class="col-sm-12 col-md-5"><div id="ex_table_info"></div></div>
          <div class="col-sm-12 col-md-7"><div id="ex_table_paginate"></div></div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="{{ env('APP_URL') }}/assets/backend/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
$(document).ready(function() {
  KTApp.block('#exilednoname_body', {
    overlayColor: '#000000',
    state: 'primary',
    message: "{{ __('default.label.please-wait') }} ..."
  });
  setTimeout(function() { KTApp.unblock('#exilednoname_body'); }, 1000);
});

var card = new KTCard('exilednoname_card');

var indexLastColumn = $("#exilednoname_table").find('tr')[0].cells.length-1;
var table = $('#exilednoname_table').DataTable({
  "initComplete": function( settings, json ) {
    $('#exilednoname_table_info').appendTo('#ex_table_info');
    $('#exilednoname_table_paginate').appendTo('#ex_table_paginate');
    $('#exilednoname_table_length').appendTo('#ex_table_length');
    $('#exilednoname_table_filter').appendTo('#ex_table_filter');
  },

  "pagingType": "simple_numbers",
  serverSide: true,
  searching: true,
  rowId: 'Collocation',
  select: {
    style: 'multi',
    selector: 'td:first-child .checkable',
  },
  ajax: {
    url: "{{ URL::current() }}",
  },
  "lengthMenu": [[50, 100, 250, 500, -1], [50, 100, 250, 500, "All"]],
  columns: [
    {
      data: 'autonumber', orderable: false, searchable: false, 'className': 'align-middle text-center', 'width': '1',
      render: function(data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; }
    },

    { data: 'name' },
    { data: 'description' },

    {
      data: 'action', orderable: false, 'className': 'align-middle text-center', 'width': '1',
      render: function ( data, type, row ) {
        return '<a id="start-optimizing" href="javascript:void(0);" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-info label-inline"> {{ strtoupper(__("default.label.start")) }} </span></a>'
      }
    },

  ],
  order: [
    [indexLastColumn, 'asc']
  ]
});

</script>

@include('layouts.backend.__extensions.javascript.table-refresh')
@include('layouts.backend.__extensions.javascript.start-optimizing')

@endpush
