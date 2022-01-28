<?php
	
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMigration extends Migration
{
	public function up() 
	{
		Schema::create('coba', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('nama');
			$table->string('gender');
			$table->string('alamat');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExist('coba');
	}
}

?>