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
       Schema::create('employee_personal_data_table', function (Blueprint $table) {
            $table->id();

            $table->string('employee_id', 191); // panjang sesuai batas MySQL
            $table->foreign('employee_id')
                ->references('employee_id')
                ->on('employees')
                ->onDelete('cascade');

            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number_2')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable();
            $table->foreignId('marital_status_id')
                ->nullable()
                ->constrained('master_marital_status')
                ->nullOnDelete();
            $table->string('blood_type')->nullable();
            $table->string('religion')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_personal_data');
    }
};
