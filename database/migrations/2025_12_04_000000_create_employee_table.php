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
       Schema::create('employees', function (Blueprint $table) {
        $table->id();

        // Data utama
        $table->string('full_name');
        $table->string('employee_id')->unique();

        // Branch bersifat opsional
        $table->string('branch')->nullable();

        // Foreign key ke tabel master
        $table->unsignedBigInteger('job_position_id');
        $table->unsignedBigInteger('organization_id');
        $table->unsignedBigInteger('job_level_id');
        $table->unsignedBigInteger('employee_status_id');
        $table->unsignedBigInteger('grade_id')->nullable();
        $table->unsignedBigInteger('marital_status_id');

        $table->timestamps();
        $table->softDeletes();

        // RELASI FK
        $table->foreign('job_position_id')->references('id')->on('master_job_position');
        $table->foreign('organization_id')->references('id')->on('master_organization');
        $table->foreign('job_level_id')->references('id')->on('master_job_level');
        $table->foreign('employee_status_id')->references('id')->on('master_employee_status');
        $table->foreign('grade_id')->references('id')->on('master_grade');
        $table->foreign('marital_status_id')->references('id')->on('master_marital_status');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
