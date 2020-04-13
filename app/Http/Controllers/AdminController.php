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
use App\Mapel;
use App\Nilai;
use App\KelasAjar;
use DataTables;
use DB;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswaImport;
use App\Expots\SiswaExport;

class AdminController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return redirect()->route('admin.siswa');
	}

	public function showProfile(){
		$user = auth()->user();
		return view('admin.profile', compact('user'));
	}

	public function storePassword(Request $request){
		User::updateOrCreate(['id' => auth()->user()->id], [
			'password' => bcrypt($request->password),
		]);
		return redirect()->back();
	}

	public function storeBio(Request $request){
		if ($request->username != auth()->user()->username) {
			$request->validate([
				'username' => 'required|string|unique:users'
			]);
		}else{
			$request->validate([
				'username' => 'required|string'
			]);
		}
		User::updateOrCreate(['id' => auth()->user()->id], [
			'username' => $request->username,
			'name' => $request->nama,
			'email' => $request->email,
		]);
		return redirect()->back();
	}

	public function storeProfilPhoto(Request $request){

		$request->validate([
			'foto' => 'required|image|mimes:jpeg,jpg,png,svg|dimensions:ratio=1/1',
		]);

		$user = auth()->user();

		$file_name = 'propic_'.$user->id.'.'.request()->foto->getClientOriginalExtension();
		$request->foto->storeAs('user_avatar', $file_name);
		$user->avatar = $file_name;
		$user->save();

		return back()->with('success', 'Berhasil ganti foto');
	}

//======================= CRUD Siswa =================================

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

					$btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . 
					$row->id . 
					'" data-original-title="Show" class="btn btn-primary btn-sm showData"><i class="fa fa-eye"></i></a>';

					$btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . 
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

	public function showImportSiswa(){
		return view('admin.siswa.import');
	}

	public function storeImportSiswa(){
		Excel::import(new SiswaImport, request()->file('file'));
		return redirect()->route('admin.siswa');
	}

