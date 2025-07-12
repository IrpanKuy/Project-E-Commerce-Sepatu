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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('discount_id')->nullable()->constrained()->onDelete('set null');
            $table->string('invoice_number', 50)->unique();
            $table->text('shipping_address');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->decimal('shipping_cost', 10, 2);
            $table->decimal('grand_total', 10, 2);
            $table->enum('status', ['pending_payment', 'awaiting_confirmation', 'processing', 'shipped', 'completed', 'cancelled'])->default('pending_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
