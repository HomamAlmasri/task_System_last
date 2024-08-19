<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class SearchController extends Controller
{
    public function __invoke()
    {
        $jobs = Job::where('title', 'LIKE', '%' . request('q') . '%')->get();

        return view('results', ['jobs' => $jobs]);
    }
}
