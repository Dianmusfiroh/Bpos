<?php
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBiodatasTable.
 */
class CreateBiodatasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public $tableName = 't_biodata';
	public function up()
	{
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_biodata');
            $table->string('nama_toko', 50)->nullable();
            $table->integer('id_jenis_usaha')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('no_hp', 50)->nullable();
            $table->text('image')->nullable();
            $table->enum('status_toko', ['0', '1'])->comment(implode(', ', ['0', '1']));

            $table->timestamps();
		});
	}
    // `id_biodata` int(11) NOT NULL,
    // `nama_toko` varchar(20) NOT NULL,
    // `id_jenis_usaha` int(11) NOT NULL,
    // `alamat` text NOT NULL,
    // `email` varchar(50) NOT NULL,
    // `no_hp` varchar(20) NOT NULL,
    // `image` text NOT NULL DEFAULT 'placeholder.png',
    // `status_toko` enum('0','1') NOT NULL
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
//     Schema::create($this->tableName, function (Blueprint $table) {
//         $table->engine = 'InnoDB';
//         $table->increments('id');
//         $table->string('name', 45)->nullable();
//         $table->text('address')->nullable();
//         $table->text('info')->nullable();
//         $table->text('harga')->nullable();
//         $table->text('jarak')->nullable();
//         $table->string('pic1', 255)->nullable();
//         $table->string('pic2', 255)->nullable();
//         $table->string('pic3', 255)->nullable();
//         $table->string('pic4', 255)->nullable();
//         // $table->unsignedInteger('fasilitas_id')->nullable();
//         $table->string('fasilitas')->nullable();
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('biodatas');
	}
}
