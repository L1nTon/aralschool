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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable()->default('team');
            $table->enum('col_type', ['chair','pair', 'single'])->default('single');
            $table->string('img');
            $table->json('name');
            $table->json('who');
            $table->json('member_info');
            $table->boolean('status')->defaul(true);
            $table->integer('sort')->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
