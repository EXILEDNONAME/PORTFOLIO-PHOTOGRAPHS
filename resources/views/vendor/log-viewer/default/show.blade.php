@extends('layouts.backend.default', ['administrative' => 'true'])
@section('title', 'Statistic Details')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_date">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ \Carbon\Carbon::parse($log->date)->format('d F Y'); }}</h3>
        </div>
        <div class="card-toolbar">
          <a href="/dashboard/administratives/statistics/logs" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">

  <div class="col-lg-3">
    {{-- Log Menu --}}
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_level">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> @lang('Levels') </h3>
        </div>
        <div class="card-toolbar">
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>
      <div class="card-body">
        <div class="list-group list-group-flush log-menu">
          @foreach($log->menu() as $levelKey => $item)
          @if ($item['count'] === 0)
          <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center disabled">
            <span class="level-name">{!! $item['icon'] !!} {{ $item['name'] }}</span>
            <span class="badge empty">{{ $item['count'] }}</span>
          </a>
          @else
          <a href="{{ $item['url'] }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center level-{{ $levelKey }}{{ $level === $levelKey ? ' active' : ''}}">
            <span class="level-name">{!! $item['icon'] !!} {{ $item['name'] }}</span>
            <span class="badge badge-level-{{ $levelKey }}">{{ $item['count'] }}</span>
          </a>
          @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-9">

    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_detail">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.details') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ route('log-viewer::logs.download', [$log->date]) }}">
            <button type="button" class="btn btn-clean btn-xs btn-icon btn-icon-md">
              <i class="fas fa-download"></i>
            </button>
          </a>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-condensed mb-0">
            <tbody>
              <tr>
                <td class="text-nowrap">@lang('File path')</td>
                <td class="text-nowrap">{{ $log->getPath() }}</td>
              </tr>
              <tr>
                <td class="text-nowrap">@lang('Log entries')</td>
                <td class="text-nowrap">{{ $entries->total() }}</td>
              </tr>
              <tr>
                <td class="text-nowrap">@lang('Size')</td>
                <td class="text-nowrap">{{ $log->size() }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <hr>
        <form action="{{ route('log-viewer::logs.search', [$log->date, $level]) }}" method="GET">
          <div class="form-group">
            <div class="input-group">
              <input type="search" id="query" name="query" class="form-control" value="{{ $query }}" placeholder="@lang('Type here to search')">
              @unless (is_null($query))
              <a href="{{ route('log-viewer::logs.show', [$log->date]) }}" class="btn btn-light">
                (@lang(':count results', ['count' => $entries->count()])) <i class="fa fa-fw fa-times"></i>
              </a>
              @endunless
              <button id="search-btn" class="btn btn-primary">
                <span class="fa fa-fw fa-search"></span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_log">
      @if ($entries->hasPages())
      <div class="card-header">
        <span class="badge text-bg-info float-right">
          {{ __('Page :current of :last', ['current' => $entries->currentPage(), 'last' => $entries->lastPage()]) }}
        </span>
      </div>
      @endif

      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.logs') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="entries" class="table mb-0">
            <thead>
              <tr>
                <th style="width: 65px;">@lang('Time')</th>
                <th>@lang('Header')</th>
              </tr>
            </thead>
            <tbody>
              @forelse($entries as $key => $entry)
              <tr>
                <td>
                  {{ $entry->datetime->format('H:i:s') }}
                </td>
                <td>
                  {{ $entry->header }}
                </td>
              </tr>
              @empty
              <tr>
                <span class="badge text-bg-secondary">@lang('The list of logs is empty!')</span>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {!! $entries->appends(compact('query'))->render() !!}
  </div>
</div>
@endsection

@push('js')
<script>
  var card = new KTCard('exilednoname_level');
  var card = new KTCard('exilednoname_detail');
  var card = new KTCard('exilednoname_log');
</script>
@endpush
