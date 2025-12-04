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
        Schema::create('employee_non_formal_education_table', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');

            $table->string('education_name')->nullable();
            $table->string('organizer')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('expired_date')->nullable();

            $table->string('fee')->nullable();
            $table->string('document')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_non_formal_education_table');
    }
};
