@extends('admin.header')
  <!-- Full Width Column -->
  @section('title')
      <section class="content-header">
        <h1>
          <i class="fa fa-user"></i> Usermanager
        </h1>
      </section>
  @endsection 

  @section('content')
      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">
                Edit Data
            </h3>
          </div>
          <div class="box-body">
            @include('admin.validasi')
            <form class="form-horizontal" action="{{ route('usermanager.update', $user->id) }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" placeholder="Nama" value='{{ $user->name }}'>
                  </div>
                </div>
                <div class="form-group">
                  <label for="login" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" readonly name="username" placeholder="Username"  value='{{ $user->username }}'>

                  </div>
                </div>
                <div class="form-group">
                  <label for="pwd" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="password" name="password" placeholder="Password"  value='{{ $user->password }}'>
                  </div>
                </div>
                <div class="form-group">
                  <label for="foto" class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="foto" placeholder="foto">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="tipe" class="col-sm-2 control-label">Akses User</label>
                  <div class="col-sm-10">
                  <select name="tipe" class="form-control">
                    <option value="">-- Pilih Akses User --</option>
                    <option value="1" @if($user->tipe == '1') selected @endif  > Administrator </option>
                    <option value="2" @if($user->tipe == '2') selected @endif> Kasir </option>
                    <option value="3" @if($user->tipe == '3') selected @endif> Dapur </option>
                  </select>
                     @if ($errors->has('tipe'))
                        <span class="text-red">
                            <strong>{{ $errors->first('tipe') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <a href="{{ route('usermanager.index') }}" class="btn btn-default" id="btn-cancel">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
  @endsection
