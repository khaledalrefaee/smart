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
            $table->string('catgory_id');
            $table->string('sub_catgory_id');
            $table->string('sub_product_id')->nullable();

            // $table->string('cereal_number')->unique();

            $table->string('slug_en')->unique();
            $table->string('name_en')->unique();
            $table->string('name_ar')->unique();
            $table->string('description_en');
            $table->string('description_ar');
            
            $table->string('capacities')->nullable();
            $table->string('weight')->nullable();
            $table->string('terminals')->nullable();
            $table->string('cycles')->nullable();
            $table->string('made')->nullable();
            
            $table->string('popular');
            $table->string('datasheet')->nullable();
            $table->string('user_manual')->nullable();
            $table->integer('warranty_period')->nullable(); 
            $table->string('warranty_unit')->default('months');
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
