<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <div class="d-flex align-items-center flex-wrap mr-1">
      <div class="d-flex align-items-baseline flex-wrap mr-5">
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
          @if (!empty($page) && $page == 'dashboard' || !empty($administrative) && $administrative == 'true')
          <li class="breadcrumb-item"><span class="text-muted"><i class="fas fa-desktop"></i></li>
          <li class="breadcrumb-item"><span class="text-muted"> Dashboard </span></li>

          @elseif (!empty($page) && $page == 'statistics')
          <li class="breadcrumb-item"><a href="/dashboard"><i class="menu-icon fas fa-desktop"></i></a></li>
          <?php $link = "" ?>
          @for($i = 2; $i <= count(Request::segments()); $i++)
          @if($i < count(Request::segments()) & $i > 0)
          <?php $link .= "/" . Request::segment($i); ?>
          <li class="breadcrumb-item"><a href="/dashboard<?= $link ?>"> {{ ucwords(str_replace('-',' ',Request::segment($i)))}} </a></li>
          @else
          <li class="breadcrumb-item"><span class="text-muted"> {{ucwords(str_replace('-',' ',Request::segment($i)))}} </span></li>
          @endif
          @endfor

          @else
          <li class="breadcrumb-item"><a href="/dashboard"><i class="menu-icon fas fa-desktop"></i></a></li>
          <?php $link = "" ?>
          @for($i = 2; $i <= count(Request::segments()); $i++)
          @if($i < count(Request::segments()) & $i > 0)
          <?php $link .= "/" . Request::segment($i); ?>
          <li class="breadcrumb-item"><a href="/dashboard<?= $link ?>"> {{ ucwords(str_replace('-',' ',Request::segment($i)))}} </a></li>
          @else
          <li class="breadcrumb-item"><span class="text-muted"> {{ucwords(str_replace('-',' ',Request::segment($i)))}} </span></li>
          @endif
          @endfor
          @endif
        </ul>
      </div>
    </div>

    <div class="d-flex align-items-center">
      @if (!empty($page) && $page == 'datatable-index')
      <a href="{{ URL::Current() }}/activities" title="{{ __('default.label.activities') }}" class="btn btn-xs btn-icon btn-info mr-1"><i class="fas fa-history"></i></a>
      <a href="{{ URL::Current() }}/trash" title="{{ __('default.label.trash') }}" class="btn btn-xs btn-icon btn-danger"><i class="fas fa-trash"></i></a>
      @endif
    </div>

  </div>
</div>
