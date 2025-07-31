@extends('layouts.backend.default', ['administrative' => 'true'])
@section('title', 'Statistic Logs')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.logs') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ URL::Current() }}/../#" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>
          <a class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.print') }}" onclick="printData('printData')"><i class="fas fa-print"></i></a>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>
      <div class="card-body">
        <div id="printData">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  @foreach($headers as $key => $header)
                  <th scope="col" class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                    @if ($key == 'date')
                    <span class="badge text-bg-info">{{ $header }}</span>
                    @else
                    <span class="badge badge-level-{{ $key }}">
                      {{ log_styler()->icon($key) }} {{ $header }}
                    </span>
                    @endif
                  </th>
                  @endforeach
                  <th scope="col" class="text-end" width="1"></th>
                </tr>
              </thead>
              <tbody>
                @forelse($rows as $date => $row)
                <tr>
                  @foreach($row as $key => $value)
                  <td class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                    @if ($key == 'date')
                    <span class="badge text-bg-primary"> {{ \Carbon\Carbon::parse($value)->format('d F Y'); }} </span>
                    @elseif ($value == 0)
                    <span class="badge empty">{{ $value }}</span>
                    @else
                    <a href="{{ route('log-viewer::logs.filter', [$date, $key]) }}">
                      <span class="badge badge-level-{{ $key }}">{{ $value }}</span>
                    </a>
                    @endif
                  </td>
                  @endforeach
                  <td class="text-end">
                    <div class="dropdown dropdown-inline">
                      <button type="button" class="btn btn-hover-light-dark btn-icon btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></button>
                      <div class="dropdown-menu dropdown-menu-xs" style="">
                        <ul class="navi navi-hover py-5">
                          <li class="navi-item"><a href="{{ route('log-viewer::logs.show', [$date]) }}" class="navi-link"><span class="navi-icon"><i class="fas fa-search"></i></span><span class="navi-text"> {{ __("default.label.view") }} </span></a></li>
                          <li class="navi-item"><a href="{{ route('log-viewer::logs.download', [$date]) }}" class="navi-link"><span class="navi-icon"><i class="fas fa-download"></i></span><span class="navi-text"> {{ __("default.label.download") }} </span></a></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="11" class="text-center">
                    <span class="badge text-bg-secondary">@lang('The list of logs is empty!')</span>
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection


@push('js')
<script> var card = new KTCard('exilednoname_card'); </script>
<script>
function printData(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}
</script>
@endpush
