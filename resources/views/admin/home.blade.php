@extends('admin.header')
  <!-- Full Width Column -->

  @section('title')
      <section class="content-header">
        <h1>
          <i class="fa fa-dashboard"></i>Dashboard
        </h1>
      </section>
  @endsection 

  @section('content')
      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="box-header with-border">
            <div class="box-title">
              <div class="col-md-12">
                <div class="btn-group">
                  <button class="btn btn-primary" id="btn-add" data-placement="top" data-toggle="tooltip" data-original-title="Tambah"><i class="fa fa-plus"></i></button>
                </div>  
                <div class="btn-group">
                  <button class="btn btn-info" id="btn-refresh" data-placement="top" data-toggle="tooltip" data-original-title="Refresh"><i class="fa fa-refresh"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="box-body">
            <div class="table">
              <table>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
  @endsection