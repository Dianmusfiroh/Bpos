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
        Schema::create('t_user', function (Blueprint $table) {
            $table->id('id_user');
            $table->inte('id_biodata');
            $table->string('username');
            $table->text('password');
            $table->string('nama_lengkap');
            $table->string('no_hp');
            $table->enum('level', ['owner', 'kasir']);
            $table->enum('status', ['0', '1']);
            $table->enum('shift', ['pagi', 'siang','sore','malam','full']);
            $table->date('date_created');


            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
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
        Schema::dropIfExists('t_user');
    }
}
