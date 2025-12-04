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
       Schema::create('employee_family_table', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');

            $table->string('full_name');
            $table->unsignedBigInteger('relationship_id')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->boolean('is_dependent')->default(0); // anak/istri ikut tanggungan atau tidak

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_family_table');
    }
};
