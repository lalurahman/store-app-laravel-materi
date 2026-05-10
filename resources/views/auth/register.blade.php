<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >
    <title>Register &mdash; {{ config('app.name', 'Store App') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-gray-50">

    <div class="min-h-screen flex">

        {{-- Left panel --}}
        <div
            class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 relative overflow-hidden flex-col justify-between p-12">
            <div class="absolute inset-0 opacity-10">
                <svg
                    viewBox="0 0 800 800"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-full h-full"
                >
                    <circle
                        cx="400"
                        cy="400"
                        r="300"
                        fill="white"
                    />
                    <circle
                        cx="700"
                        cy="100"
                        r="200"
                        fill="white"
                    />
                    <circle
                        cx="100"
                        cy="700"
                        r="250"
                        fill="white"
                    />
                </svg>
            </div>
            <div class="relative z-10">
                <a
                    href="/"
                    class="flex items-center gap-3"
                >
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg
                            class="w-6 h-6 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                            />
                        </svg>
                    </div>
                    <span class="text-white font-bold text-xl">{{ config('app.name', 'Store App') }}</span>
                </a>
            </div>
            <div class="relative z-10 space-y-6">
                <div>
                    <h2 class="text-4xl font-bold text-white leading-tight">
                        Bergabung bersama<br>ribuan pengguna
                    </h2>
                    <p class="mt-4 text-white/80 text-lg leading-relaxed">
                        Daftar sekarang dan nikmati pengalaman belanja yang mudah, cepat, dan aman.
                    </p>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-white/10 rounded-2xl p-4 text-center">
                        <div class="text-2xl font-bold text-white">10K+</div>
                        <div class="text-white/70 text-sm mt-1">Produk</div>
                    </div>
                    <div class="bg-white/10 rounded-2xl p-4 text-center">
                        <div class="text-2xl font-bold text-white">50K+</div>
                        <div class="text-white/70 text-sm mt-1">Pengguna</div>
                    </div>
                    <div class="bg-white/10 rounded-2xl p-4 text-center">
                        <div class="text-2xl font-bold text-white">4.9★</div>
                        <div class="text-white/70 text-sm mt-1">Rating</div>
                    </div>
                </div>
            </div>
            <div class="relative z-10 flex items-center gap-3">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full bg-pink-300 border-2 border-white"></div>
                    <div class="w-8 h-8 rounded-full bg-yellow-300 border-2 border-white"></div>
                    <div class="w-8 h-8 rounded-full bg-green-300 border-2 border-white"></div>
                </div>
                <p class="text-white/80 text-sm">+2,400 bergabung bulan ini</p>
            </div>
        </div>

        {{-- Right panel --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12">
            <div class="w-full max-w-md">

                {{-- Mobile logo --}}
                <div class="flex justify-center mb-8 lg:hidden">
                    <a
                        href="/"
                        class="flex items-center gap-3"
                    >
                        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center">
                            <svg
                                class="w-6 h-6 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                                />
                            </svg>
                        </div>
                        <span class="text-gray-900 font-bold text-xl">{{ config('app.name', 'Store App') }}</span>
                    </a>
                </div>

                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">Buat akun baru</h1>
                    <p class="mt-2 text-gray-500">Isi form di bawah untuk mendaftar</p>
                </div>

                {{-- Validation errors --}}
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-4">
                        <div class="flex items-start gap-3">
                            <svg
                                class="w-5 h-5 text-red-500 mt-0.5 shrink-0"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                            <ul class="text-sm text-red-600 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form
                    method="POST"
                    action="{{ route('register') }}"
                    class="space-y-5"
                >
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label
                            for="name"
                            class="block text-sm font-medium text-gray-700 mb-1.5"
                        >
                            Nama Lengkap
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg
                                    class="w-5 h-5 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                            </div>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Masukkan nama lengkap"
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border @error('name') border-red-400 bg-red-50 @else border-gray-200 @enderror rounded-xl text-gray-900 placeholder-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            >
                        </div>
                        @error('name')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium text-gray-700 mb-1.5"
                        >
                            Alamat Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg
                                    class="w-5 h-5 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                    />
                                </svg>
                            </div>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                placeholder="nama@email.com"
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border @error('email') border-red-400 bg-red-50 @else border-gray-200 @enderror rounded-xl text-gray-900 placeholder-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            >
                        </div>
                        @error('email')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label
                            for="password"
                            class="block text-sm font-medium text-gray-700 mb-1.5"
                        >
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg
                                    class="w-5 h-5 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                    />
                                </svg>
                            </div>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Minimal 8 karakter"
                                class="w-full pl-10 pr-12 py-3 bg-gray-50 border @error('password') border-red-400 bg-red-50 @else border-gray-200 @enderror rounded-xl text-gray-900 placeholder-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            >
                            <button
                                type="button"
                                onclick="togglePassword('password', 'eye-password')"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600"
                            >
                                <svg
                                    id="eye-password"
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label
                            for="password_confirmation"
                            class="block text-sm font-medium text-gray-700 mb-1.5"
                        >
                            Konfirmasi Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg
                                    class="w-5 h-5 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                    />
                                </svg>
                            </div>
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Ulangi password"
                                class="w-full pl-10 pr-12 py-3 bg-gray-50 border @error('password_confirmation') border-red-400 bg-red-50 @else border-gray-200 @enderror rounded-xl text-gray-900 placeholder-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            >
                            <button
                                type="button"
                                onclick="togglePassword('password_confirmation', 'eye-confirm')"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600"
                            >
                                <svg
                                    id="eye-confirm"
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    />
                                </svg>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full py-3 px-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg shadow-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 flex items-center justify-center gap-2 mt-2"
                    >
                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
                            />
                        </svg>
                        Buat Akun
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-gray-500">
                    Sudah punya akun?
                    <a
                        href="{{ route('login') }}"
                        class="font-semibold text-indigo-600 hover:text-indigo-700 transition"
                    >
                        Masuk di sini
                    </a>
                </p>

            </div>
        </div>

    </div>

    <script>
        function togglePassword(fieldId, iconId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);
            if (field.type === 'password') {
                field.type = 'text';
                icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
            `;
            } else {
                field.type = 'password';
                icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            `;
            }
        }
    </script>

</body>

</html>
