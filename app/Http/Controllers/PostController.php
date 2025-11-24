<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'categories')
            ->where('status', 'published')
            ->latest()
            ->paginate(9);

        return view('welcome', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with('user', 'categories')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Related posts by category (paginated, eager-load user)
       $related = Post::with('user')
    ->whereHas('categories', function($q) use ($post) {
        $q->whereIn('categories.id', $post->categories->pluck('id'));
    })
    ->where('posts.id', '!=', $post->id)
    ->where('status', 'published')
    ->latest()
    ->paginate(4, ['*'], 'relatedPage');

        // Paginate comments separately to avoid loading all comments
        $comments = $post->comments()->with('user')->latest()->paginate(5, ['*'], 'commentsPage');

        return view('posts.show', compact('post', 'related', 'comments'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($data['title']) . '-' . time();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $data['image'] = $path;
        }

        $post = Post::create($data);

        return redirect()->route('teacher.posts.create')->with('status', 'Post creado correctamente. Puedes editarlo desde tu dashboard.');
    }

    public function commentStore(Request $request, $postId)
    {
        $data = $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $data['user_id'] = auth()->id();
        $data['post_id'] = $postId;

        Comment::create($data);

        // Redirect back to post and keep comments pagination on first page
        return redirect()->route('posts.show', [$postId ? Post::findOrFail($postId)->slug : ''])->with('status', 'Comentario agregado.');
    }
}
