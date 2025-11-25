<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function admin()
    {
        // Estadísticas de usuarios por rol (MANTENIENDO tus variables existentes)
        $usersCount = User::count();
        $postsCount = Post::count();
        $categoriesCount = Category::count();
        $commentsCount = Comment::count();

        // NUEVAS ESTADÍSTICAS AGREGADAS
        $userStats = [
            'total_users' => $usersCount,
            'total_admins' => User::where('role', 'admin')->count(),
            'total_teachers' => User::where('role', 'teacher')->count(),
            'total_students' => User::where('role', 'student')->count(),
            'total_parents' => User::where('role', 'parent')->count(),
            'new_users_this_month' => User::whereMonth('created_at', now()->month)->count(),
        ];

        // NUEVAS ESTADÍSTICAS DE CONTENIDO
        $contentStats = [
            'total_posts' => $postsCount,
            'total_categories' => $categoriesCount,
            'total_comments' => $commentsCount,
            'published_posts' => Post::where('status', 'published')->count(),
            'draft_posts' => Post::where('status', 'draft')->count(),
            'pending_posts' => Post::where('status', 'pending')->count(),
        ];

        // MANTENIENDO tus datos recientes y AGREGANDO comentarios
        $recentUsers = User::latest()->take(6)->get();
        $recentPosts = Post::latest()->take(6)->get();
        
        // NUEVOS DATOS RECIENTES
        $recentData = [
            'recent_posts' => Post::with(['user', 'categories'])->latest()->take(5)->get(),
            'recent_comments' => Comment::with(['user', 'post'])->latest()->take(5)->get(),
            'recent_users' => User::latest()->take(5)->get(),
        ];

        // NUEVO: Gráfico de actividad - Posts por mes
        $postStats = Post::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->get();

        $postsByMonth = array_fill(0, 12, 0);
        foreach ($postStats as $stat) {
            $postsByMonth[$stat->month - 1] = $stat->count;
        }

        // NUEVO: Gráfico de usuarios por rol
        $usersByRole = [
            'admin' => User::where('role', 'admin')->count(),
            'teacher' => User::where('role', 'teacher')->count(),
            'student' => User::where('role', 'student')->count(),
            'parent' => User::where('role', 'parent')->count(),
        ];

        $charts = [
            'posts_by_month' => [
                'labels' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                'data' => $postsByMonth
            ],
            'users_by_role' => [
                'labels' => array_keys($usersByRole),
                'data' => array_values($usersByRole),
                'colors' => ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e']
            ]
        ];

        // MANTENIENDO tu return original pero AGREGANDO las nuevas variables
        return view('admin.dashboard', compact(
            'usersCount',
            'postsCount', 
            'categoriesCount',
            'commentsCount',
            'recentUsers',
            'recentPosts',
            'userStats',
            'contentStats', 
            'recentData',
            'charts'
        ));
    }

    // MANTENIENDO tu método teacher exactamente igual
    public function teacher()
{
    $user = auth()->user();
    
    // Estadísticas específicas del profesor
    $teacherStats = [
        'my_posts' => Post::where('user_id', $user->id)->count(),
        'my_published_posts' => Post::where('user_id', $user->id)->where('status', 'published')->count(),
        'my_draft_posts' => Post::where('user_id', $user->id)->where('status', 'draft')->count(),
    ];

    // Posts recientes del profesor
    $recentPosts = Post::where('user_id', $user->id)
                        ->with('categories')
                        ->latest()
                        ->take(5)
                        ->get();

    // Estadísticas generales para contexto
    $userStats = [
        'total_students' => User::where('role', 'student')->count(),
        'total_teachers' => User::where('role', 'teacher')->count(),
    ];
    
    $contentStats = [
        'total_comments' => Comment::whereHas('post', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count(),
    ];

    return view('dashboard.teacher', compact(
        'teacherStats', 
        'recentPosts', 
        'userStats', 
        'contentStats'
    ));
}

    // MANTENIENDO tu método student exactamente igual (ya está muy bien)
    public function student()
    {
        $user = auth()->user();

        // Fetch posts authored by the logged-in student with published status
        $studentPosts = Post::where('user_id', $user->id)
                            ->where('status', 'published')
                            ->latest()
                            ->get();

        // If student has no posts, fetch random published posts for filler
        if ($studentPosts->isEmpty()) {
            $fillerPosts = Post::where('status', 'published')
                               ->inRandomOrder()
                               ->take(5)
                               ->get();

            $posts = $fillerPosts;
        } else {
            $posts = $studentPosts;
        }

        return view('dashboard.student', compact('posts'));
    }

    // MANTENIENDO tu método parent exactamente igual
    public function parent()
    {
        return view('dashboard.parent');
    }
}