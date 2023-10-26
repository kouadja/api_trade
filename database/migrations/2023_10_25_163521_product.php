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
            $table->decimal("product_price", 7, 2, true)->nullable(false);
            $table->integer("product_nbs")->nullable(false);
            $table->text("product_desciption")->nullable(false);
            $table->string("product_images")->nullable(false);
            //les clés etrangeres
            $table->unsignedBigInteger("basket_id")->nullable(false);
            $table->unsignedBigInteger("sub_category_id")->nullable(false);
            $table->unsignedBigInteger("expedition_id")->nullable(false);

            $table->foreign("sub_category_id")->references("sub_category_id")->on("sub_categorys");
            $table->foreign("expedition_id")->references("expedition_id")->on("expeditions")->onDelete("cascade");
               $table->foreign("basket_id")->references("basket_id")->on("baskets");
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
