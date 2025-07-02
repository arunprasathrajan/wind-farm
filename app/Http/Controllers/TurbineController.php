<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Turbine;
use Illuminate\View\View;

class TurbineController extends Controller
{
    /**
     * Display a list of turbines.
     *
     * @return View
     */
    public function index(): View
    {
        $turbines = Turbine::get();

        return view('turbines.index', compact('turbines'));
    }

    /**
     * Display the specified turbine with its components.
     * 
     * @param  Turbine  $turbine
     * 
     * @return View
     */
    public function show(Turbine $turbine): View
    {
        $turbine->load('components.recentRating');

        return view('turbines.show', compact('turbine'));
    }

    /**
     * Show the inspection history for a turbine.
     * 
     * @param  Turbine $turbine
     * 
     * @return View
     */
    public function inspectionHistory(Turbine $turbine): View
    {
        $components = $turbine->components()->orderBy('id')->get();;

        $paginatedRatings = Rating::with(['component', 'user'])
            ->where('turbine_id', $turbine->id)
            ->orderBy('inspected_at', 'desc')
            ->orderBy('component_id')
            ->paginate(50);

        $groupedRatings = $paginatedRatings->getCollection()
            ->groupBy(fn($ratings) => $ratings->inspected_at->format('Y-m-d H:i'));

        return view('turbines.inspections', compact('turbine', 'components', 'paginatedRatings', 'groupedRatings'));
    }
}
