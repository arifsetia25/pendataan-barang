<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\InfoBarang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangkeluar =  BarangKeluar::select(
            "barang_keluars.id",
            "barang_keluars.tanggal", 
            "barang_keluars.id_barang_masuk",
            "barang_keluars.id_jenis_barang",
            "barang_keluars.jumlah",
            "barang_keluars.penjamin",
            "barang_masuks.nama_barang as nama_barang" ,
            "jenis_barangs.jenis_barang as jenis_barang",
           
        )
        ->join("barang_masuks", "barang_masuks.id", "=", "barang_keluars.id_barang_masuk")
        ->join("jenis_barangs", "jenis_barangs.id", "=", "barang_keluars.id_jenis_barang")
        ->get();

        return view('barangkeluar.index', compact('barangkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisbarang = JenisBarang::all();
        $namabarang = BarangMasuk::all();
        return view('barangkeluar.create',compact('jenisbarang','namabarang'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'id_barang_masuk' => 'required',
            'id_jenis_barang' => 'required',
            'jumlah' => 'required',
            'penjamin' => 'required',
        ]);

        BarangKeluar::create([
            'tanggal' => $request->tanggal,
            'id_barang_masuk' => $request->id_barang_masuk,
            'id_jenis_barang' => $request->id_jenis_barang,
            'jumlah' => $request->jumlah,
            'penjamin' => $request->penjamin,
        ]);

        return redirect()->to('barang-keluar')->with('success','Data Berhasil ditambahkan');
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
        $barangkeluar = BarangKeluar::where('id',$id)->first();
        $barangkeluar['jenis'] = JenisBarang::all();
        $barangkeluar['namabarang'] = BarangMasuk::all();
         //$infobarang = InfoBarang::where('id', $id)->first();
         return view('barangkeluar.edit',compact('barangkeluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'id_barang_masuk' => 'required',
            'id_jenis_barang' => 'required',
            'jumlah' => 'required',
            'penjamin' => 'required',
           ]) ;
    
           $barangkeluar = [
            'tanggal'=> $request->tanggal,
            'id_barang_masuk' => $request->id_barang_masuk,
            'id_jenis_barang'=>$request->id_jenis_barang,
            'jumlah' => $request->jumlah,
            'penjamin' => $request->penjamin,
    
           ];
    
           BarangKeluar::where('id', $id)->update($barangkeluar);
           return redirect()->to('barang-keluar')->with('success', 'Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BarangKeluar::where('id',$id)->delete();
        return redirect()->to('barang-keluar')->with('success', 'Data Berhasil dihapus');
    }
}
