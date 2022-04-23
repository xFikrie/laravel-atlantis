<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>403 | Forbidden Error</title>
</head>

<body class="bg-slate-900">
    <div class="flex flex-col items-center justify-center h-screen w-screen">
        <img src="{{ asset('img/403.png') }}" alt="403" class="md:w-72 2xl:w-96 w-52">
        <p class="px-5 sm:px-0 text-lg sm:text-3xl font-bold text-green-200 tracking-wide mt-5 text-center">
            You don't have permission to access this page
        </p>
        <p class="sm:text-xl text-white hover:text-green-200 cursor-pointer animate-bounce mt-5">
            <a href="{{ route('dashboard') }}">
                Back to Home
            </a>
        </p>
    </div>

    <div class="flex -mt-10 justify-center text-white"><a href="http://www.freepik.com">Designed by stories / Freepik</a></div>

</body>

</html>
