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
        Schema::table('email_reminders', function (Blueprint $table) {
            $table->foreignId('tenant_id')->nullable()->change();
            $table->foreignId('property_id')->nullable()->change();
            $table->string('reminder_type')->nullable()->change();

            $table->string('name');
            $table->text('message');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('email_reminders', function (Blueprint $table) {
            //
        });
    }
};
