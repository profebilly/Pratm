<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\SettingChange;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function index()
    {
        $teacher = Setting::get('teacher_registration_token');
        $admin = Setting::get('admin_registration_token');

        return view('admin.settings.index', compact('teacher', 'admin'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'teacher_registration_token' => ['nullable', 'string'],
            'admin_registration_token' => ['nullable', 'string'],
        ]);

        $action = $request->input('action');
        $generated = null;

        // Handle generation actions
        if ($action === 'generate_teacher') {
            $generated = Str::random(32);
            $old = Setting::get('teacher_registration_token');
            Setting::set('teacher_registration_token', $generated);
            SettingChange::create(['key' => 'teacher_registration_token', 'old_value' => $old, 'new_value' => $generated, 'changed_by' => auth()->id()]);
            return redirect()->route('admin.settings')->with('status', 'Token de profesor generado.')->with('generated_teacher', $generated);
        }

        if ($action === 'generate_admin') {
            $generated = Str::random(32);
            $old = Setting::get('admin_registration_token');
            Setting::set('admin_registration_token', $generated);
            SettingChange::create(['key' => 'admin_registration_token', 'old_value' => $old, 'new_value' => $generated, 'changed_by' => auth()->id()]);
            return redirect()->route('admin.settings')->with('status', 'Token de administrador generado.')->with('generated_admin', $generated);
        }

        // Normal update: record changes
        $oldTeacher = Setting::get('teacher_registration_token');
        $oldAdmin = Setting::get('admin_registration_token');

        Setting::set('teacher_registration_token', $request->teacher_registration_token);
        Setting::set('admin_registration_token', $request->admin_registration_token);

        if ($oldTeacher !== $request->teacher_registration_token) {
            SettingChange::create(['key' => 'teacher_registration_token', 'old_value' => $oldTeacher, 'new_value' => $request->teacher_registration_token, 'changed_by' => auth()->id()]);
        }
        if ($oldAdmin !== $request->admin_registration_token) {
            SettingChange::create(['key' => 'admin_registration_token', 'old_value' => $oldAdmin, 'new_value' => $request->admin_registration_token, 'changed_by' => auth()->id()]);
        }

        return redirect()->route('admin.settings')->with('status', 'Configuración actualizada.');
    }
}
