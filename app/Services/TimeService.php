<?php

namespace App\Services;

use App\Models\Task;

class TimeService
{
    static public function updateTask(object $request, Task $task): void
    {
        $validated = $request->validated();
        $totaltime = self::timeInMinutes($validated['hour'], $validated['minutes']);
        $validated['time_taken'] = $totaltime;
        unset($validated['hour'], $validated['minutes']);
        $task->update($validated);
    }

    static public function timeInMinutes(int $hours, int $minutes): int
    {
        return ($hours * 60) + $minutes;
    }
}
