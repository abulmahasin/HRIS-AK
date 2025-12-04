<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Nama opsional - nanti diambil dari tabel employees
            $table->string('name')->nullable();

            // Email wajib dan unik
            $table->string('email')->unique();

            // Email akan otomatis terverifikasi ketika user aktivasi akun
            $table->timestamp('email_verified_at')->nullable();

            // Password dibuat saat aktivasi akun, jadi nullable
            $table->string('password')->nullable();

            // Status akun: 0 = belum aktif, 1 = aktif
            $table->boolean('status')->default(0);

            // Token dan waktu kadaluarsa aktivasi akun
            $table->string('activation_token')->nullable();
            $table->timestamp('activation_expires_at')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
