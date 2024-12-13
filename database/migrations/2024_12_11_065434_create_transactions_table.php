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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer("total_amount");
            $table->string('number_of_orders');
            $table->string("status")->default("pending");
            $table->integer('channel')->default(0)->comment('0 Manual | 1 Esewa | 2 Khalti | 3 Connect IPS | 4 Fone Pay');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
