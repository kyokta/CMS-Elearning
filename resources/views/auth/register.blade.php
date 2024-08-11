<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="detik.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://unpkg.com/heroicons@1.0.6/dist/heroicons.css" rel="stylesheet">
    <title>Registrasi - Detik</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-lg md:h-[80vh] w-[80vh] rounded-2xl h-full">
            <div class="flex flex-col items-center justify-center h-full w-full gap-10">
                <img src="detik.png" class="h-24 w-24" alt="Logo">
                <span class="text-3xl font-bold text-gray-700">Registrasi Akun</span>
                <form action="{{ route('registrasi') }}" method="POST" class="flex flex-col gap-4 w-full px-10">
                    @csrf
                    <div class="relative">
                        <input type="text" name="name" placeholder="Nama Lengkap"
                            class="w-full px-4 py-2 pr-16 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        <i class="fas fa-user absolute top-3 right-3 text-gray-500"></i>
                        @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative">
                        <input type="email" name="email" placeholder="Email"
                            class="w-full px-4 py-2 pr-16 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        <i class="fas fa-envelope absolute top-3 right-3 text-gray-500"></i>
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative">
                        <input type="password" name="password" placeholder="Password"
                            class="w-full px-4 py-2 pr-16 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        <i class="fas fa-lock absolute top-3 right-3 text-gray-500"></i>
                        @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative">
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                            class="w-full px-4 py-2 pr-16 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        <i class="fas fa-lock absolute top-3 right-3 text-gray-500"></i>
                    </div>
                    <button type="submit"
                        class="bg-gray-800 text-white py-2 px-10 rounded-full font-bold hover:bg-gray-500">Register</button>
                </form>
                <div class="flex flex-row">
                    <span>Sudah memiliki akun? <a class="underline underline-offset-2"
                            href="{{ route('loginForm') }}">Masuk</a></span>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.0/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>

</html>