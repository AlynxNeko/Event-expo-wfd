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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('venue');
            $table->timestamp('date');
            $table->time('start_time');
            $table->string('description');
            $table->string( 'booking_url')->nullable();
            $table->json('tags'); // Use JSON column type for tags
            // fk
            $table->bigInteger('organizer_id')->unsigned();
            $table->foreign('organizer_id')->references('id')->on('organizers')->onDelete('cascade');
            $table->bigInteger('event_category_id')->unsigned();
            $table->foreign('event_category_id')->references('id')->on('event_categories')->onDelete('cascade');
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
