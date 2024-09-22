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
        Schema::create('vendor_design_settings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("template_id");
            $table->string("logo_name")->nullable()->default(null);
            $table->string("primary_color")->nullable()->default(null);
            $table->string("secondary_color")->nullable()->default(null);
            $table->string("accent_color")->nullable()->default(null);

            $table->foreign("template_id")->references("id")->on("templates")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_design_settings');
    }
};
