<div class="min-h-screen flex pt-6 sm:pt-0 2xl:bg-white">
    <div class="sm:w-3/12 px-5">
        <div>
            {{ $logo }}
            {{ $judul }}
        </div>

        <div class="mt-6 sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <div class="sm:w-9/12 bg-cover bg-no-repeat bg-center hidden sm:block"
        style="background-image: url({{ asset('img/bg-login.jpg') }})">
    </div>
</div>
