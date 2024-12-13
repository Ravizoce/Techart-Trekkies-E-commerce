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
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->enum('address_type', ['home', 'work'])->default('home');
            $table->string("state");
            $table->string("zone");
            $table->string("city");
            $table->string("address");
            $table->string("phone_no");
            // $table->string("postal_code");
            $table->string('landmark')->nullable(); // landmark or landmark
            $table->text("description");
            $table->json("extra");
            $table->timestamps();


            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_addresses');
    }
};
