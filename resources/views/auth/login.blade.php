<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <title>Login</title>
</head>

<body>
    <div class="relative flex flex-col justify-center h-screen overflow-hidden">
        <div class="w-full p-6 m-auto bg-white rounded-md shadow-md ring-2 ring-gray-800/50 lg:max-w-xl">
            <h1 class="text-3xl font-semibold text-center text-gray-700">Login</h1>
            <form action="{{ route('login.action') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Error Handling --}}
                @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Email --}}
                <div>
                    <label class="label">
                        <span class="text-base label-text">Email</span>
                    </label>
                    <input name="email" type="email" placeholder="Email Address" value="{{ old('email') }}"
                        class="w-full input input-bordered" required />
                </div>

                {{-- Password --}}
                <div>
                    <label class="label">
                        <span class="text-base label-text">Password</span>
                    </label>
                    <input name="password" type="password" placeholder="Enter Password"
                        class="w-full input input-bordered" required />
                </div>

                {{-- Remember me --}}
                <div>
                    <label class="label cursor-pointer">
                        <span class="label-text">Remember me</span>
                        <input name="remember" type="checkbox" class="checkbox checkbox-primary" />
                    </label>
                </div>

                {{-- Submit --}}
                <div>
                    <button type="submit" class="btn btn-block bg-indigo-600 text-white hover:bg-indigo-700">
                        Login
                    </button>
                </div>

                {{-- Register link --}}
                <p class="text-center text-sm text-gray-500">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register here</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
