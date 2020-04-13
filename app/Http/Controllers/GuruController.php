<?php

namespace App\Http\Controllers;

use DataTables;
use App\KelasAjar;
use App\Guru;
use App\Rombel;
use App\Nilai;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
	public function index(){
		$guru = auth()->user()->guru;
		return view('guru.index', compact('guru'));
	}

	public function showProfile(){
		$user = auth()->user();
		return view('guru.profile', compact('user'));
	}

	public function storePassword(Request $request){
		User::updateOrCreate(['id' => auth()->user()->id], [
			'password' => bcrypt($request->password),
		]);
		return redirect()->back();
	}

	public function storeBio(Request $request){
		User::updateOrCreate(['id' => auth()->user()->id], [
			'username' => $request->username,
			'name' => $request->nama,
			'email' => $request->email,
		]);

		Guru::updateOrCreate(['id' => auth()->user()->guru->id], [
			'nik' => $request->nik,
			'nama' => $request->nama,
			'jk' => $request->jk,
			'telp' => $request->telp,
			'alamat' => $request->alamat,
		]);
		return redirect()->back();
	}

	public function storeProfilPhoto(Request $request){
		$request->validate([
			'foto' => 'required|image|mimes:jpeg,jpg,png,svg|dimensions:ratio=1/1',
		]);

		$user = auth()->user();

		$file_name = $user->id.'_propic_'.$user->username.'.'.request()->foto->getClientOriginalExtension();

		$request->foto->storeAs('user_avatar', $file_name);
		$user->avatar = $file_name;
		$user->save();

		return back()->with('success', 'Berhasil ganti foto');
	}

	public function showNilaiKelas($id, Request $request){
		$rombel = Rombel::find($id);
		$request->session()->put('rombel_id', $id);
		return view('guru.kelas.index', compact('rombel'));
	}

	public function getAbsen(Request $request){
		if ($request->ajax()) {
			$nilai = Nilai::where('guru_id', auth()->user()->guru->id)->where('rombel_id', session('rombel_id'))->get();
			foreach ($nilai as $siswa) {
				$siswa->setAttribute('nama', $siswa->siswa->nama);
				$siswa->setAttribute('nis', $siswa->siswa->nis);
				$siswa->setAttribute('nisn', $siswa->siswa->nisn);
				$siswa->setAttribute('rombel', $siswa->siswa->rombel->nama);
				$siswa->setAttribute('rayon', $siswa->siswa->rayon->nama);
			}
			return DataTables::of($nilai)
			->addIndexColumn()
				->make(true);
		}
	}

	public function storeNilai(Request $request){
		Nilai::updateOrCreate(['id' => $request->id], [
			'uh1' => $request->uh1,
			'uh2' => $request->uh2,
			'uts_ganjil' => $request->uts_ganjil,
			'uh1k' => $request->uh1k,
			'uh2k' => $request->uh2k,
			'uh3' => $request->uh3,
			'uh4' => $request->uh4,
			'uas_ganjil' => $request->uas_ganjil,
			'uh3k' => $request->uh3k,
			'uh4k' => $request->uh4k,
			'uh5' => $request->uh5,
			'uh6' => $request->uh6,
			'uts_genap' => $request->uts_genap,
			'uh5k' => $request->uh5k,
			'uh6k' => $request->uh6k,
			'uh7' => $request->uh7,
			'uh8' => $request->uh8,
			'uas_genap' => $request->uas_genap,
			'uh7k' => $request->uh7k,
			'uh8k' => $request->uh8k,
		]);
		return response()->json(['success' => 'Data berhasil disimpan']);
	}

//======================= Semester 1 =============================

//-------------------------- UTS ---------------------------------
	public function showNilaiUtsGanjil(Request $request){
		if ($request->ajax()) {
			$nilai = Nilai::where('guru_id', auth()->user()->guru->id)->get();
			foreach ($nilai as $siswa) {
				$siswa->setAttribute('nama', $siswa->siswa->nama);
				$siswa->setAttribute('nis', $siswa->siswa->nis);
				$siswa->setAttribute('rombel', $siswa->siswa->rombel->nama);
			}
			return DataTables::of($nilai)
			->addIndexColumn()
				->make(true);
		}
		return view('guru.nilai.uts-ganjil');
	}

//-------------------------- UAS ---------------------------------
	public function showNilaiUasGanjil(Request $request){
		if ($request->ajax()) {
			$nilai = Nilai::where('guru_id', auth()->user()->guru->id)->get();
			foreach ($nilai as $siswa) {
				$siswa->setAttribute('nama', $siswa->siswa->nama);
				$siswa->setAttribute('nis', $siswa->siswa->nis);
				$siswa->setAttribute('rombel', $siswa->siswa->rombel->nama);
			}
			return DataTables::of($nilai)
			->addIndexColumn()
				->make(true);
		}
		return view('guru.nilai.uas-ganjil');
	}

//======================= Semester 2 =============================

//-------------------------- UTS ---------------------------------
	public function showNilaiUtsGenap(Request $request){
		if ($request->ajax()) {
			$nilai = Nilai::where('guru_id', auth()->user()->guru->id)->get();
			foreach ($nilai as $siswa) {
				$siswa->setAttribute('nama', $siswa->siswa->nama);
				$siswa->setAttribute('nis', $siswa->siswa->nis);
				$siswa->setAttribute('rombel', $siswa->siswa->rombel->nama);
			}
			return DataTables::of($nilai)
			->addIndexColumn()
				->make(true);
		}
		return view('guru.nilai.uts-genap');
	}

//-------------------------- UAS ---------------------------------
	public function showNilaiUasGenap(Request $request){
		if ($request->ajax()) {
			$nilai = Nilai::where('guru_id', auth()->user()->guru->id)->get();
			foreach ($nilai as $siswa) {
				$siswa->setAttribute('nama', $siswa->siswa->nama);
				$siswa->setAttribute('nis', $siswa->siswa->nis);
				$siswa->setAttribute('rombel', $siswa->siswa->rombel->nama);
			}
			return DataTables::of($nilai)
			->addIndexColumn()
				->make(true);
		}
		return view('guru.nilai.uas-genap');
	}

	public function inputData(){
		return view('guru.input.index');
	}
}
