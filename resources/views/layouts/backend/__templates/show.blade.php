@extends('layouts.backend.default')

@section('content')
<div class="row">
  <div class="col-lg-8">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.details') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>
          <a data-toggle="modal" data-target="#qrcode_modal" class="btn btn-icon btn-xs btn-hover-light-primary"title="{{ __('default.label.qr-code') }}"><i class="fas fa-qrcode"></i></a>
          <a class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.print') }}" onclick="printData('printData')"><i class="fas fa-print"></i></a>
          <a href="{{ URL::Current() }}/edit" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.edit') }}"><i class="fas fa-pencil-alt"></i></a>
          <div class="dropdown dropdown-inline" bis_skin_checked="1">
            <button type="button" class="btn btn-clean btn-xs btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-download"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" bis_skin_checked="1">
              <ul class="navi navi-hover py-5">
                <li class="navi-item" data-original-title="{{ __('default.label.export.description-excel') }}"><a href="javascript:void(0);" class="navi-link" id="export_excel"><i class="navi-icon fa fa-file-excel"></i> {{ __('default.label.export.excel') }} </a></li>
                <li class="navi-item" data-original-title="{{ __('default.label.export.description-pdf') }}"><a href="javascript:void(0);" class="navi-link" id="export_pdf"><i class="navi-icon fa fa-file-pdf"></i> {{ __('default.label.export.pdf') }} </a></li>
              </ul>
            </div>
          </div>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
          @if (!empty($extension) && $extension == 'management-users')
          <a id="reset-password-single" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.reset-password') }}"><i class="fas fa-history text-danger"></i></a>
          @endif
          <form method="POST" id="exilednoname-form" action="{{ URL::current() }}/../{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            @method('DELETE')
            @csrf
            <a id="delete" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.delete./') }}"><i class="fas fa-trash text-danger"></i></a>
          </form>
        </div>
      </div>
      <div class="card-body">
        <div id="printData">
          <div class="table-responsive">
            <table class="table table-hover table-head-custom table-checkable table-sm">
              @if (empty($date) || $date == 'true')
              <tr>
                <td class="align-middle font-weight-bold"> {{ __('default.label.date') }} </td>
                <td>
                  @if(!empty($data->date)) {{ \Carbon\Carbon::parse($data->date)->format('d F Y') }}
                  @else -
                  @endif
                </td>
              </tr>
              @endif
              @if (empty($datetime) || $datetime == 'true')
              <tr>
                <td class="align-middle font-weight-bold"> {{ __('default.label.date-start') }} </td>
                <td>
                  @if(!empty($data->date_start)) {{ \Carbon\Carbon::parse($data->date_start)->format('d F Y') }}
                  @else -
                  @endif
                </td>
              </tr>
              <tr>
                <td class="align-middle font-weight-bold"> {{ __('default.label.date-end') }} </td>
                <td>
                  @if(!empty($data->date_end)) {{ \Carbon\Carbon::parse($data->date_end)->format('d F Y') }}
                  @else -
                  @endif
                </td>
              </tr>
              @endif
              @yield('table-header')
              @if (empty($active) || $active == 'true')
              <tr>
                <td class="align-middle font-weight-bold"> {{ __('default.label.active') }} </td>
                <td>
                  @if( $data->active == 1 ) {{ __('default.label.yes') }}
                  @else {{ __('default.label.no') }}
                  @endif
                </td>
              </tr>
              @endif
              @if (!empty($status) && $status == 'true')
              <tr>
                <td class="align-middle font-weight-bold"> {{ __('default.label.status') }} </td>
                <td>
                  @if( $data->status == 1 )
                  {{ __('default.label.pending') }}
                  @elseif( $data->status == 2 )
                  {{ __('default.label.processing') }}
                  @elseif( $data->status == 3 )
                  {{ __('default.label.in-progress') }}
                  @elseif( $data->status == 4 )
                  {{ __('default.label.success') }}
                  @else
                  {{ __('default.label.unknown') }}
                  @endif
                </td>
              </tr>
              @endif
              <tr>
                <td class="align-middle font-weight-bold"> {{ __('default.label.created_at') }} </td>
                <td> {{ \Carbon\Carbon::parse($data->created_at)->format('d F Y, H:i') }} </td>
              </tr>
              <tr>
                <td width="50%"></td>
                <td></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_activity">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.activities') }} </h3>
        </div>
        <div class="card-toolbar">
          <a class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.print') }}" onclick="printData('printDataActivities')"><i class="fas fa-print"></i></a>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>

      <div class="card-body">
      <div id="printDataActivities">

        <div class="example-preview">
          <div class="timeline timeline-2">
            <div class="timeline-bar"></div>

            @php $activity = activities($model)->where('subject_id', $data->id)->take(7); @endphp
            @if (!empty($activity) && !empty($activity->count()))
            @foreach($activity as $item)
            <div class="timeline-item">

              @foreach($item['properties'] as $data_object)
              @if ($item->description == 'created')
              <span class="timeline-badge bg-success"></span>
              <div class="timeline-content d-flex align-items-center justify-content-between">
                <span class="mr-3">
                  <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
                  @if (!empty($item->causer->name) && !empty($data_object['name']))
                  {{ __('default.activity.item-created') }} <span class="font-weight-bolder"> {{ mb_strimwidth($data_object['name'], 0, 10, ' ...') }} </span>
                  @else
                  {{ __('default.activity.item-created') }} ...
                  @endif
                </span>
              </div>
              @endif
              @endforeach


              @if ($item->description == 'updated')
              @if ($item['properties']['attributes']['deleted_at'] == NULL && !empty($item['properties']['old']['deleted_at']))
              <span class="timeline-badge bg-info"></span>
              <div class="timeline-content d-flex align-items-center justify-content-between">
                <span class="mr-3">
                  <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
                  @if (!empty($item->causer->name) && !empty($data_object['name']))
                  {{ __('default.activity.item-restored') }} <span class="font-weight-bolder"> {{ mb_strimwidth($data_object['name'], 0, 10, ' ...') }} </span>
                  @else
                  {{ __('default.activity.item-restored') }} ...
                  @endif
                </span>
              </div>
              @else
              <span class="timeline-badge bg-warning"></span>
              <div class="timeline-content d-flex align-items-center justify-content-between">
                <span class="mr-3">
                  <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
                  @if (!empty($data_object['name']))
                  {{ __('default.activity.item-updated') }} <span class="font-weight-bolder"> {{ mb_strimwidth($item['properties']['old']['name'], 0, 10, ' ...') }} </span> to <span class="font-weight-bolder"> {{ mb_strimwidth($item['properties']['attributes']['name'], 0, 10, ' ...') }} </span>
                  @else
                  {{ __('default.activity.item-updated') }} ...
                  @endif
                </span>
              </div>
              @endif
              @endif

              @foreach($item['properties'] as $data_object)
              @if ($item->description == 'deleted')
              <span class="timeline-badge bg-danger"></span>
              <div class="timeline-content d-flex align-items-center justify-content-between">
                <span class="mr-3">
                  <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
                  @if (!empty($data_object['name']))
                  {{ __('default.activity.item-deleted') }} <b>{{ $data_object['name'] }}</b>
                  @else
                  {{ __('default.activity.item-deleted') }} ...
                  @endif
                </span>
              </div>
              @endif
              @endforeach

            </div>
            @endforeach
            @else
            <span class="text-muted"> {{ trans('default.activity.no-recent-activities') }} ... </span>
            @endif

          </div>
        </div>

      </div>
    </div>
    </div>
  </div>

