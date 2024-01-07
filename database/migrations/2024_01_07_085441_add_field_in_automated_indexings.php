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
        Schema::table('automated_indexings', function (Blueprint $table) {
            $table->foreignId('tenant_id')->nullable()->change();
            $table->foreignId('property_id')->nullable()->change();
            $table->string('document_name')->nullable()->change();
            $table->string('document_type')->nullable()->change();
            $table->date('document_date')->nullable()->change();
            $table->text('document_content')->nullable()->change();

            $table->foreignId('invoice_id')->nullable()->references('id')->on('invoices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('automated_indexings', function (Blueprint $table) {
            //
        });
    }
};
