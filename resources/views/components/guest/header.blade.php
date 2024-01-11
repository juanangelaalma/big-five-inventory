<div class="max-w-6xl mx-auto">
    <div class="container flex flex-col bg-white px-6">
        <x-guest.navbar />
        <div class="grid w-full grid-cols-1 my-auto mt-12 mb-8 md:grid-cols-2 xl:gap-14 md:gap-5">
            <div class="flex flex-col justify-center col-span-1 text-center lg:text-start">
                <div class="flex items-center justify-center mb-4 lg:justify-normal">
                    <img class="h-5"
                        src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/logos/logo-1.png"
                        alt="logo">
                    <h4 class="ml-2 text-sm font-bold tracking-widest text-primary uppercase">Identifikasi Kepribadian</h4>
                </div>
                <h1 class="mb-8 text-4xl font-extrabold leading-tight lg:text-6xl text-dark-grey-900">Tes Kepribadian
                Online</h1>
                <p class="mb-6 text-base font-normal leading-7 lg:w-3/4 text-grey-900">
                    Kenali diri dengan identifikasi kepribadian lengkap. Dengan biaya terjangkau, sekali klik, anda sudah dapat mengikuti tes identifikasi kepribadian. Hasil tes (laporan hasil tes psikologi / psikogram) dapat diakses dalam waktu 1 x 24 jam setelah penyelesaian tes.
                </p>
                <div class="flex flex-col items-center gap-4 lg:flex-row">
                    <x-guest.primary-button href="{{ route('register') }}" class="lg:w-1/2 py-3">
                        Daftar
                    </x-guest.primary-button>
                </div>
            </div>
            <div class="items-center justify-end hidden col-span-1 md:flex">
                <img class="w-4/5 rounded-md"
                    src="{{ asset('images/header.webp') }}"
                    alt="header image">
            </div>
        </div>
    </div>
</div>
