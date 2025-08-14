<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained();
        $table->boolean('admin')->default(false); // Add admin column
        $table->foreignId('jeep_id')->constrained();
        $table->date('booking_date');
        $table->enum('time_slot', ['morning', 'afternoon', 'full-day']);
        $table->integer('num_people');
        $table->decimal('total_price', 10, 2);
        $table->string('status')->default('pending');
        $table->json('add_ons')->nullable(); // Store selected add-ons as JSON
        $table->string('promo_code')->nullable();
        $table->decimal('discount', 10, 2)->default(0);
        $table->text('special_requests')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
