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
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('raw_material');
            $table->string('finish_goods');
            $table->string('spares');
            $table->string('machines');
            $table->string('others');
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
        Schema::dropIfExists('category');
    }
};
