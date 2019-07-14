<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $path_foto = 'user';
    public function index()
    {
        $users = User::all();
        return view('admin.usermanager', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usermanager_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_foto= null;
        
        $this->validate($request, [
          'name'=>'required',
          'username'=>'required|unique:users|max:16',
          'password'=>'required',],
          $messages = [     
          'name.required' => 'Username Tidak Boleh Kosong!',
          'username.required' => 'Username Tidak Boleh Kosong!',  
          'username.unique' => 'Username Sudah Digunakan!',      
          'username.max' => 'Username Melebihi 16 karakter',     
          'password.required' => 'Password Tidak Boleh Kosong!', 
        ]);

        $foto = $request->file("foto");
        if(!empty($foto)){
            $nama_foto = $this->path_foto."/".time()."-".$foto->getClientOriginalName();
            $foto->move($this->path_foto, $nama_foto);
        }
        //var_dump($request->all());
        $user = User::create([
                    'name' => $request->name,
                    'username' => $request->username,
                    'password' => $request->password,
                    'foto' => $nama_foto,
                ]);

        return redirect()->route('usermanager.index');
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
         $user = User::find($id);
         return view('admin.usermanager_edit', compact('user'));
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
        $nama_foto= null;
        $this->validate($request, [
          'name'=>'required',
          'username'=>'required|max:16',
          'password'=>'required',],
          $messages = [     
          'name.required' => 'Username Tidak Boleh Kosong!',
          'username.required' => 'Username Tidak Boleh Kosong!',  
          'username.max' => 'Username Melebihi 16 karakter',     
          'password.required' => 'Password Tidak Boleh Kosong!', 
        ]);

        $foto = $request->file("foto");
       
        $user = User::find($id);
        if(!empty($foto)){
            $nama_foto = $this->path_foto."/".time()."-".$foto->getClientOriginalName();
            $foto->move($this->path_foto, $nama_foto);
        }else{
              $nama_foto =$user->foto;
        }
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->foto = $nama_foto;
        $user->tipe = $request->tipe;
        $user->save();
        return redirect()->route('usermanager.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        File::delete('user'.$user->foto);
        $user->delete();
        return redirect()->route('usermanager.index');
    }


    public function aktif($id)
    {
          $user= User::find($id);
        if($user->aktif=='0'){
            $user->aktif = '1';
        }else{
            $user->aktif = '0';
        }
        $user->save();
        return redirect('usermanager');
    }
}
