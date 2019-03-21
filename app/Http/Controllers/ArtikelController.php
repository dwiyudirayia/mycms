<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtikelModel;
use App\KategoriArtikelModel;
use App\Http\Requests\ArtikelRequest;
use Auth;
use DB;
use DataTables;
use File;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $artikel;
    public function __construct(ArtikelModel $artikel) {
        $this->artikel = $artikel;
    }

    public function index() {
        return view('admin.artikel.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $kategori = KategoriArtikelModel::all();
        return view('admin.artikel.create',['kategori' => $kategori]);
    }

    public function deleteImageIsi(Request $request) {        
        $src = $request->input('src');
        $getFileImage = str_replace(url('/upload/'), '',$src);
        
        $deleteImageIsi = public_path().'/upload/'.$getFileImage;
        File::delete($deleteImageIsi);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtikelRequest $request)
    {
        $isi = $request->input('isi');
        
        $dom = new \DomDocument();
        $dom->loadHtml($isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/upload/" . time().$k.'.png';    
            $path = public_path() . $image_name;    
            file_put_contents($path, $data);    
            $img->removeAttribute('src');    
            $img->setAttribute('src', $image_name);
        }
        $detail = $dom->saveHTML();
        //Handle File Upload
        if($request->hasFile('headerImage'))
        {            
            //Get Filename with The Extension
            $filenameWithExt = $request->file('headerImage')->getClientOriginalName();

            //Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            //Get Just Ext
            $extension = $request->file('headerImage')->getClientOriginalExtension();

            //Filename to Store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('headerImage')->storeAs('public/artikel/headerImage',$filenameToStore);
            
        } else {
            $filenameToStore = 'default_image.jpg';
            $path = $request->file('headerImage')->storeAs('public/artikel/headerImage',$filenameToStore);
        }

        $this->artikel->create([
            'kategori_id' => $request->input('kategori_id'),
            'users_id' => Auth::user()->id,
            'judul' => $request->input('judul'),
            'headerImage' => $filenameToStore,
            'isi' => ($detail == null ? $request-input('isi') : $detail),
            'status_artikel' => $request->input('status_artikel'),
        ]);        
        return back()->with('message', 'Data Berhasil di Masukan');
    }

    public function show($id)
    {
        $artikel =  DB::table('artikel')
                    ->join('kategori_artikel', 'kategori_artikel.id', '=','artikel.kategori_id')
                    ->join('users', 'users.id', '=', 'artikel.users_id')
                    ->select('artikel.id', 'artikel.headerImage', 'artikel.judul', 'artikel.isi', 'artikel.created_at', 'kategori_artikel.nama', 'users.name', 'users.email')
                    ->get();        
        return view('admin.artikel.viewArtikel',['artikel' => $artikel['0']]);
    }

    public function getTableArtikel()
    {
        $getArtikel = DB::table('kategori_artikel')->join('artikel','kategori_artikel.id','=','artikel.kategori_id')->select('artikel.id','kategori_artikel.nama','artikel.judul','artikel.status_artikel')->get();

        return Datatables::of($getArtikel)
            ->addColumn('action',function($artikel){
                return view('admin.artikel.buttonRole',['artikel' => $artikel])->render();
            })
            ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = DB::table('kategori_artikel')->join('artikel','kategori_artikel.id','=','artikel.kategori_id')->select('artikel.id','artikel.judul','artikel.isi','artikel.status_artikel','kategori_artikel.id as kategori_id')->where('artikel.id','=',$id)->get();
        $kategori = KategoriArtikelModel::all();
        return response()->json([
            'artikel_form' => $artikel,
            'kategori' => $kategori,
        ], 200);

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

        try {
            $artikel = ArtikelModel::findOrFail($id);
            $isi = $request->input('isi');

            $dom = new \DomDocument();
            $dom->loadHtml($isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    

            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= "/upload/" . time().$k.'.png';    
                $path = public_path() . $image_name;    
                file_put_contents($path, $data);    
                $img->removeAttribute('src');    
                $img->setAttribute('src', $image_name);
            }
            $detail = $dom->saveHTML();
            if($request->hasFile('headerImage'))
            {            
            $deleteHeaderImage = public_path().'/storage/artikel/headerImage/'.$artikel->headerImage;
            File::delete($deleteHeaderImage);    
            //Get Filename with The Extension
            $filenameWithExt = $request->file('headerImage')->getClientOriginalName();

            //Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            //Get Just Ext
            $extension = $request->file('headerImage')->getClientOriginalExtension();

            //Filename to Store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('headerImage')->storeAs('public/artikel/headerImage',$filenameToStore);

            $artikel->kategori_id = $request->input('kategori_id');
            $artikel->users_id = Auth::user()->id;
            $artikel->judul = $request->input('judul');            
            $artikel->headerImage = $filenameToStore;
            $artikel->isi = $detail;
            $artikel->status_artikel = $request->input('status_artikel');
            $artikel->save();
            } else {                                
                $artikel->kategori_id = $request->input('kategori_id');
                $artikel->users_id = Auth::user()->id;
                $artikel->judul = $request->input('judul');            
                $artikel->isi = $detail;
                $artikel->status_artikel = $request->input('status_artikel');
                $artikel->save();    
            }            
        } catch (\Exception $e) {

        }
        return response()->json([
            'status' => 'Sukses',
            'error' => false,
            'data' => $artikel
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
            $artikel = ArtikelModel::findOrFail($id);
            $deleteHeaderImage = public_path().'/storage/artikel/headerImage/'.$artikel->headerImage;
            File::delete($deleteHeaderImage);
            $artikel->delete();
        } catch (\Exception $e) {

        }
        return response()->json([
            'status' => 'Sukses',
            'error' => false,
            'data' => $artikel
        ]);
    }
    public function gantiStatus($id)
    {
        try {
            $artikel = ArtikelModel::findOrFail($id);
            $artikel->status_artikel = !$artikel->status_artikel;
            $artikel->save();
        } 
        catch (\Exception $e) {

        }
        return response()->json([
            'status' => 'Sukses',
            'error' => false,
            'data' => $artikel
        ]);        
    }
}
