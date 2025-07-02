<?php

namespace App\Http\Controllers;

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
}
