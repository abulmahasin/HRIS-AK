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
        Schema::create('employee_office_table', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');

            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('job_position_id')->nullable();
            $table->unsignedBigInteger('job_level_id')->nullable();
            $table->unsignedBigInteger('employment_status_id')->nullable();
            $table->unsignedBigInteger('grade_id')->nullable();

            $table->string('branch')->nullable();
            $table->date('join_date')->nullable();

            // id pegawai lainnya sebagai approval
            $table->unsignedBigInteger('approval_line')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_office_table');
    }
};
