<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin');
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
