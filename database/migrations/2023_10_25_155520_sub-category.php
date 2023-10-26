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

        Schema::create('sub_categorys', function (Blueprint $table) {
            $table->id("sub_category_id");
            $table->string("sub_category_name");
            $table->unsignedBigInteger("category_id")->nullable(false);
            $table->foreign("category_id")->references("category_id")->on("categorys");
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub-categorys');
    }
};
