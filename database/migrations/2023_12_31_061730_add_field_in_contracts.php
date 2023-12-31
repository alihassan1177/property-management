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
        Schema::table('contracts', function (Blueprint $table) {
            $table->string('contract_id')->unique()->nullable();
            $table->text('document')->nullable();
            $table->text('gas_information')->nullable();
            $table->text('water_information')->nullable();
            $table->text('internet_information')->nullable();
            $table->text('electricity_information')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn([
                'document',
                'contract_id', 
                'gas_information',
                'water_information',
                'internet_information',
                'eletricity_information'
            ]);
        });
    }
};
