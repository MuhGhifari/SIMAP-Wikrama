<?php

namespace App\Http\Controllers;

use App\User;
use DataTables;
use Illuminate\Http\Request;

class SuperController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$users = User::where('role', 'admin')->get();
			return DataTables::of($users)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . 
					$row->id . 
					'" data-original-title="Edit" class="btn btn-warning btn-sm editData" style="color:white;"><i class="fa fa-pencil-alt"></i></a>';

					$btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . 
					$row->id . 
					'" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="fa fa-trash"></i></a>';

					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
		}
		return view('super.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		User::updateOrCreate(['id' => $request->user_id],
		[
			'name' => $request->nama,
			'email' => $request->email,
			'role' => 'admin',
			'username' => $request->username,
			'password' => bcrypt($request->password_baru),
		]);

		return response()->json(['success', 'Data berhasil disimpan.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return response()->json($user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		User::find($id)->delete();
		return response()->json(['success', 'Data berhasil disimpan']);
	}
}
