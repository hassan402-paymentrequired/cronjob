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
        Schema::create('bookings', function (Blueprint $table) {
            $table->ulid("id")->primary();
            $table->foreignUlid("user_id")->index()->constrained("users")->cascadeOnDelete();
            $table->foreignUlid("provider_offers_id")->index()->constrained("provider_offers")->cascadeOnDelete();
            $table->date("date")->nullable();
            $table->time("time")->nullable();
            $table->string('address_area')->nullable();
            $table->string('address');
            $table->string("latitude")->nullable();
            $table->string("longitude")->nullable();
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
