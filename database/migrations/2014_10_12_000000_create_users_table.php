<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role')->default('0');
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

//<VirtualHost *:80>
  //  ServerAdmin web
    //DocumentRoot "C:/xampp/htdocs/laravel/Sistema/public"
    //ServerName web
    //##ServerAlias www.dummy-host.example.com
    //##ErrorLog "logs/dummy-host.example.com-error.log"
    //##CustomLog "logs/dummy-host.example.com-access.log" common
//</VirtualHost>