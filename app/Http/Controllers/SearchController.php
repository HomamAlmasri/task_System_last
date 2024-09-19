<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class SearchController extends Controller
{
    public function __invoke()
    {
        $tasks = Task::where('title', 'LIKE', '%' . request('q') . '%')->get();

        return view('results', ['tasks' => $tasks]);
    }
}
