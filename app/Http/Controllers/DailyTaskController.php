<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreDailyTaskRequest;
use App\Models\DailyTask;
use Illuminate\Http\Request;

class DailyTaskController extends Controller
{
    public function create()
    {
        return view('daily_task.create');
    }

    public function store(StoreDailyTaskRequest $dailyTaskRequest)
    {
        $validatedData = $dailyTaskRequest->validated();

        // Extract arrays from validated data
        $projects = $validatedData['project'];
        $features = $validatedData['feature'];
        $timeTakens = $validatedData['time_taken'];
        $dates = $validatedData['day'];
        $descriptions = $validatedData['description'];

        // Loop through the arrays and create a DailyTask for each set of inputs
        foreach ($projects as $index => $project) {
            DailyTask::create([
                'project' => $project,
                'feature' => $features[$index],
                'time_taken' => $timeTakens[$index],
                'date' => $dates[$index],
                'description' => $descriptions[$index],
            ]);
        }

        return redirect('/')->with('success', 'Daily tasks created successfully!');
    }
}
