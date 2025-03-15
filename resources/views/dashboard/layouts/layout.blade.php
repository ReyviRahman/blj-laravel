<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="dark:bg-neutral-800 bg-neutral-100 dark:text-white">
  <x-sidebar />
  <main class="dashboard-main">
    <x-navbaradmin />
    <div class="dashboard-main-body">
      @yield('content')
    </div>
    <footer class="d-footer">
      <div class="flex items-center justify-between gap-3">
          <p class="mb-0">© 2025 Nupet. All Rights Reserved.</p>
          <p class="mb-0">Made by <span class="text-primary-600">Nupet</span></p>
      </div>
    </footer>
  </main>
  <x-script  script='{!! isset($script) ? $script : "" !!}' />
</body>
</html>