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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('agent_id')->constrained('users')->cascadeOnDelete();
            $table->string('listing_type'); //Sale, Rent,
            $table->string('status');
            $table->longText('address');
            $table->string('city');
            $table->foreignId('state')->constrained('states');
            $table->integer('price');
            $table->string('square_footing')->nullable();
            $table->integer('no_of_bedroom')->nullable();
            $table->integer('no_of_bathroom')->nullable();
            $table->string('year_built')->nullable();
            $table->json('property_thumbnail')->nullable();
            $table->longText('description');
            $table->boolean('admin_permission')->default(false);
            $table->longText('admin_remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};;
