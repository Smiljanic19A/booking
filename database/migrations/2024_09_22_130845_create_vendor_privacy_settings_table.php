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
        Schema::create('vendor_privacy_settings', function (Blueprint $table) {
            $table->id();

            $table->integer("vendor_id");
            $table->boolean("public");
            $table->boolean("private_location");
            $table->string("pat", 244)->nullable()->unique();

            $table->foreign("vendor_id")
                ->references("id")
                ->on("vendors")
                ->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_privacy_settings');
    }
};
