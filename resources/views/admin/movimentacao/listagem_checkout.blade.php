@extends('admin.includes.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Movimentação Check Out</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Movimentação Check Out</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nome Cliente</th>
                      <th>Nome Empresa</th>
                      <th>Valor Gasto</th>
                      <th>Tipo Pagamento</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($movimentacao as $row)
                        <tr>
                          <td>{{ $row->id }}</td>
                          <td>{{ $row->nome_cliente }}</td>
                          <td>{{ $row->nome_empresa }}</td>
                          <td>{{ $row->valor_gasto }}</td>
                          <td>{{ $row->tipo_pagamento }}</td>
                            @if ($row->status == 0) 
                              <td> <a href="{{route('createCheckOutMov',$row->id)}}">QR Code</a> </td>
                            @endif
                            @if ($row->status == 1) 
                              <td> Sucesso </td>
                            @endif                                
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection