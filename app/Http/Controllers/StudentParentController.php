<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\ParentUser;
use Illuminate\Http\Request;

class StudentParentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'parent_email' => 'required|email|exists:users,email',
        ]);

        $student = Student::findOrFail($request->student_id);
        $parent = ParentUser::where('email', $request->parent_email)->where('role', 'parent')->first();

        if (!$parent) {
            return back()->withErrors(['parent_email' => 'No se encontró un usuario con rol de padre con este email.']);
        }

        // Check if already attached
        if ($student->parents()->where('parent_id', $parent->id)->exists()) {
            return back()->withErrors(['parent_email' => 'Este padre ya está asignado a este estudiante.']);
        }

        $student->parents()->attach($parent->id);

        return back()->with('success', 'Familiar asignado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'parent_id' => 'required|exists:users,id',
        ]);

        $student = Student::findOrFail($request->student_id);
        $student->parents()->detach($request->parent_id);

        return back()->with('success', 'Familiar desasignado correctamente.');
    }
}
