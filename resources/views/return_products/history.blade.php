@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Return Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Return Product History</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title">Return Product History</h5>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered">
                      <thead>
                          <tr>
                              <th>#SL</th>
                              <th>Date</th>
                              <th>Product</th>
                              <th>Size</th>
                              <th>Quantity</th>
                          </tr>
                      </thead>
                      <tbody>
                          @if($return_products)
                              @foreach($return_products as $key => $return_product)
                                  <tr>
                                      <td> {{ ++$key }}</td>
                                      <td>{{ $return_product->date ?? '' }}</td>
                                      <td>{{ $return_product->product->name ?? '' }}</td>
                                      <td>{{ $return_product->size->size ?? '' }}</td>
                                      <td>{{ $return_product->quantity ?? '' }}</td>
                                  </tr>
                                  @endforeach
                              @endif
                      </tbody>
                  </table>
                </div>
            </div><!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection