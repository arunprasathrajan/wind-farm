<?php

namespace App\Http\Controllers;

use App\Models\Turbine;
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
}
