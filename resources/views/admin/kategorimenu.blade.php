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

@if( Helpers::thisAction() == 'create')
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
@elseif( Helpers::thisAction() == 'edit')
  <section class="content">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">
            Edit Data
        </h3>
      </div>
      <div class="box-body">
        @include('admin.validasi')
        <form action="{{ route('kategorimenu.update', $kategorimenu->id) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="box-body">
            <div class="form-group">
              <label for="nama_kategori" control-label">Kategori Menu</label>
                <input class="form-control" type="text" name="nama_kategori" placeholder="Kategori Menu" value='{{ $kategorimenu->nama_kategori }}'>
            </div>
            <div class="form-group">
              <label for="nama_kategori" class="control-label">Gambar<i style="color:red;"> *Kosongi jika tidak ingin mengganti gambar</i></label>
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
@else
  <!-- Main content -->
  <section class="content">
    <div class="box box-default">
      <div class="box-header with-border">
        <div class="box-title">
          <div class="col-md-12">
            <div class="btn-group">
              <a href="{{ route('kategorimenu.create') }}"
              	 class="btn btn-primary"
              	 data-placement="top" 
              	 data-toggle="tooltip" 
              	 data-original-title="Tambah">
              	 <i class="fa fa-plus"></i>
              </a>
            </div>  
            <div class="btn-group">
              <a href="{{ route('kategorimenu.index') }}" 
              	 class="btn btn-info" 
              	 data-placement="top" 
              	 data-toggle="tooltip" 
              	 data-original-title="Refresh">
              	<i class="fa fa-refresh"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="box-body">
        <div class="table table-responsive">
          <table class="table table-bordered">
          	<thead>
          		<tr>
          			<th width="3%">No</th>
          			<th>Nama Kategori</th>
                <th>Gambar</th>
          			<th width="10%">Status</th>
          			<th width="18%"></th>
          		</tr>
          	</thead>
          	<tbody>
          		<?php  $no = 0 ;?>
          		@foreach($kategorimenus as $kategorimenu)
          		<?php  $no++ ;?>
          		<tr>
          			<td>{{ $no }}</td>
          			<td>{{ $kategorimenu->nama_kategori }}</td>
                <td>
                    <a href="{{ url('gambar/kategori-menu/'.$kategorimenu->gambar) }}" target="_blank">
                    <img src="{{ url('gambar/kategori-menu/'.$kategorimenu->gambar) }}"
                         width="50px"  height="50px" 
                         title="{{ $kategorimenu->nama_kategori }}"></img>
                    </a>
                  </td>
          			<td>{!! Helpers::cekAktif($kategorimenu->aktif) !!}</td>
          			<td style="word-wrap: nowrap">

                  <form id="delform" action="{{ route('kategorimenu.destroy', $kategorimenu->id ) }}" method="POST"> 
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }} 
          				<a  href="{{ route('kategorimenu.aktif', $kategorimenu->id) }}" 
          					class="btn btn-success btn-xs" 
          					title="Tombol Untuk Aktif/Non-aktif">
          					<i class="fa fa-check"></i>
          				</a>&nbsp;&nbsp;
          				<a 
          					href="{{ route('kategorimenu.edit', $kategorimenu->id) }}" 
          					class="btn btn-warning btn-xs" 
          					title="Tombol Untuk Edit">
          					<i class="fa fa-pencil"></i>
          				</a>&nbsp;&nbsp;

          				<button type="button" 
          					onclick="if(confirm('Apakah Anda yakin untuk Menghapus Data ini?')){ submit();}" 
          					class="btn btn-danger btn-xs" 
          					title="Tombol Untuk Hapus">
          					<i class="fa fa-trash"></i>
          				</button>
             		   </form>
          			</td>
          		</tr>
          		@endforeach
          	</tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
@endif
      <!-- /.content -->
@endsection