//======================= Rapot Siswa ===============================

	public function showRapot(){
		return view('admin.rapot.index');
	}

	public function showMapelSiswa($nis){
		$siswa = Siswa::where('nis', $nis)->first();
		return view('admin.rapot.mapel', compact('siswa'));
	}

	public function showNilaiSiswa($nis){
		$siswa = Siswa::where('nis', $nis)->first();
		return view('admin.rapot.nilai', compact('siswa'));
	}

	public function showNilai(Request $request, $nis){
		if ($request->ajax()) {
			$nilai = Nilai::all();
			foreach ($nilai as $n) {
				$n->setAttribute('nama_mapel', $n->guru->mapel->nama);
			}
			$nilaiSiswa = [];
			foreach ($nilai as $row) {
				if ($row->siswa->nis == $nis) {
					array_push($nilaiSiswa, $row);
				}
			}
			return DataTables::of($nilaiSiswa)
			->addIndexColumn()
				->make(true);
		}
	}

	public function cetakRapot(Request $request){
		$siswa = Siswa::where('nis', $request->nis)->first();
		$ulangan = $request->ulangan;
		$nilai = Nilai::where('siswa_id', $siswa->id)->get();
		$upd = $request->upd;
		$sikap = $request->sikap;
		$pramuka = $request->pramuka;
		$catatan = $request->catatan;
		return view('admin.rapot.cetak', compact('siswa', 'nilai', 'ulangan', 'upd', 'sikap', 'pramuka', 'catatan'));
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

	public function showKelas10(Request $request){
		$siswa = Siswa::all();
		$kelas10 = [];
		foreach ($siswa as $orang) {
			$orang->setAttribute('nama_rombel', $orang->rombel->nama);
			$orang->setAttribute('nama_rayon', $orang->rayon->nama);
			if ($orang->rombel->tingkatan == '10') {
				array_push($kelas10, $orang);
			}
		}
		if ($request->ajax()) {
			return DataTables::of($kelas10)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn =' <a href="kelas-10/'.$row->nis.'/nilai" data-id="' . 
					$row->id . 
					'" class="btn btn-primary btn-sm" style="color:white; text-decoration:none;"><i class="fa fa-user-graduate"></i> Lihat Nilai</a>';
					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
		}
		return view('admin.rapot.kelas_10');
	}

	public function showKelas11(Request $request){
		$siswa = Siswa::all();
		$kelas11 = [];
		foreach ($siswa as $orang) {
			$orang->setAttribute('nama_rombel', $orang->rombel->nama);
			$orang->setAttribute('nama_rayon', $orang->rayon->nama);
			if ($orang->rombel->tingkatan == '11') {
				array_push($kelas11, $orang);
			}
		}
		if ($request->ajax()) {
			return DataTables::of($kelas11)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn =' <a href="kelas-11/'.$row->nis.'/nilai" data-id="' . 
					$row->id . 
					'" class="btn btn-primary btn-sm" style="color:white; text-decoration:none;"><i class="fa fa-user-graduate"></i> Lihat Nilai</a>';
					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
		}
		return view('admin.rapot.kelas_11');
	}

	public function showKelas12(Request $request){
		$siswa = Siswa::all();
		$kelas12 = [];
		foreach ($siswa as $orang) {
			$orang->setAttribute('nama_rombel', $orang->rombel->nama);
			$orang->setAttribute('nama_rayon', $orang->rayon->nama);
			if ($orang->rombel->tingkatan == '12') {
				array_push($kelas12, $orang);
			}
		}
		if ($request->ajax()) {
			return DataTables::of($kelas12)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn =' <a href="kelas-12/'.$row->nis.'/nilai" data-id="' . 
					$row->id . 
					'" class="btn btn-primary btn-sm" style="color:white; text-decoration:none;"><i class="fa fa-user-graduate"></i> Lihat Nilai</a>';
					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
		}
		return view('admin.rapot.kelas_12');
	}



//======================== CRUD Guru =================================

	public function showGuru(Request $request){
		$guru = Guru::all();
		if ($request->ajax()) {
			return DataTables::of($guru)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . 
					$row->id . 
					'" data-original-title="Show" class="btn btn-primary btn-sm showData"><i class="fa fa-eye"></i></a>';

					$btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . 
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
		return view('admin.guru.index', compact('guru', 'calon'));
	}
	
	public function showMapelGuru(){
		$mapel = Mapel::orderBy('nama')->get();
		return response()->json($mapel);
	}

	public function editMapelGuru($id){
		$guru = Guru::where('id', $id)->first();
		$mapel = Mapel::where('id', $guru->mapel_id)->first();
		return response()->json($mapel);

	}

	public function storeGuru(Request $request){

		if ($request->guru_id == null) {
			$new = new User();
			$new->name = $request->nama;
			$new->username = $request->nik;
			$new->password = bcrypt($request->nik);
			$new->role = 'guru';
			$new->save();
			$user_id = $new->id;
		}else{
			$user_id = $request->user_id;
		}
		
		Guru::updateOrCreate(['id' => $request->guru_id],
		[
			'nik' => $request->nik,
			'user_id' => $user_id,
			'nama' => $request->nama,
			'jk' => $request->jk,
			'telp' => $request->telp,
			'alamat' => $request->alamat,
			'mapel_id' => $request->mapel,
		]);

		
		return response()->json(['success', 'Data berhasil disimpan.']);
	}

	public function editGuru($id){
		$guru = Guru::find($id);
		return response()->json($guru);
	}

	public function destroyGuru($id){
		$guru = Guru::find($id);
		$user = User::find($guru->user_id);
		$user->delete();
		$guru->delete();
		return response()->json(['success', 'Data berhasil dihapus.']);
	}

	public function showDataGuru($id){
		$guru = Guru::find($id);
		$mapel = Mapel::find($guru->mapel_id);
		$guru->setAttribute('mapel', $mapel->nama);
		return response()->json($guru);
	}

//======================= CRUD Rombel ===============================

	public function showRombel(Request $request){
		$jurusan = Jurusan::all();
		if ($request->ajax()) {
			$rombel = DataRombel::withCount('siswa')->get();
			return DataTables::of($rombel)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn =' <a href="javascript:void(0)" title="Atur Mapel" data-toggle="tooltip"  data-id="' . 
					$row->id . 
					'" data-original-title="Mapel" class="btn btn-primary btn-sm aturMapel" style="color:white;"><i class="fa fa-graduation-cap"></i></a>';

					$btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . 
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
		return view('admin.rombel.index', compact('jurusan'));
	}

	public function storeRombel(Request $request){
		Rombel::updateOrCreate(['id' => $request->rombel_id],
		[
			'nama' => $request->rombel,
			'jurusan_id' => $request->jurusan,
			'tingkatan' => $request->tingkatan,
			'tahun_ajaran' => $request->tahun_ajaran,
		]);
		return response()->json(['success', 'Data berhasil disimpan.']);
	}

	public function editRombel($id){
		$rombel = Rombel::find($id);
		return response()->json($rombel);
	}

	public function destroyRombel($id){
		Rombel::find($id)->delete();
		return response()->json();
	}

//======================= CRUD Jurusan ===============================
	
	public function calonKaprog(){
		$guru = Guru::orderBy('nama')->get();
		$kaprog = Jurusan::select('kaprog_id')->get();
		$calon = [];
		foreach ($guru as $g) {
			if ($g->kaprog == null) {
				array_push($calon, $g);
			}
		}
		return response()->json($calon);
	}

	public function editKaprog($id){
		$jurusan = Jurusan::where('id', $id)->first();
		$kaprog = Guru::where('id', $jurusan->kaprog_id)->first();
		return response()->json($kaprog);
	}

	public function showJurusan(Request $request){
		if ($request->ajax()) {
			$jurusan = DataJurusan::all();
			return DataTables::of($jurusan)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn =' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . 
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
		return view('admin.jurusan.index');
	}

	public function storeJurusan(Request $request){
		Jurusan::updateOrCreate(['id' => $request->jurusan_id],
		[
			'nama' => $request->jurusan,	
			'kaprog_id' => $request->kaprog,
			'kode' => $request->kode,
		]);
		return response()->json(['success', 'Data berhasil disimpan.']);
	}

	public function editJurusan($id){
		$jurusan = Jurusan::find($id);
		return response()->json($jurusan);
	}

	public function destroyJurusan($id){
		Jurusan::find($id)->delete();
		return response()->json();
	}

//======================= CRUD Rayon ===============================
	
	public function calonPembimbing(){
		$guru = Guru::orderBy('nama')->get();
		$pembimbing = Rayon::select('pembimbing_id')->get();
		$calon = [];
		foreach ($guru as $g) {
			if ($g->rayon == null) {
				array_push($calon, $g);
			}
		}
		return response()->json($calon);
	}

	public function editPembimbing($id){
		$rayon = Rayon::where('id', $id)->first();
		$pembimbing = Guru::where('id', $rayon->pembimbing_id)->first();
		return response()->json($pembimbing);
	}

	public function showRayon(Request $request){
		$siswa = Siswa::all();
		$rayon = DataRayon::withCount('siswa')->get();
		if ($request->ajax()) {
			return DataTables::of($rayon)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn =' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . 
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
		$riri = Rayon::withCount('siswa')->get();
		return view('admin.rayon.index', compact('riri'));
	}

	public function storeRayon(Request $request){
		Rayon::updateOrCreate(['id' => $request->rayon_id],
		[
			'nama' => $request->rayon,
			'ruangan' => $request->ruangan,
			'pembimbing_id' => $request->pembimbing,
		]);
		return response()->json(['success', 'Data berhasil disimpan.']);
	}

	public function editRayon($id){
		$rayon = Rayon::find($id);
		return response()->json($rayon);
	}

	public function destroyRayon($id){
		Rayon::find($id)->delete();
		return response()->json();
	}

	//======================= CRUD Mapel ===============================

	public function showMapel(Request $request){
		$mapel = Mapel::all();
		if ($request->ajax()) {
			return DataTables::of($mapel)
			->addIndexColumn()
				->addColumn('action', function ($row) {

					$btn =' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . 
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
		return view('admin.mapel.index');
	}

	public function storeMapel(Request $request){
		Mapel::updateOrCreate(['id' => $request->mapel_id],
		[
			'nama' => $request->mapel,
			'kode' => $request->kode,
			'kkm' => $request->kkm,
			'kompetensi' => $request->kompetensi,
		]);
		return response()->json(['success', 'Data berhasil disimpan.']);
	}

	public function editMapel($id){
		$mapel = Mapel::find($id);
		return response()->json($mapel);
	}

	public function destroyMapel($id){
		Mapel::find($id)->delete();
		return response()->json();
	}

	//======================= CRUD Kelas Ajar ===============================

	public function showKelasAjarRombel($id){
		$rombel = Rombel::find($id);
		$mapel = Mapel::all();
		$taken = [];
		foreach ($rombel->kelasAjar as $kelasAjar) {
			array_push($taken, $kelasAjar->guru->mapel);
		}
		$availableMapel = $mapel->diff($taken);
		return view('admin.rombel.kelas_ajar', compact('rombel', 'availableMapel'));
	}

	public function showKelasAjarGuru(Request $request){
		$guru = Guru::where('mapel_id', $request->mapel_id)->get();
		$output = '<option value="" style="display: none">-- Pilih --</option>';
		foreach ($guru as $row) {
			$output .= '<option value="' . $row->id .'">' . $row->nama . '</option>';
		}
		return $output;
	}

	public function storeKelasAjar(Request $request){
		KelasAjar::updateOrCreate(['id' => $request->kelasajar_id],
		[
			'guru_id' => $request->guru,
			'rombel_id' => $request->rombel_id
		]);

		$rombel = Rombel::find($request->rombel_id);
		foreach ($rombel->siswa as $siswa) {
			$new = new Nilai();
			$new->siswa_id = $siswa->id;
			$new->rombel_id = $siswa->rombel->id;
			$new->guru_id = $request->guru;
			$new->save();
		}
		return redirect()->route('admin.rombel.kelas-ajar', $request->rombel_id);
	}

	public function showDetailPelajaran($id){
		$kelasAjar = KelasAjar::find($id);
		$mapel = Mapel::find($kelasAjar->guru->mapel_id);
		$rombel = Rombel::find($kelasAjar->rombel_id);
		$guru = Guru::find($kelasAjar->guru_id);
		$kelasAjar->setAttribute('mapel', $mapel->nama);
		$kelasAjar->setAttribute('kode', $mapel->kode);
		$kelasAjar->setAttribute('kompetensi', $mapel->kompetensi);
		$kelasAjar->setAttribute('rombel', $rombel->nama);
		$kelasAjar->setAttribute('pengajar', $guru->nama);
		return response()->json($kelasAjar);	
	}

	public function editKelasAjar($id){
		$kelasajar = KelasAjar::find($id);
		return response()->json($kelasajar);
	}

	public function destroyKelasAjar($id, $rombel_id){
		KelasAjar::find($id)->delete();
		return redirect()->route('admin.rombel.kelas-ajar', $rombel_id);
	}

}
