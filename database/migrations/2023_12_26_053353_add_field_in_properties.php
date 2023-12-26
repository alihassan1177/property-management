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
            $table->text('terms_of_agreement')->nullable();
            $table->text('energy_performance_certificate')->nullable();
            $table->text('inventory_report')->nullable();
            $table->foreignId('manager_id')->nullable()->references("id")->on("users");
            $table->integer('living_area')->nullable();
            $table->text('electricity_information')->nullable();
            $table->text('gas_information')->nullable();
            $table->text('water_information')->nullable();
            $table->text('internet_information')->nullable();
            $table->text('key_information')->nullable();
            $table->text('additional_notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                "terms_of_agreement",
                "energy_performance_certificate", 
                "living_area", 
                "manager_id", 
                "inventory_report",
                "electricity_information",
                "gas_information",
                "water_information",
                "internet_information",
                "key_information",
                "additional_notes"
            ]);
        });
    }
};
