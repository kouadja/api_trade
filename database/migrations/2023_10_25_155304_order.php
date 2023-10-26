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
        //
        Schema::create("orders", function (Blueprint $table) {
        $table->id("order_id");
        $table->unsignedBigInteger("client_id");
        $table->unsignedBigInteger("admin_id");

        $table->foreign("client_id")->references("client_id")->on("clients");
        $table->foreign("admin_id")->references("admin_id")->on("admins");
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
        Schema::dropIfExists('orders');
    }
};
