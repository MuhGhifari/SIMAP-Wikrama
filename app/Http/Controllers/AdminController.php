<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Rayon;
use App\Rombel;
use App\Jurusan;
use App\DataSiswa;
use App\DataRombel;
use App\DataJurusan;
use App\DataRayon;
use App\Guru;
use DataTables;
use DB;
use Validator;

class AdminController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showIndex()
	{
		return view('admin.index');
	}

//======================== CRUD Siswa =================================

	public function showSiswa(Request $request){
		$siswa = Siswa::orderBy('nama', 'asc');
		$data_siswa = DataSiswa::orderBy('nama', 'asc');
		$rombel = Rombel::all();
		$rayon = Rayon::all();
		if ($request->ajax()) {
			$data = DataSiswa::all();
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Show" class="btn btn-primary btn-sm showData"><i class="fa fa-eye"></i></a>';

					$btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-warning btn-sm editData" style="color:white;"><i class="fa fa-pencil-alt"></i></a>';

					$btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="fa fa-trash"></i></a>';

					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
		}
		return view('admin.siswa.index', compact('siswa', 'data_siswa', 'rayon', 'rombel'));
	}

	public function storeSiswa(Request $request){

		$validator = Validator::make($request->all(), [
			'nisn' => 'required|numeric|unique',
			'nis' => 'required|numeric|unique',
			'nama' => 'required',
			'rayon_id' => 'required|numeric',
			'rombel_id' => 'required|numeric',
			'jk' => 'required',
			'agama' => 'required',
			'tempat_lahir' => 'required',
			'tanggal_lahir' => 'required',
			'asal_sekolah' => 'required',
		]);

		Siswa::updateOrCreate(['id' => $request->siswa_id],
		[
			'nisn' => $request->nisn,
			'nis' => $request->nis,
			'nama' => $request->nama,
			'rayon_id' => $request->rayon,
			'rombel_id' => $request->rombel,
			'alamat' => $request->alamat ,
			'jk' => $request->jk,
			'agama' => $request->agama,
			'tempat_lahir' => $request->tempat_lahir,
			'tanggal_lahir' => $request->tanggal_lahir,
			'telp' => $request->telp,
			'asal_sekolah' => $request->asal_sekolah,
		]);
		return response()->json(['success' => 'Data berhasil disimpan']);
	}

	public function editSiswa($id){
		$siswa = Siswa::find($id);
		return response()->json($siswa);
	}

	public function destroySiswa($id){
		Siswa::find($id)->delete($id);
		return response()->json(['success', 'Data berhasil dihapus.']);
	}

	public function showDataSiswa($id){
		$siswa = DataSiswa::find($id);
		return response()->json($siswa);
	}


//======================== Rapot Siswa =================================

	public function showRapot(){
		return view('admin.rapot.index');
	}


//======================== CRUD Guru =================================


	public function showGuru(Request $request){
		if ($request->ajax()) {
			$guru = Guru::all();
			return DataTables::of($guru)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Show" class="btn btn-primary btn-sm showData"><i class="fa fa-eye"></i></a>';

					$btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-warning btn-sm editData" style="color:white;"><i class="fa fa-pencil-alt"></i></a>';

					$btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="fa fa-trash"></i></a>';

					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
		}
		return view('admin.guru.index', compact('guru'));
	}

	public function storeGuru(Request $request){
		Guru::updateOrCreate(['id' => $request->guru_id],
		[
			'nik' => $request->nik,
			'nama' => $request->nama,
			'jk' => $request->jk,
			'telp' => $request->telp,
			'alamat' => $request->alamat,
		]);
		return response()->json(['success', 'Data berhasil disimpan.']);
	}

	public function editGuru($id){
		$guru = Guru::find($id);
		return response()->json($guru);
	}

	public function destroyGuru($id){
		Guru::find($id)->delete();
		return response()->json(['success', 'Data berhasil dihapus.']);
	}

	public function showDataGuru($id){
		$guru = Guru::find($id);
		return response()->json($guru);
	}


//======================== CRUD Kelas =================================

	public function showKelas(Request $request){
		return view('admin.kelas.index');
	}


	// CRUD Rombel

	public function showRombel(Request $request){
		if ($request->ajax()) {
			$rombel = DataRombel::all();
			return DataTables::of($rombel)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn =' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-warning btn-sm editData" style="color:white;"><i class="fa fa-pencil-alt"></i></a>';

					$btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="fa fa-trash"></i></a>';

					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
		}
		return view('admin.rombel.index');
	}

	public function storeRombel(Request $request){

	}

	public function editRombel($id){
		$rombel = Rombel::find($id);
		return response()->json();
	}

	public function destroyRombel($id){
		Rombel::find($id)->delete();
		return response()->json($rombel);
	}


	// CRUD Jurusan
	
	public function showJurusan(Request $request){
		if ($request->ajax()) {
			$rombel = DataJurusan::all();
			return DataTables::of($rombel)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn =' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-warning btn-sm editData" style="color:white;"><i class="fa fa-pencil-alt"></i></a>';

					$btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="fa fa-trash"></i></a>';

					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
		}
		return view('admin.jurusan.index');
	}

	public function storeJurusan(Request $request){

	}

	public function editJurusan($id){
		$jurusan = Jurusan::find($id);
		return response()->json($jurusan);
	}

	public function destroyJurusan($id){
		Jurusan::find($id)->delete();
		return response()->json();
	}


	// CRUD Rayon
	
	public function showRayon(Request $request){
		if ($request->ajax()) {
			$rombel = DataRombel::all();
			return DataTables::of($rombel)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn =' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-warning btn-sm editData" style="color:white;"><i class="fa fa-pencil-alt"></i></a>';

					$btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="fa fa-trash"></i></a>';

					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
		}
		return view('admin.rayon.index');
	}

	public function storeRayon(Request $request){

	}

	public function editRayon($id){
		$rayon = Rayon::find($id);
		return response()->json($rayon);
	}

	public function destroyRayon($id){
		
	}
}