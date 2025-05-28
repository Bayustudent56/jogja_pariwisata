@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">
    <!-- Gambar kiri -->
    <div class="w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('/assets/tugu.jpg') }}')">
    </div>

    <!-- Form Login -->
    <div class="w-1/2 flex items-center justify-center bg-white shadow-lg">
        <div class="w-3/4 max-w-md">
            <h2 class="text-3xl font-bold mb-6 text-center">Login</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Username -->
                <div class="mb-4">
                    <input id="email" type="email" name="email" placeholder="Username" required autofocus class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <input id="password" type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" />
                </div>

                <!-- Forgot -->
                <div class="text-right mb-4">
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
                </div>

                <!-- Buttons -->
                <div class="flex space-x-4">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M10 17l5-5-5-5v10z"/></svg>
                        Login
                    </button>

                    <a href="{{ route('register') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                        Register
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
