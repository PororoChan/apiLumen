<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class PostData extends Model
	{

		protected $table = 'coba';


		protected $fillable = [
			'nama', 'gender', 'alamat'
		];

		const CREATED_AT = null;
		const UPDATED_AT = null;
	}
?>