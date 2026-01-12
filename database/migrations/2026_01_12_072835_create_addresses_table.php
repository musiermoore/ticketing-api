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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->morphs('addressable');

            $table->string('country', 2)->default('RU')->nullable(); // ISO-3166
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('apartment')->nullable();
            $table->string('postal_code')->nullable();

            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
