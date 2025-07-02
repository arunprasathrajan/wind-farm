@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-md mt-20 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Inspector Login</h1>

        @if ($errors->any())
            <div class="bg-red-100 mb-4 p-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-700">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('inspector.login') }}">
            @csrf

            <label for="email" class="block mb-1 font-semibold">Email</label>
            <input type="email" name="email" id="email" required class="w-full mb-4 p-2 border rounded" value="{{ old('email') }}">

            <label for="password" class="block mb-1 font-semibold">Password</label>
            <input type="password" name="password" id="password" required class="w-full mb-4 p-2 border rounded">

            <button type="submit" class="w-full bg-blue-700 text-white py-2 rounded font-semibold">
                Login
            </button>
        </form>
    </div>
@endsection
