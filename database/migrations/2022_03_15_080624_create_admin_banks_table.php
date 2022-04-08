<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAdminBanksTable.
 */
class CreateAdminBanksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_admin_bank', function(Blueprint $table) {
            $table->increments('id_admin_bank');
            $table->string('nama_pemilik');
            $table->string('no_rekening');
            $table->string('nama_bank');
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
		Schema::drop('admin_banks');
	}
}
