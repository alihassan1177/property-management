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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string("invoice_no");
            $table->foreignId("invoice_category_id")->references("id")->on("invoice_categories");
            $table->foreignId("property_id")->nullable()->references("id")->on("properties");
            $table->foreignId("tenant_id")->nullable()->references("id")->on("tenants");
            $table->text("products")->nullable();
            $table->dateTime("issue_date");
            $table->dateTime("due_date");
            $table->integer("total_amount");
            $table->integer("paid_amount");
            $table->integer("tax_percentage");
            $table->text("notes");
            $table->string("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
