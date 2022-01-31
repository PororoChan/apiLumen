<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class PostData extends Model
	{

		protected $table = 'coba_music';

		protected $primaryKey = 'id_msc';

		protected $fillable = [
			'title', 'singer', 'album_msc', 'cover_msc', 'msc', 'singer_desc'
		];

		const CREATED_AT = null;
		const UPDATED_AT = null;
	}
?>