<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>404 | Page Not Found</title>
</head>

<body class="bg-red-600">
    <div class="flex flex-col items-center justify-center h-screen w-screen">
        <img src="{{ asset('img/404.png') }}" alt="404" class="md:w-72 2xl:w-96 w-52">
        <p class="px-5 sm:px-0 text-lg sm:text-3xl font-bold text-red-200 tracking-wide mt-5 text-center">
            Woops. Looks like this page doesn't exist.
        </p>
        <p class="sm:text-xl text-black hover:text-red-200 cursor-pointer animate-bounce mt-5">
            <a href="{{ route('dashboard') }}">
                Back to Home
            </a>
        </p>
    </div>

    <div class="flex -mt-10 justify-center text-black"><a href="http://www.freepik.com">Designed by stories / Freepik</a></div>

</body>

</html>
