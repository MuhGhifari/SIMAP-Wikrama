<?php
	 
namespace App\Http\Controllers;
	  
use App\Product;
use Illuminate\Http\Request;
use DataTables;
use App\User;
use App\Siswa;
use App\Rayon;
use App\Rombel;
use App\Jurusan;
use App\DataSiswa;
use DB;
	
class AjaxController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
	$data = Product::latest()->get();
	$siswa = Siswa::orderBy('nama', 'asc');
	$data_siswa = DataSiswa::orderBy('nama', 'asc');
	$rombel = Rombel::all();
	$rayon = Rayon::all();
   
	if ($request->ajax()) {
	  return Datatables::of($data)
		  ->addIndexColumn()
		  ->addColumn('action', function($row){
   
			   $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
			   $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
  
			  return $btn;
		  })
		  ->rawColumns(['action'])
		  ->make(true);
	}
	
	return view('admin.siswa.index',compact('data', 'data_siswa', 'rombel', 'rayon', 'siswa'));
  }
   
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  { 
	Product::updateOrCreate(['id' => $request->product_id],
		['name' => $request->name, 'detail' => $request->detail]);        
   
	return response()->json(['success'=>'Product saved successfully.']);
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
	$product = Product::find($id);
	return response()->json($product);
  }
  
  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
	Product::find($id)->delete();
   
	return response()->json(['success'=>'Product deleted successfully.']);
  }
}