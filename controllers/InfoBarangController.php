<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\InfoBarang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;

class InfoBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //JOIN TABLE
        $infobarang =  InfoBarang::select(
            "info_barangs.id",
            "info_barangs.id_barang_masuk", 
            "info_barangs.id_jenis_barang",
            "info_barangs.stok",
            "info_barangs.rak_barang",
           // "info_barangs.sisa_stok" ,
            "barang_masuks.nama_barang as nama_barang",
            "jenis_barangs.jenis_barang as jenis_barang",
          //  "barang_keluars.jumlah as jumlah"
            
        )
        ->join("barang_masuks", "barang_masuks.id", "=", "info_barangs.id_barang_masuk")
        ->join("jenis_barangs", "jenis_barangs.id", "=", "info_barangs.id_jenis_barang")
        //->join("barang_keluars", "barang_keluars.jumlah", "=", "info_barangs.id")
        //->selectRaw("info_barangs.stok - barang_keluars.jumlah AS hasil_pengurangan")
        ->get();
        
        // foreach ($infobarang as $hasil) {
            
        //     $infobarang->setAttribute('sisa_stok', $hasil->hasil_pengurangan);
        //     $infobarang->save();
        // }
       
        return view('infobarang.index', compact('infobarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $namabarang = BarangMasuk::all();
        $jenisbarang = JenisBarang::all();
        return view('infobarang.create', compact('namabarang','jenisbarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang_masuk' => 'required',
            'id_jenis_barang' => 'required',
            'stok' => 'required',
            'rak_barang' => 'required',
        ]);

        InfoBarang::create([
            'id_barang_masuk' => $request->id_barang_masuk,
            'id_jenis_barang' => $request->id_jenis_barang,
            'stok' => $request->stok,
            'rak_barang' => $request->rak_barang,

        ]);

      
        return redirect()->to('info-barang')->with('success', 'Data Berhasil di simpan!');
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
    public function edit($id)
    {
        //JOIN TABLE EDIT
        // $infobarang = DB::table('jenis_barangs')->join('info_barangs', 'info_barangs.id_jenis_barang', '=', 'jenis_barangs.id')
        // ->get()->where('id',$id)->first();

        $infobarang = InfoBarang::where('id',$id)->first();
       $infobarang['jenis'] = JenisBarang::all();
       $infobarang['barang_masuk'] = BarangMasuk::all();
        //$infobarang = InfoBarang::where('id', $id)->first();
        return view('infobarang.edit',compact('infobarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
       $request->validate([
        'id_barang_masuk' => 'required',
        'id_jenis_barang' => 'required',
        'stok' => 'required',
        'rak_barang' => 'required',
       ]) ;

       $infobarang = [
        'id_barang_masuk'=> $request->id_barang_masuk,
        'id_jenis_barang'=>$request->id_jenis_barang,
        'stok' => $request->stok,
        'rak_barang' => $request->rak_barang,

       ];

       InfoBarang::where('id', $id)->update($infobarang);
       return redirect()->to('info-barang')->with('success', 'Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        InfoBarang::where('id',$id)->delete();
        return redirect()->to('info-barang')->with('success', 'Berhasil dihapus');
    }
}
