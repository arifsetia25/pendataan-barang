<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\JenisBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $barangmasuk = DB::table('barang_masuks')
        // ->join('jenis_barangs', 'jenis_barangs.id', '=', 'barang_masuks.id_jenis_barang')
        // ->join('barang_masuks', 'info_barangs.id', '=', 'barang_masuks.id_info')
        // ->join('barang_masuks', 'suppliers.id', '=', 'barang_masuks.id_supplier')->get();
        $barangmasuk =  BarangMasuk::select(
            "barang_masuks.id",
            "barang_masuks.tanggal", 
            "barang_masuks.id_jenis_barang",
            "barang_masuks.nama_barang",
            "barang_masuks.id_supplier", 
            "jenis_barangs.jenis_barang as jenis_barang",
            "suppliers.nama_supplier as nama_supplier"
        )
        ->join("jenis_barangs", "jenis_barangs.id", "=", "barang_masuks.id_jenis_barang")
        ->join("suppliers", "suppliers.id", "=", "barang_masuks.id_supplier")
        ->get();
       
        //$barangmasuk = BarangMasuk::latest()->paginate(5);
        return view('barangmasuk.index',compact('barangmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangmasuk = JenisBarang::all();
        $supplier = Supplier::all();
        return view('barangmasuk.create',compact('barangmasuk','supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'id_jenis_barang' => 'required',
            'nama_barang' => 'required',
            'id_supplier' => 'required',
        ]);

        BarangMasuk::create([
            'tanggal' => $request->tanggal,
            'id_jenis_barang' => $request->id_jenis_barang,
            'nama_barang' => $request->nama_barang,
            'id_supplier' => $request->id_supplier,

        ]);

        return redirect()->to('barang-masuk')->with('success', 'Data Berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barangmasuk = BarangMasuk::where('id',$id)->first();
        $barangmasuk['jenis'] = JenisBarang::all();
        $barangmasuk['supplier'] = Supplier::all();
         //$infobarang = InfoBarang::where('id', $id)->first();
         return view('barangmasuk.edit',compact('barangmasuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'id_jenis_barang' => 'required',
            'nama_barang' => 'required',
            'id_supplier' => 'required',
           ]) ;
    
           $barangmasuk = [
            'tanggal'=> $request->tanggal,
            'id_jenis_barang'=>$request->id_jenis_barang,
            'nama_barang' => $request->nama_barang,
            'id_supplier' => $request->id_supplier,
    
           ];
    
           BarangMasuk::where('id', $id)->update($barangmasuk);
           return redirect()->to('barang-masuk')->with('success', 'Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        BarangMasuk::where('id',$id)->delete();
        return redirect()->to('barang-masuk')->with('success', 'Data Berhasil dihapus');
    }
}
