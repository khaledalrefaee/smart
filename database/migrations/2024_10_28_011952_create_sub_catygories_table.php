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
        Schema::create('sub_catygories', function (Blueprint $table) {
            $table->id();
            $table->string('catgory_id');
            $table->string('slug_en')->unique();
            $table->string('name_en')->unique();
            $table->string('name_ar')->unique();
            $table->string('Abbreviation_name');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_catygories');
    }
};
