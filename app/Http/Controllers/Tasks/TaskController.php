<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Services\TimeService;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('task.index', [
            'tasks' => $tasks,
            'users' => User::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        // dd(Auth::user()->role, auth()->user()->role->is($user));
        return view('task.create', ['users' => User::get(), 'tasks' => Task::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());
        return redirect('/')->with('success', 'Done');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        $x = $task->time_taken / 60;
        $y = $task->time_taken % 60;
        $z = sprintf('%02d:%02d', $x, $y);
        return view('task.show', ['task' => $task, 'time' => $z]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.edit',['task'=> $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        TimeService::updateTask($request, $task);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
