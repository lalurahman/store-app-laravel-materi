<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body
    class="bg-gradient-to-br from-blue-700 via-blue-800 to-indigo-950 min-h-screen flex items-center justify-center p-4"
>

    <div class="w-full max-w-md">

        <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl shadow-2xl overflow-hidden p-8">

            <div class="flex justify-center mb-6">
                <div class="bg-white/10 p-4 rounded-2xl border border-white/10">
                    <svg
                        class="w-12 h-12"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M8.35417 10.1932L1.13542 6.13636V13.8409L8.35417 17.8977V10.1932Z"
                            fill="#FF2D20"
                        />
                        <path
                            d="M15.6458 6.13636L8.42708 2.07955V9.78409L15.6458 13.8409V6.13636Z"
                            fill="#FF2D20"
                        />
                        <path
                            d="M15.6458 13.8409L8.42708 17.8977V21.9205L15.6458 17.8977V13.8409Z"
                            fill="#FF2D20"
                        />
                        <path
                            d="M22.8646 10.1932L15.6458 6.13636V13.8409L22.8646 17.8977V10.1932Z"
                            fill="#FF2D20"
                        />
                        <path
                            d="M15.6458 21.9205L22.8646 17.8977V10.1932L15.6458 14.25V21.9205Z"
                            fill="#FF2D20"
                        />
                    </svg>
                </div>
            </div>

            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-white tracking-tight">Selamat Datang</h2>
                <p class="text-blue-100/60 text-sm mt-1">Silakan masuk ke akun Anda</p>
            </div>

            <form
                method="POST"
                action="{{ route('login') }}"
                class="space-y-5"
            >
                @csrf

                <div>
                    <label
                        for="email"
                        class="block text-sm font-medium text-blue-100 mb-1.5 ml-1"
                    >Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-blue-200/30 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/10 transition-all"
                        placeholder="nama@email.com"
                    >
                    @error('email')
                        <span class="text-red-400 text-xs mt-1 ml-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <div class="flex justify-between mb-1.5 ml-1">
                        <label
                            for="password"
                            class="block text-sm font-medium text-blue-100"
                        >Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a
                                href="{{ route('password.request') }}"
                                class="text-xs text-blue-300 hover:text-white transition"
                            >Lupa?</a>
                        @endif
                    </div>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-blue-200/30 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/10 transition-all"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <span class="text-red-400 text-xs mt-1 ml-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center ml-1">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="rounded border-white/20 bg-white/5 text-blue-600 focus:ring-blue-500"
                    >
                    <label
                        for="remember_me"
                        class="ml-2 text-sm text-blue-100/70"
                    >Ingat saya</label>
                </div>

                <button
                    type="submit"
                    class="w-full py-3.5 bg-white text-blue-900 font-bold rounded-xl shadow-lg hover:bg-blue-50 transform transition active:scale-[0.98]"
                >
                    Masuk
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-blue-100/50">
                    Belum punya akun?
                    <a
                        href="{{ route('register') }}"
                        class="text-white font-semibold hover:underline decoration-blue-500 underline-offset-4"
                    >Daftar</a>
                </p>
            </div>
        </div>

        <p class="text-center mt-8 text-blue-200/40 text-xs">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </p>
    </div>

</body>

</html>
