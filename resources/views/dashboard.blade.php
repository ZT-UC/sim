@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $total_users ?? 0 }}</h3>
                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $total_products ?? 0 }}</h3>
                  <p>Product</p>
                </div>
                <div class="icon">
                  <i class="fa fa-list"></i>
                </div>
                <a href="{{ route('products.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3 class="text-white">{{ $total_stocks_in ?? 0 }}</h3>
                  <p class="text-white">Stocks In</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cart-plus"></i>
                </div>
                <a href="{{ route('stockHistory') }}" class="text-white small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $total_return_products ?? 0 }}</h3>
                  <p>Return Products</p>
                </div>
                <div class="icon">
                  <i class="fa fa-list"></i>
                </div>
                <a href="{{ route('returnProductHistory') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="card card-primary card-outline">
            <div class="card-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th class="text-center">Image</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($recent_products)
                            @foreach($recent_products as $key => $product)
                                <tr>
                                    <td> {{ ++$key }}</td>
                                    <td class="text-center">
                                      <img width="64" height="64" src="{{ asset('storage/product_images/'. $product->image) }}">
                                    </td>
                                    <td>{{$product->name ?? ''}}</td>
                                    <td>{{$product->sku ?? ''}}</td>
                                    <td>{{$product->category->name ?? ''}}</td>
                                    <td>{{$product->brand->name ?? ''}}</td>
                                    <td class="text-center">
                                      <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-primary mr-2">
                                        <i class="fa fa-desktop"></i> Show
                                      </a>
                                      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info mr-2">
                                        <i class="fa fa-edit"></i> Edit
                                      </a>
                                      <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="product-delete-{{ $product->id }}">
                                        <i class="fa fa-trash"></i> Delete
                                      </a>
                                      <form id="product-delete-{{ $product->id }}"action="{{ route('products.destroy', $product->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection