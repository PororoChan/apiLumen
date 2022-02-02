<?php

namespace App\Http\Controllers;

use App\PostData;
use Illuminate\Support\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CobaController extends Controller
{
	public function index()
	{
		$posts = PostData::all();
		return response()->json([
			'success' => true,
			'message' => 'List Semua Post',
			'data' => $posts,
		], 200);
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'singer' => 'required',
			'album_msc' => 'required',
			'singer_desc' => 'required'
		]);

			$title = $request->input('title');
			$singer = $request->input('singer');
			$album_msc = $request->input('album_msc');
			$img = $request->file('cover_msc');
			$path = 'images'; 
			$nama = time().$img->getClientOriginalName();
			$music = $request->file('msc');
			$pathh = 'music';
			$name = time().$music->getClientOriginalName();
			$cover_msc = str_replace(" ", "", $nama);
			$img->move($path, $cover_msc);
			$msc = str_replace(" ", "", $name);
			$music->move($pathh, $msc);
			$singer_desc = $request->input('singer_desc');

		if($validator->fails()) {
			return response()->json([
				'success' => false,
				'message' => 'Data Gagal disimpan',
				'data' => $validator->errors(),
			], 401);
		} else {
			$post = PostData::create([
				"title" => $title,
				"singer" => $singer,
				"album_msc" => $album_msc,
				"cover_msc" => url('images/'.$cover_msc),
				"msc" => url('music/'.$msc),
				"singer_desc" => $singer_desc,
			]);

			if($post) {
				return response()->json([
					'success' => true,
					'message' => 'Data berhasil disimpan',
					'data' => $post
				], 201);
			} else {
				return response()->json([
					'success' => false,
					'message' => 'Data gagal disimpan',
				], 400);
			}
		}
	}

	public function show($id) {
		$post = PostData::find($id);

		if($post) {
			return response()->json([
				'success' => true,
				'message' => 'Data per ID',
				'data' 	=> $post
			], 200);
		} else {
			return response()->json([
				'success' => false,
				'message' => 'Data tidak ditemukan',
			], 404);
		}
	}

	public function update(Request $request, $id) {
		$validator = Validator::make($request->all(), []);

			$dt = [];	

			$title = $request->input('title');
			$singer = $request->input('singer');
			$album_msc = $request->input('album_msc');
			$singer_desc = $request->input('singer_desc');

			$image = $request->file('cover_msc');
			$musics = $request->file('msc');

			if($title !== null && !empty($title)) {
				$dt['title'] = $title;
			}

			if($singer !== null && !empty($singer)) {
				$dt['singer'] = $singer;
			} 

			if($album_msc !== null && !empty($album_msc)) {
				$dt['album_msc'] = $album_msc;
			}

			if($singer_desc !== null && !empty($singer_desc)) {
				$dt['singer_desc'] = $singer_desc;
			}

			if($image !== null && !empty($image)) {
				$paths = 'images'; 
				$namas = time().$image->getClientOriginalName();
				$cover_msc = str_replace(" ", "", $namas);
				$image->move($paths, $cover_msc);
				$dt['cover_msc'] = url('images/'.$cover_msc);
			}
			
			if($musics !== null && !empty($musics)) {
				$patth = 'music';
				$names = time().$musics->getClientOriginalName();
				$msc = str_replace(" ", "", $names);
				$musics->move($patth, $msc);
				$dt['msc'] = url('music/'.$msc);
			}

		if($validator->fails()) {
			return response()->json([
				'success' => false,
				'message' => 'Data harus di isi',
				'data' => $validator->errors()
			], 401);
		} else {
			$post = PostData::where('id_msc', $id)->update($dt);

			if($post) {
				return response()->json([
					'success' => true,
					'message' => 'Berhasil update data',
					'data' => $post
				], 201);
			} else {
				return response()->json([
					'success' => false,
					'message' => 'Gagal update data',
				], 400);
			}
		}
	}

	public function destroy($id) {
		$post = PostData::where('id_msc', $id)->first();

		$post->delete();

		if($post) {
			return response()->json([
				'success' => true,
				'message' => 'Data berhasil dihapus',
			], 200);
		} 
	}
}

?>