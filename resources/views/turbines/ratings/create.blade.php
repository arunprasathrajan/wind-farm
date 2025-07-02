@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Submit Ratings for "{{ $turbine->name }}"</h2>

        @if ($errors->any())
            <div class="bg-red-100 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-700">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('ratings.store', $turbine) }}">
            @csrf

            <label for="inspected_at" class="block font-semibold mb-2">Date of Inspection</label>
            <input type="datetime-local" name="inspected_at" id="inspected_at" value="{{ old('inspected_at', date('Y-m-d')) }}" class="mb-6 p-2 border rounded w-full" required />

            <div class="space-y-4">
                @foreach($turbine->components as $component)
                    <div class="flex items-center justify-between">
                        <span class="font-medium">{{ $component->name }}</span>
                        
                        <select name="ratings[{{ $component->id }}]" required class="p-1 border rounded">
                            <option value="" disabled selected>Rate 1-5</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" @selected(old("ratings.{$component->id}") == $i) }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                        </select>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="mt-6 bg-blue-700 text-white px-4 rounded font-semibold">
                Submit Ratings
            </button>
        </form>

        <div class="mb-6 p-4 flex">
            <a href="{{ route('turbines.show', $turbine->id) }}" class="ml-auto bg-pink-700 text-white px-4 rounded font-semibold">
                &larr; Back
            </a>
        </div>
    </div>
@endsection
