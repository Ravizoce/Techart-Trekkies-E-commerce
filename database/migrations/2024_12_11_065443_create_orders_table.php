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
            $table->string('name');
            $table->string('number_of_orders');
            $table->string('total_amount');
            $table->string('status')->default("ordered");
            $table->foreignId('user_id')->constrained("users");
            // $table->foreignId('delivery_id')->constrained("deliveries")->nullable();
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->json('extra')->nullable();
            $table->timestamps();

            $table->foreign("transaction_id")->references("id")->on("transactions")->nullOnDelete();
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
