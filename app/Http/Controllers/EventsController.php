<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Routing\Controller as BaseController;

class EventsController extends BaseController
{
    public function getWarmupEvents()
    {
        return Event::all();
    }

    public function getEventsWithWorkshops()
    {
        return Event::with('workshops')->get();
    }

    public function getFutureEventsWithWorkshops()
    {
        return Event::whereHas('workshops', function ($query) {
            $query->where('start', '>', now());
        })->with('workshops')->get();
    }
}
