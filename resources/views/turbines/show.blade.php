@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex items-center mb-6">
            <h1 class="text-2xl font-bold mb-4">
                {{ $turbine->name }}
            </h1>

            @auth
                <a href="{{ route('ratings.create', $turbine->id) }}" class="ml-auto bg-blue-700 text-white px-4 py-2 rounded font-semibold">
                    Submit Rating
                </a>
            @endauth
        </div>

        @if($turbine->components->count())
            <ul class="space-y-4">
                @foreach($turbine->components as $component)
                    <li class="p-4 border rounded bg-white shadow-sm flex justify-between items-center">
                        <span class="font-medium text-gray-700">{{ $component->name }}</span>

                        @if($component->recentRating && $component->recentRating->turbine_id == $turbine->id)
                            <span class="text-md text-gray-700">
                                Rating: {{ $component->recentRating->rating }}
                            </span>
                        @else
                            <span class="text-sm text-gray-500">
                                No ratings yet
                            </span>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>No components found for this Turbine.</p>
        @endif

        <div class="mb-6 p-4 flex">
            <a href="{{ route('turbines.index') }}" class="ml-auto bg-pink-700 text-white px-4 rounded font-semibold">
                &larr; Back to all Turbines
            </a>
        </div>
    </div>
@endsection
