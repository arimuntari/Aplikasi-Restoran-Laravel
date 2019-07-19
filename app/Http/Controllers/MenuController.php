<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ms_menu;
use App\ms_kategorimenu;
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
        $kategorimenus= ms_kategorimenu::all();
        return view('admin.menu', compact('kategorimenus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file =  $request->file('gambar')->getClientOriginalName();
        $gambar = time()."-".$file;
        $request->gambar->move(public_path('gambar/menu'), $gambar);
        $menu = ms_menu::create($request->all());
        $menu->gambar =  $gambar;
        $menu->save();
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
        $kategorimenus= ms_kategorimenu::all();
        return view('admin.menu', compact('menu', 'kategorimenus'));
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
        $menu->id_kategori = $request->id_kategori;
        $menu->harga = $request->harga;
        if(!empty($request->gambar)){
            $file =  $request->file('gambar')->getClientOriginalName();
            $gambar = time()."-".$file;
            $cek = $request->gambar->move(public_path('gambar/menu'), $gambar);
            if($cek){
                if(file_exists(public_path('gambar/menu/'.$menu->gambar))){
                  unlink(public_path('gambar/menu/'.$menu->gambar));
                }
                $menu->gambar =  $gambar;
            }
        }
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
        $menu = ms_menu::find($id);
        if(file_exists(public_path('gambar/menu/'.$menu->gambar))){
          unlink(public_path('gambar/menu/'.$menu->gambar));
        }
        $menu->delete();
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
