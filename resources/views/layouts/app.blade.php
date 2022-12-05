<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ $title ?? config('app.name') }}</title>

  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/brand.png') }}">

  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-5.2.3/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons-1.10.2/bootstrap-icons.css') }}">

  <style type="text/css">
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap");

    * {
      font-family: "Inter", sans-serif;
    }
  </style>

  {{-- Dashboard Sidebar Styles --}}
  @if ($dashboard)
    <style type="text/css">
      .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
      }

      .sidebar {
        position: fixed;
        top: 0;
        /* rtl:raw:
        right: 0;
        */
        bottom: 0;
        /* rtl:remove */
        left: 0;
        z-index: 100;
        /* Behind the navbar */
        padding: 48px 0 0;
        /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
      }

      @media (max-width: 767.98px) {
        .sidebar {
          top: 5rem;
        }
      }

      .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
      }

      .sidebar .nav-link {
        font-weight: 500;
        color: #333;
      }

      .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #727272;
      }

      .sidebar .nav-link.active {
        color: #2470dc;
      }

      .sidebar .nav-link:hover .feather,
      .sidebar .nav-link.active .feather {
        color: inherit;
      }

      .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
      }
    </style>
  @endif

  @stack('styles')
</head>

<body>
  @if ($dashboard)
    <x-navbar dashboard />

    <div class="container-fluid">
      <div class="row">
        <x-dashboard.sidebar class="col-md-3 col-lg-2 d-md-block" />

        <div class="col-md-9 col-lg-10 ms-sm-auto">
          <main class="py-4 px-md-4">
            {{ $slot }}
          </main>
        </div>
      </div>
    </div>
  @elseif ($home)
    <x-navbar position="fixed-top" />

    <main>
      {{ $slot }}
    </main>
  @else
    <x-navbar position="sticky-top" />

    <main class="container my-3 my-lg-5">
      {{ $slot }}
    </main>
  @endif

  @if (env('APP_DEBUG', false))
    <x-breakpoint-indicator />
  @endif

  @stack('modals')

  <script src="{{ asset('assets/vendor/bootstrap-5.2.3/js/bootstrap.bundle.min.js') }}"></script>

  @stack('scripts')
</body>

</html>
