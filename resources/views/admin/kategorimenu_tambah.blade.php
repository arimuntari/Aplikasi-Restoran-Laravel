@extends('admin.header')
  <!-- Full Width Column -->
  @section('title')
      <section class="content-header">
        <h1>
          <i class="fa fa-list"></i> Kategori Menu
        </h1>
      </section>
  @endsection 

  @section('content')
      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">
                Tambah Data
            </h3>
          </div>
          <div class="box-body">
            @include('admin.validasi')
            <form  action="{{ route('kategorimenu.store') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="nama_kategori" class=" control-label">Nama Kategori</label>
                    <input class="form-control" type="text" name="nama_kategori" placeholder="Nama Kategori">
                </div>
                <div class="form-group">
                  <label for="nama_kategori" class="control-label">Gambar</label>
                    <input class="form-control" type="file" name="gambar">
                </div>
              </div>
              <div class="box-footer">
                <a href="{{ route('kategorimenu.index') }}" class="btn btn-default" id="btn-cancel">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
  @endsection
