<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

  trix-toolbar [data-trix-button-group="file-tools"] {
    display: none;
  }

  </style>
    <title>{{ $title }}</title>
</head>
<body>
    <div class="md:max-w-5xl max-w-lg mx-auto">

      @if($title == 'Login' || $title == 'Register')
        <main class="mt-12 w-full">
            @yield('content')
        </main>
      @else
      @include('partials.nav')
        <main class="mt-12 w-full px-5 md:px-0">
            @yield('content')
        </main>
      @endif

    </div>

    <script>
      document.addEventListener("trix-file-accept", function(event) {
        event.preventDefault()
      })
    </script>
</body>
</html>
