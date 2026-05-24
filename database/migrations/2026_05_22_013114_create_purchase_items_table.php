<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id('ItemNo');
            $table->integer('Quantity')->default(1);
            $table->unsignedBigInteger('PurchaseNo');
            $table->unsignedBigInteger('ProductNo');
            $table->foreign('PurchaseNo')->references('PurchaseNo')->on('purchases');
            $table->foreign('ProductNo')->references('id')->on('products');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};