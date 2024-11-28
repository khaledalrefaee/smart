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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->date('bought_date');
            $table->string('state');
            $table->string('address');      
            $table->string('notes')->nullable();
            $table->string('Installation_Manager')->nullable();
            $table->string('Purchase_source_phone')->nullable();
        
            $table->string('product_id')->nullable();
            
            $table->string('serial_number');
            $table->string('bill_image');
           
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
