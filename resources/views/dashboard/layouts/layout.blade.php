<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
  <link rel="icon" href="{{ asset('assets/images/logo-icon.png') }}" type="image/png">
</head>
<body class="dark:bg-neutral-800 bg-neutral-100 dark:text-white">
  <x-sidebar />
  <main class="dashboard-main">
    
    <x-navbaradmin />
    <div class="dashboard-main-body">
      @yield('content')
    </div>
    
    {{-- <footer class="d-footer">
      <div class="flex items-center justify-between gap-3">
          <p class="mb-0">© 2025 Nupet. All Rights Reserved.</p>
          <p class="mb-0">Made by <span class="text-primary-600">Nupet</span></p>
      </div>
    </footer> --}}
  </main>
  <x-script  script='{!! isset($script) ? $script : "" !!}' />
  @yield('scripts')
</body>
</html>