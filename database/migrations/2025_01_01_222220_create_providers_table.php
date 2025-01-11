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
        Schema::create('providers', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->index()->constrained('users')->cascadeOnDelete();
            $table->string('official_email');
            $table->string("image")->nullable();
            $table->string('official_phone_number');
            $table->string('address');
            $table->string("latitude")->nullable();
            $table->string("longitude")->nullable();
            $table->boolean('is_active')->default(true);
            $table->decimal('commission_rate')->default(200.00)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