</div>

<div class="modal fade" id="qrcode_modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> {{ __('default.label.qr-code') }} </h5>
        <button type="button" class="close" data-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <div id="printQR">
          <p class="text-center"> {!! QrCode::size(300)->generate(URL::current()); !!} </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-icon btn-outline-primary" onclick="printQR('printQR')"><i class="fas fa-print"></i></button>
        <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script> var card = new KTCard('exilednoname_card'); </script>
<script> var card = new KTCard('exilednoname_activity'); </script>
<script>
  function printData(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }

  function printDataActivities(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>

<script>
  function printQR(divName){
    var myWindow=window.open('','','');
    myWindow.document.write(document.getElementById(divName).innerHTML);
    myWindow.document.close();
    myWindow.focus();
    myWindow.print();
    myWindow.document.close();
  }
</script>

<script>
  $('body').on('click', '#delete', function (e) {
    e.preventDefault()
    Swal.fire({ text: "{{ __('default.notification.confirm.delete') }}?", icon: "warning", showCancelButton: true, confirmButtonText: '{{ __("default.label.yes") }}', cancelButtonText: '{{ __("default.label.no") }}', reverseButtons: false }).then(function(result) {
      if (result.value) {
        $(e.target).closest('form').submit()
      }
    });
  });
</script>

<script>
  $('body').on('click', '#reset-password-single', function (e) {
    e.preventDefault()
    Swal.fire({ text: "{{ __('default.notification.confirm.reset-password') }}?", icon: "warning", showCancelButton: true, confirmButtonText: '{{ __("default.label.yes") }}', cancelButtonText: '{{ __("default.label.no") }}', reverseButtons: false }).then(function(result) {
      if (result.value) {
          window.location.href="{{ URL::current() }}/../reset-password-single/{{ $data->id }}";
      }
    });
  });
</script>
@endpush
