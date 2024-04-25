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
        Schema::create('material', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();;
            $table->string('category_id');
            $table->string('material_name');
            $table->string('opening_balance');
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
        Schema::dropIfExists('material');
    }
};
