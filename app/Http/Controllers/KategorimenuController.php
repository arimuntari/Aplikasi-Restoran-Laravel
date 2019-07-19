<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ms_kategorimenu;
class KategorimenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorimenus = ms_kategorimenu::all();
        return view('admin.kategorimenu', compact('kategorimenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategorimenu');
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
        $request->gambar->move(public_path('gambar/kategori-menu'), $gambar);
        $kategorimenu = ms_kategorimenu::create($request->all());
        $kategorimenu->gambar =  $gambar;
        $kategorimenu->save();
        return redirect('kategorimenu');
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
        $kategorimenu= ms_kategorimenu::find($id);
        return view('admin.kategorimenu', compact('kategorimenu'));
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
        $kategorimenu= ms_kategorimenu::find($id);
        $kategorimenu->nama_kategori = $request->nama_kategori;
        if(!empty($request->gambar)){
            $file =  $request->file('gambar')->getClientOriginalName();
            $gambar = time()."-".$file;
            $cek = $request->gambar->move(public_path('gambar/kategori-menu'), $gambar);
            if($cek){
                if(file_exists(public_path('gambar/kategori-menu/'.$kategorimenu->gambar))){
                  unlink(public_path('gambar/kategori-menu/'.$kategorimenu->gambar));
                }
                $kategorimenu->gambar =  $gambar;
            }
        }
        $kategorimenu->save();
        return redirect('kategorimenu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategorimenu = ms_kategorimenu::find($id);
        if(file_exists(public_path('gambar/kategori-menu/'.$kategorimenu->gambar))){
            unlink(public_path('gambar/kategori-menu/'.$kategorimenu->gambar));
        }
        $kategorimenu->delete();
        return redirect('kategorimenu');
    }

    public function aktif($id)
    {
        
        $kategorimenu= ms_kategorimenu::find($id);
        if($kategorimenu->aktif=='0'){
            $kategorimenu->aktif = '1';
        }else{
            $kategorimenu->aktif = '0';
        }
        $kategorimenu->save();
        return redirect('kategorimenu');
    }
}
