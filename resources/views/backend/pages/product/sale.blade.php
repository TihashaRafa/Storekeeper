@extends('backend.Layouts.admin')
@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>In Stock</th>
                                            <th>Quantity</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $key => $items)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $items->product_name }}</td>
                                                <td>{{ $items->product_price }}</td>
                                                <td>{{ $items->product_quantity }}</td>
                                                <td>
                                                    <form action="{{ route('product.processSale') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $items->id }}">
                                                        <input type="text" name="product_quantity"
                                                            value="{{ $items->product_quantity }}">
                                                <td>
                                                    <button type="submit" class="btn btn-primary btn-sm">Update
                                                        Quantity</button>
                                                </td>

                                                </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
