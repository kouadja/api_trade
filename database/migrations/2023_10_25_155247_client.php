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
        Schema::create('clients', function (Blueprint $table) {
            $table->id("client_id");
            $table->string('client_name');
            $table->string("last_name_client");
            $table->string('email_client')->unique();
            $table->string("password_client");
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            // $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
   
    
};
