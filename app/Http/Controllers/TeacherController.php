<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\LearningMaterial;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function students()
    {
        $students = User::where('role', 'student')
                        ->withCount(['posts', 'comments'])
                        ->latest()
                        ->paginate(10);

        $stats = [
            'total_students' => User::where('role', 'student')->count(),
            'active_students' => User::where('role', 'student')->count(), // Todos activos por ahora
            'students_with_posts' => User::where('role', 'student')->has('posts')->count(),
            'students_with_comments' => User::where('role', 'student')->has('comments')->count(),
        ];

        return view('teacher.students', compact('students', 'stats'));
    }

    public function studentDetail($id)
    {
        $student = User::where('role', 'student')
                      ->where('id', $id)
                      ->with(['posts' => function($query) {
                          $query->latest()->take(5);
                      }, 'comments' => function($query) {
                          $query->latest()->take(5);
                      }])
                      ->firstOrFail();

        return view('teacher.student-detail', compact('student'));
    }

    public function materials()
    {
        $materials = LearningMaterial::where('user_id', auth()->id())
                            ->with('categories')
                            ->latest()
                            ->paginate(12);

        $stats = [
            'total_materials' => LearningMaterial::where('user_id', auth()->id())->count(),
            'published_materials' => LearningMaterial::where('user_id', auth()->id())->where('is_published', true)->count(),
            'draft_materials' => LearningMaterial::where('user_id', auth()->id())->where('is_published', false)->count(),
        ];

        return view('teacher.materials', compact('materials', 'stats'));
    }

    public function createMaterial()
    {
        $categories = Category::all();
        return view('teacher.materials-create', compact('categories'));
    }

    public function storeMaterial(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:10240', // 10MB max
            'external_url' => 'nullable|url',
            'type' => 'required|in:document,video,link,presentation',
            'subject' => 'nullable|string|max:100',
            'grade_level' => 'nullable|string|max:50',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id'
        ]);

        $materialData = [
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'description' => $request->description,
            'type' => $request->type,
            'subject' => $request->subject,
            'grade_level' => $request->grade_level,
            'is_published' => $request->has('is_published'),
            'user_id' => auth()->id(),
        ];

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('learning-materials', 'public');
            
            $materialData['file_path'] = $path;
            $materialData['file_name'] = $file->getClientOriginalName();
            $materialData['file_size'] = $this->formatBytes($file->getSize());
        } elseif ($request->external_url) {
            $materialData['external_url'] = $request->external_url;
        }

        $material = LearningMaterial::create($materialData);

        // Attach categories
        if ($request->has('categories')) {
            $material->categories()->sync($request->categories);
        }

        return redirect()->route('teacher.materials')
                        ->with('success', 'Material creado exitosamente.');
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}