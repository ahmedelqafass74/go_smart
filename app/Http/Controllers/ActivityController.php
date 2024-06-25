<?php

namespace App\Http\Controllers;

use App\Models\Diving;
use App\Models\HistoricalCity;
use App\Models\Relaxation;
use App\Models\Safari;

class ActivityController extends Controller
{
    //
    public function HistoricalAction()
    {
        $historicals = HistoricalCity::all();

        return $historicals;
    }
    public function DivingAction()
    {
        $divings = Diving::all();

        return $divings;
    }
    public function relaxationAction()
    {
        $relaxations = Relaxation::all();

        return $relaxations;
    }
    public function SafariAction()
    {
        $safaris = Safari::all();

        return $safaris;
    }
}
