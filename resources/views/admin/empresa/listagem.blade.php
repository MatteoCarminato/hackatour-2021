@extends('admin.includes.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listagem de Empresa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Listagem de Empresa</li>
            </ol>
          </div>
        </div>
        @if ($message = Session::get('success'))
          <div class="alert alert-success border-0" role="alert">
            <strong>{{ $message }}</strong>!
          </div>
        @endif
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
                      <th>Nome</th>
                      <th>Código</th>
                      <th style="width: 40px">Qrcode</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($empresas as $empresa)
                        <tr>
                        <td>{{ $empresa->id }}</td>
                        <td>{{ $empresa->nome }}</td>
                        <td>{{ $empresa->codigo }}</td>
                        <td><a href="{{route('QRCodeEmpresa',$empresa->codigo)}}">Qrcode</a></td>
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