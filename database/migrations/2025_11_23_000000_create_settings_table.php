<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Seed default tokens from env if available
        if (env('TEACHER_REGISTRATION_TOKEN')) {
            DB::table('settings')->insert(['key' => 'teacher_registration_token', 'value' => env('TEACHER_REGISTRATION_TOKEN'), 'created_at' => now(), 'updated_at' => now()]);
        }
        if (env('ADMIN_REGISTRATION_TOKEN')) {
            DB::table('settings')->insert(['key' => 'admin_registration_token', 'value' => env('ADMIN_REGISTRATION_TOKEN'), 'created_at' => now(), 'updated_at' => now()]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
