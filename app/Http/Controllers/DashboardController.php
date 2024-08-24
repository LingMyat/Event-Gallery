<?php

namespace App\Http\Controllers;

use App\Models\Photo;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'photos' => Photo::where('status', 'pending')->with(['user', 'event'])->orderByDesc('created_at')->get()
        ]);
    }
}
