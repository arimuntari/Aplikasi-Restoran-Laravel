<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ms_menu;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = ms_menu::all();
        return view('admin.menu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = ms_menu::create($request->all());
        return redirect('menu');
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
        $menu= ms_menu::find($id);
        return view('admin.menu_edit', compact('menu'));
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
        $menu= ms_menu::find($id);
        $menu->nama_menu = $request->nama_menu;
        $menu->save();
        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = ms_menu::find($id);
        $hapus->delete();
        return redirect('menu');
    }

    public function aktif($id)
    {
        
        $menu= ms_menu::find($id);
        if($menu->aktif=='0'){
            $menu->aktif = '1';
        }else{
            $menu->aktif = '0';
        }
        $menu->save();
        return redirect('menu');
    }
}
