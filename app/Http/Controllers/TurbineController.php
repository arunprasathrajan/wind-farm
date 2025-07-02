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
}
