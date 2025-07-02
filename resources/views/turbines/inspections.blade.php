@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Previous Inspections for {{ $turbine->name }}</h1>

        <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-center">Date</th>
                    @foreach ($components as $component)
                        <th class="border border-gray-300 px-4 py-2 text-center">{{ $component->name }}</th>
                    @endforeach
                    <th class="border border-gray-300 px-4 py-2 text-center">Inspected by</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($groupedRatings as $ratingDate => $componentRatings)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            {{ \Carbon\Carbon::parse($ratingDate)->format('d M Y, h:i A') }}
                        </td>

                        @foreach ($componentRatings as $key => $componentRating)
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                {{ $componentRating->rating }}
                            </td>
                        @endforeach

                        <td class="border border-gray-300 px-4 py-2 text-center">
                            {{ $componentRatings[$key]->user->name }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center p-4">No ratings found for this Turbine.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mb-6 p-4 flex">
            <a href="{{ route('turbines.show', $turbine->id) }}" class="ml-auto bg-pink-600 text-white px-4 rounded font-semibold">
                &larr; Back
            </a>
        </div>
        <div class="mt-4">
            {{ $paginatedRatings->links() }}
        </div>
    </div>
@endsection
