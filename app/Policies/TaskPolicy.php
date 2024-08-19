<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class TaskPolicy
{
    public function create(User $user): bool
    {
        // return Auth::user()->role === 'admin';
    }
}
