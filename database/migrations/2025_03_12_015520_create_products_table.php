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
            $table->string('title');
            $table->longText('description');
            $table->integer('price');
            $table->integer('discount')->nullable(true);
            $table->date('discount_start')->nullable(true);
            $table->date('discount_end')->nullable(true);
            $table->integer('delivery_charges');
            $table->integer('stock_quantity');
            $table->integer('sale_quantity')->default(0);
            $table->string('category');
            $table->string('material_type');
            $table->string('color');
            $table->string('style');
            $table->string('occasion');
            $table->string('gemstone')->nullable(true);
            $table->string('tag')->nullable(true);
            $table->boolean('is_draft')->default(true);
            $table->boolean('is_discard')->default(false);
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
