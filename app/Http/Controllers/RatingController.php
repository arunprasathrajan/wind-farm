<?php

namespace App\Http\Controllers;

use App\Models\Turbine;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RatingController extends Controller
{
    /**
     * Show the form page for rating the Turbine's Components.
     * 
     * @param  Turbine $turbine
     * 
     * @return View
     */
    public function create(Turbine $turbine): View
    {
        $turbine->load('components');

        return view('turbines.ratings.create', compact('turbine'));
    }

    /**
     * Save the newly submitted rating.
     * 
     * @param  Request $request
     * @param  Turbine $turbine
     *
     * @return RedirectResponse
     */
    public function store(Request $request, Turbine $turbine): RedirectResponse
    {
        $request->validate([
            'ratings' => 'required|array',
            'ratings.*' => 'required|integer|min:1|max:5',
            'inspected_at' => 'required|date|before_or_equal:today',
        ]);

        $user = Auth::user();

        foreach ($request->ratings as $componentId => $rating) {
            Rating::create([
                'user_id' => $user->id,
                'turbine_id' => $turbine->id,
                'component_id' => $componentId,
                'rating' => $rating,
                'inspected_at' => $request->inspected_at,
            ]);
        }

        return redirect()->route('turbines.show', $turbine)->with('success', 'Ratings submitted successfully!');
    }
}
