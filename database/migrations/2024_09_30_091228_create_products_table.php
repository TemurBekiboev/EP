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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable('false');
            $table->bigInteger('price')->nullable('false')->default(12);
            $table->text('description')->nullable();
            $table->string('brand')->nullable('false');
            $table->boolean('availability')->default(0);
            $table->bigInteger('quantity')->nullable();
            $table->json('images')->nullable('false');
            $table->string('manufacturer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
