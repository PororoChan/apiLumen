<?php

namespace App\Http\Controllers;

use App\PostData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CobaController extends Controller
{
	public function index()
	{
		$posts = PostData::all();

		return response()->json([
			'success' => true,
			'message' => 'List Semua Post',
			'data' => $posts
		], 200);
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'nama' => 'required',
			'gender' => 'required',
			'alamat' => 'required',
		]);

		if($validator->fails()) {
			return response()->json([
				'success' => false,
				'message' => 'Data wajib di isi',
				'data' => $validator->errors()
			], 401);
		} else {
			$post = PostData::create([
				'nama' => $request->input('nama'),
				'gender' => $request->input('gender'),
				'alamat' => $request->input('alamat'),
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
}

?>