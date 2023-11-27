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
        Schema::table('properties', function (Blueprint $table) {
            $table->string('cadastral_number')->unique()->nullable();
            $table->integer('rental_period')->nullable();
            $table->integer('security_deposit')->nullable();
            $table->integer('floors')->nullable();
            $table->dropColumn('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['cadastral_number', 'rental_period', 'security_deposit', 'floors']);
        });
    }
};
