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
        Schema::create('inward_outward_quantity_tabel', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();;
            $table->integer('category_id');
            $table->integer('material_name_id');
            $table->string('date');
            $table->string('inward_outward_quantity');
            $table->timestamp('inserted_dt')->nullable();
            $table->timestamp('modified_dt')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inward_outward_quantity_tabel');
    }
};
