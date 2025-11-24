<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function admin()
    {
        $usersCount = User::count();
        $postsCount = Post::count();
        $categoriesCount = Category::count();
        $commentsCount = Comment::count();

        $recentUsers = User::latest()->take(6)->get();
        $recentPosts = Post::latest()->take(6)->get();

        return view('admin.dashboard', compact('usersCount','postsCount','categoriesCount','commentsCount','recentUsers','recentPosts'));
    }

    public function teacher()
    {
        return view('dashboard.teacher');
    }

    public function student()
    {
        return view('dashboard.student');
    }

    public function parent()
    {
        return view('dashboard.parent');
    }
}
