<?php
	
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMigration extends Migration
{
	public function up() 
	{
		Schema::create('coba_music', function (Blueprint $table) {
			$table->bigIncrements('id_msc');
			$table->string('title');
			$table->string('singer');
			$table->string('album_msc');
			$table->string('cover_msc');
			$table->string('msc');
			$table->string('singer_desc');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExist('music_list');
	}
}

?>