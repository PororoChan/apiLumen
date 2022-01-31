<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMusic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_music');
    }
}
