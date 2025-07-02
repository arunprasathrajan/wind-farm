@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Turbines List</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($turbines as $turbine)
                <div class="bg-white rounded-lg shadow-md flex flex-col p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $turbine->name }}</h2>

                    <a href="{{ route('turbines.show', $turbine->id) }}" class="mt-4 inline-block bg-blue-600 text-white text-center py-2 rounded">
                       View
                    </a>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">No Turbines available.</p>
            @endforelse
        </div>
    </div>
@endsection
