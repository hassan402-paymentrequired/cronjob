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
        Schema::create('provider_offers', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->decimal('price', 8, 2); 
            $table->decimal('prev_price', 8, 2)->nullable();
            $table->foreignUlid('provider_id')->index()->constrained('providers')->cascadeOnDelete();
            $table->foreignUlid('service_id')->index()->constrained('services')->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->text('name')->nullable();
            $table->text('image')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_services');
    }
};
