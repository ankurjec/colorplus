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
        Schema::table('products', function (Blueprint $table) {
           //Commented as these fields are already in the table..
           
            $table->decimal('discount_amount', 8, 2)->nullable()->after('price');
            $table->decimal('discount_percentage', 5, 2)->nullable()->after('discount_amount');
            $table->unsignedBigInteger('rating_id')->nullable()->after('discount_percentage');
            $table->foreign('rating_id')->references('id')->on('ratings')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
