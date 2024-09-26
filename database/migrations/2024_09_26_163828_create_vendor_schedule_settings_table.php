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
        Schema::create('vendor_schedule_settings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('vendor_id');
            $table->boolean("auto-approve")->default(false);
            $table->boolean("auto-cancel")->default(false);
            $table->string("default_workdays")->nullable();
            $table->string("default_schedule")->nullable();
            $table->integer("open_for")->default(1); // 1 is 1 week 2 is 1 month 3 is 3 months

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_schedule_settings');
    }
};
