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
        Schema::create("chooses",function(Blueprint $table){
            $table->increments("id");
            // $table->unsignedBigInteger("product_id");
            // $table->unsignedBigInteger("client_id");

            // $table->foreign("product_id")->references("product_id")->on("products");
            //  $table->foreign("client_id")->references("client_id")->on("clients");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
