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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("category_id")->nullable();
            $table->string("slug")->unique();
            $table->integer("price");
            $table->unsignedBigInteger("brand_id")->nullable();
            $table->string("stock_quantity");
            $table->string("image_url");
            $table->string("volume")->nullable();
            $table->decimal("alcohol_percentage",5,2)->nullable();
            $table->text("description")->nullable();
            $table->json('extra')->nullable();
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories")->nullOnDelete();
            $table->foreign("brand_id")->references("id")->on("brands")->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
