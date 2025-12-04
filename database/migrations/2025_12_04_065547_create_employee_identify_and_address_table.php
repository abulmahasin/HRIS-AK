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
            Schema::create('employee_identify_and_address_table', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');

            $table->string('nik')->nullable();
            $table->string('npwp')->nullable();
            $table->string('postal_code')->nullable();

            $table->text('card_address')->nullable();
            $table->text('residential_address')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_identify_and_address_table');
    }
};
