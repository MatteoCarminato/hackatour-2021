@extends('admin.includes.app')

@section('content')

<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastrar Check Out</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cadastrar Check Out</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- Cadastrar Empresa elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cadastrar Check Out</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('storeCheckOut')}}" method="POST">
              @csrf
                <div class="card-body">
                  <input type="hidden" name="empresa_id" value="{{$empresa->id}}">
                  <input type="hidden" name="status" value="1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Valor Gasto</label>
                    <input type="text" name="valor_gasto"  class="form-control" id="exampleInputEmail1" placeholder="100.00">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tipo Pagamento</label>
                    <select class="custom-select rounded-0" name="tipo_pagamento">
                      <option value="1">Cartão</option>
                      <option value="2">Pix</option>
                      <option value="3">Dinheiro</option>
                    </select>  
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection