<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AllowedStudent;

class AllowedStudentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'required|string|unique:allowed_students,cedula|unique:users,cedula',
        ]);

        AllowedStudent::create([
            'cedula' => $request->cedula,
        ]);

        return back()->with('success', 'Cédula de estudiante autorizada correctamente.');
    }
}
