<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('short');
            $table->string('number', 10)->default('01');
            $table->string('icon', 100)->default('flaticon-020-planning');
            $table->string('tagline')->nullable();
            $table->string('sector')->nullable();
            $table->string('established', 10)->nullable();
            $table->text('about')->nullable();
            $table->json('activities')->nullable();
            $table->string('address')->nullable();
            $table->string('map_query')->nullable();
            $table->string('phone', 50)->nullable();
            $table->text('vision')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
