<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('CustEmail')->primary();
            $table->string('CustFName', 100);
            $table->string('CustLName', 100);
            $table->string('Title', 10)->nullable();
            $table->string('Address', 255)->nullable();
            $table->string('City', 100)->nullable();
            $table->string('State', 100)->nullable();
            $table->string('Country', 100)->nullable();
            $table->string('PostCode', 20)->nullable();
            $table->string('Phone', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};