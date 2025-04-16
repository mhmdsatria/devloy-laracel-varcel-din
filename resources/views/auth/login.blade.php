<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
        <div class="flex items-center justify-center w-full gap-4 mb-4">
            <img class="w-18 h-18" src="{{ asset('img/Lambang_Kab_Sukabumi.svg') }}" alt="Logo Kiri">
            <img class="w-18 h-18" src="{{ asset('img/puskesmas-seeklogo-3.svg') }}" alt="Logo Kanan">
        </div>
        
        <h1 class="font-bold text-center text-2xl mb-5">Login</h1>
        <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
            <form method="POST" action="{{ route('login') }}" class="px-5 py-7">
                @csrf
                <label class="font-semibold text-sm text-gray-600 pb-1 block">E-mail</label>
                <input type="email" name="email" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                    required />

                <label class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                <input type="password" name="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                    required />

                <button type="submit"
                    class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                    <span class="inline-block mr-2">Login</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>

                @if ($errors->any())
                    <div class="text-red-500 text-sm mt-2">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </form>

            <div class="py-5">
                <div class="grid grid-cols-2 gap-1">
                    <div class="text-center sm:text-left whitespace-nowrap">
                        <a href="#"
                            class="transition duration-200 mx-5 px-5 py-4 text-gray-500 hover:bg-gray-100 focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset rounded-lg">
                            <span class="inline-block ml-1">Forgot Password</span>
                        </a>
                    </div>
                    <div class="text-center sm:text-right whitespace-nowrap">
                        <a href="#"
                            class="transition duration-200 mx-5 px-5 py-4 text-gray-500 hover:bg-gray-100 focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset rounded-lg">
                            <span class="inline-block ml-1">Help</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
