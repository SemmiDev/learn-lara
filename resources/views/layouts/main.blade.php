<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

        <script>
            tailwind.config = {
                daisyui: {
                    themes: [{
                        mytheme: {
                            primary: "#a991f7",
                            secondary: "#f6d860",
                            accent: "#37cdbe",
                            neutral: "#3d4451",
                            "base-100": "#ffffff",

                            "--rounded-box": "1rem", // border radius rounded-box utility class, used in card and other large boxes
                            "--rounded-btn": "0.5rem", // border radius rounded-btn utility class, used in buttons and similar element
                            "--rounded-badge": "1.9rem", // border radius rounded-badge utility class, used in badges and similar
                            "--animation-btn": "0.25s", // duration of animation when you click on button
                            "--animation-input": "0.2s", // duration of animation for inputs like checkbox, toggle, radio, etc
                            "--btn-text-case": "uppercase", // set default text transform for buttons
                            "--btn-focus-scale": "0.95", // scale transform of button when you focus on it
                            "--border-btn": "1px", // border width of buttons
                            "--tab-border": "1px", // border width of tabs
                            "--tab-radius": "0.5rem", // border radius of tabs
                        },
                    }, ],
                },
            }
        </script>
    </style>
    <title>{{ $title }}</title>
</head>

<body>
    <div class="md:max-w-5xl max-w-lg mx-auto">

        @if ($title == 'Login' || $title == 'Register')
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
