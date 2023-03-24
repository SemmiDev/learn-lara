<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
    <title>{{ $title }}</title>
</head>
<body>
    <div class="md:max-w-5xl max-w-lg mx-auto">
        @include('partials.nav')

        <main class="mt-12 w-full">
            @yield('content')
        </main>
    </div>
</body>
</html>
