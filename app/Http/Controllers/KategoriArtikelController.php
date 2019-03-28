<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KategoriArtikelRequest;
use App\KategoriArtikelModel;
use Auth; 
use DataTables;

class KategoriArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kategori.index');
    }
    public function getTableKategori()
    {
        $getKategori = KategoriArtikelModel::select(['id', 'nama','status_kategori']);

        return Datatables::of($getKategori)
            ->addColumn('action',function($kategori){
                return view('admin.kategori.buttonRole',['kategori' => $kategori])->render();
            })
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriArtikelRequest $request)
    {
        try {
            $kategori = new KategoriArtikelModel();
            $kategori->users_id = Auth::user()->id;
            $kategori->nama = $request->input('nama');
            $kategori->status_kategori = 1;
            $kategori->save();
            return back()->with('success','Kategori Berhasil di Tambahkan');
        } catch (\Exception $e) {
            return back()->with('danger', $e->getMessage());
        }

        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = KategoriArtikelModel::findOrFail($id);
        return response()->json($kategori, 200);
    }
    public function update(Request $request, $id)
    {
        try {
            $kategori = KategoriArtikelModel::findOrFail($id);
            $kategori->nama = $request->input('nama');
            $kategori->save();
        } catch (\Exception $e) {

        }
        return response()->json([
            'status' => 'Sukses',
            'error' => false,
            'data' => $kategori
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $kategori = KategoriArtikelModel::findOrFail($id);
            $kategori->delete();
        } catch (\Exception $e) {

        }
        return response()->json([
            'status' => 'Sukses',
            'error' => false,
            'data' => $kategori
        ]);
    }
    public function gantiStatus($id)
    {
        try {
            $kategori = KategoriArtikelModel::findOrFail($id);
            $kategori->status_kategori = !$kategori->status_kategori;
            $kategori->save();
        } catch (\Exception $e) {            
        }
        return response()->json([
            'status' => 'Sukses',
            'error' => false,
            'data' => $kategori
        ]);        
    }
}
