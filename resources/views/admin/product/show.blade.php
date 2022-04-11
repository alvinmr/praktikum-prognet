@extends('layouts.admin-layout.master')

@section('title')
Product Master
{{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
@endpush

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>Product Master</h3>
@endslot
@endcomponent

<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Data Product</h5>
                    <a href="{{url('admin/product')}}" class="float-right btn btn-success btn-sm" >Back!</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" > 
                            <tr>
                                <th>Product Name</th>
                                <td>{{$data->product_name}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$data->description}}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>Rp.{{$data->price}}</td>
                            </tr>
                            <tr>
                                <th>Stock</th>
                                <td>{{$data->stock}}</td>
                            </tr>
                            <tr>
                                <th>Weight</th>
                                <td>{{$data->weight}}</td>
                            </tr>
                            <tr>
                                <th>Product Rate</th>
                                <td>{{$data->product_rate}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Data Gambar Product</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" > 
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->images as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> <img class="img-fluid" width="250" src="{{ $product->image_name }}"/></td>
                                        <td>
                                            <a onclick="return confirm('Apakah anda yakin untuk menghapus gambar product?')"
                                                href="{{ url('admin/product/' . $product->image_name . '/delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
</div>

<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Data Category Product</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" > 
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->categories as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>
                                            <a onclick="return confirm('Apakah anda yakin untuk menghapus category product?')"
                                                href="{{ url('admin/product/' . $product->category_name . '/delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
</div>


<script type="text/javascript">
    var body = document.body;
        body.classList.add("dark-only");
</script>

@push('scripts')
@endpush
@endsection