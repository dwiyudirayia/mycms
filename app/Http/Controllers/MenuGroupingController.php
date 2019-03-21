<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuGroupingModel;
use Auth;
use DataTables;

class MenuGroupingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menuGrouping.index');
    }
    public function getMenu()
    {
        $getMenuGrouping = MenuGroupingModel::select(['id', 'nama']);

        return Datatables::of($getMenuGrouping)
            ->addColumn('action',function($menuGrouping){
                return view('admin.menuGrouping.buttonRole',['menuGrouping' => $menuGrouping])->render();
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
        return view('admin.menuGrouping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new MenuGroupingModel();
        $menu->users_id = Auth::user()->id;
        $menu->nama = $request->input('nama');
        $menu->save();
        return redirect('/menuGrouping');
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
        $menu = MenuGroupingModel::findOrFail($id);
        return response()->json($menu,200);
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
        $menu = MenuGroupingModel::findOrFail($id);
        $menu->users_id = Auth::user()->id;
        $menu->nama = $request->input('nama');
        $menu->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = MenuGroupingModel::findOrFail($id);
        $menu->delete();
    }
}
