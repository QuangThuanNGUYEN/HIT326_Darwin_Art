<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('ProductNo');
            $table->text('Description');
            $table->decimal('Price', 10, 2);
            $table->string('Category', 100)->nullable();
            $table->string('Colour', 50)->nullable();
            $table->string('Size', 50)->nullable();
            $table->boolean('Available')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};