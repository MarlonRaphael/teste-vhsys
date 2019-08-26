<!-- Breadcrumb -->
<div class="row align-items-center">
  <div class="col-lg-12 col-12">
    <nav aria-label="breadcrumb">
      @if (count($breadcrumbs))
        <ol class="breadcrumb bg-translucent-default my-3">
          @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
              <li class="breadcrumb-item">
                <a href="{{ $breadcrumb->url }}" class="text-cyan">
                  @if($breadcrumb->title == 'Dashboard')<i class="fas fa-home mx-2"></i>@endif
                  {{ $breadcrumb->title }}
                </a>
              </li>
            @else
              <li class="breadcrumb-item active text-white">
                @if($breadcrumb->title == 'Dashboard')<i class="fas fa-home mx-2"></i>@endif
                {{ $breadcrumb->title }}
              </li>
            @endif
          @endforeach
        </ol>
      @endif
    </nav>
  </div>
</div>
<!-- End Breadcrumb -->