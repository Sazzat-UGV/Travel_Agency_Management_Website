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
        Schema::create('counter_items', function (Blueprint $table) {
            $table->id();
            $table->string('item1_name')->nullable();
            $table->string('item1_number')->nullable();
            $table->string('item2_name')->nullable();
            $table->string('item2_number')->nullable();
            $table->string('item3_name')->nullable();
            $table->string('item3_number')->nullable();
            $table->string('item4_name')->nullable();
            $table->string('item4_number')->nullable();
            $table->enum('status', ['Show', 'Hide'])->default('Show');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_items');
    }
};
