<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="detik.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://unpkg.com/heroicons@1.0.6/dist/heroicons.css" rel="stylesheet">
    <title>Login - Detik</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="h-screen flex items-center justify-center bg-gray-100 relative">
        <div class="bg-white shadow-lg h-[80vh] w-[80vh] rounded-2xl">
            <div class="flex flex-col items-center justify-center h-full w-full gap-10">
                <img src="detik.png" class="h-24 w-24">
                <span class="text-3xl font-bold text-gray-700">Masuk ke Akun</span>
                <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4 w-full px-10">
                    @csrf
                    <div class="relative">
                        <input type="text" name="email" placeholder="Email"
                            class="w-full px-4 py-2 pr-16 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('email') }}" required>
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
                    <button type="submit"
                        class="bg-gray-800 text-white py-2 px-10 rounded-full font-bold hover:bg-gray-500">Login</button>
                </form>
                <div class="flex flex-row">
                    <span>Belum memiliki akun? <a class="underline underline-offset-2"
                            href="{{ route('registrasiForm') }}">Registrasi</a></span>
                </div>
            </div>
        </div>
        @if (session('success'))
        <div id="success-message"
            class="absolute top-4 right-4 text-green-600 bg-green-100 border border-green-200 px-4 py-2 rounded-md shadow-md">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div id="error-message"
            class="absolute top-4 right-4 text-red-600 bg-red-100 border border-red-200 px-4 py-2 rounded-md shadow-md">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
    </div>

    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.0/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const successMessage = document.getElementById('success-message');
        const errorMessage = document.getElementById('error-message');
        if (successMessage) {
            successMessage.style.display = 'block';
            setTimeout(function() {
                successMessage.style.opacity = '0';
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 500);
            }, 3000);
        }
        if (errorMessage) {
            errorMessage.style.display = 'block';
            setTimeout(function() {
                errorMessage.style.opacity = '0';
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 500);
            }, 3000);
        }
    });
    </script>

</body>

</html>