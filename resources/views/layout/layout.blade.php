<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="bg-dark text-light">
    <div class="flex  justify-center"></div>
    <!-- Nav -->
    <nav class="d-flex justify-content-around w-100 p-3 navigation">
        <div class="logo w-25 h-auto d-flex justify-content-center">
            <a class="text-decoration-none cursor-pointer" href="{{route('home')}}">
                <img class="" src="{{ url('/image/logo.png') }}" alt="Image"
                    style="max-height: 50px; object-fit: contain;" />
            </a>
        </div>
        <nav class="flex-grow-1 items-center">
            @include('nav/nav')
        </nav>
    </nav>
    <!-- Nav end -->

    <!-- Body -->
    <div>
        @yield('body')
    </div>
    <!-- body end -->


    <!-- Footer -->
    <footer>

    </footer>
    <!-- Footer end -->

</body>

</html>
