<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('products', function (Blueprint $table) {
            $table->id("product_id");
            $table->string("product_name")->nullable(false);
            $table->bigInteger("product_price")->nullable(false);
            $table->integer("product_nbs")->nullable(false);
            $table->text("product_description")->nullable(false);
            $table->string("product_image")->nullable(false);
            //les clés etrangeres
            // $table->unsignedBigInteger("basket_id")->nullable(false);
            // $table->unsignedBigInteger("category_id")->nullable(false);
            // $table->unsignedBigInteger("expedition_id")->nullable(false);

            // $table->foreign("category_id")->references("category_id")->on("categorys");
            // $table->foreign("expedition_id")->references("expedition_id")->on("expeditions")->onDelete("cascade");
            // $table->foreign("basket_id")->references("basket_id")->on("baskets");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
