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
        Schema::table('orderdetails', function (Blueprint $table) {
            $table->string('courier_name')->after('status')->nullable();
            $table->string('tracking_id')->after('courier_name')->nullable();
            $table->string('tracking_url')->after('tracking_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orderdetails', function (Blueprint $table) {
            $table->dropColumn(['courier_name', 'tracking_id', 'tracking_url']);

        });
    }
};
