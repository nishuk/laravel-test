<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LeaderboardController extends Controller
{
    public function index()
    {
        $perPage = request()->get('per_page', 5); 
        $users = User::withCount('posts')  // Count the number of posts for each user
        ->orderByDesc('posts_count')  // Order by the posts_count alias created by withCount
        ->paginate($perPage);

        return view('leaderboard.index', compact('users'));
    }
}
