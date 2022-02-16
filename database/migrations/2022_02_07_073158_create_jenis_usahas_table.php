<?php
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateJenisUsahasTable.
 */
class CreateJenisUsahasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public $tableName = 't_jenis_usaha';
	public function up()
	{
		Schema::create($this->tableName, function(Blueprint $table) {
            $table->increments('id_jenis_usaha');

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
		Schema::drop('jenis_usahas');
	}
}
