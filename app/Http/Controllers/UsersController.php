<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollectionResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UsersController extends Controller 
{

    public function __invoke(Request $request)
    {
        $users = Cache::remember('userTasks', config('app.cache.ttl'), function() {
            return User::with('userDepartments.department.tasks')->get();
        });

        return new UserCollectionResource($users);
    }
}