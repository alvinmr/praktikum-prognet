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
                                <th>Category</th>
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
                                <th>Description</th>
                                <td>{{$data->description}}</td>
                            </tr>
                            <tr>
                                <th>Foto Product</th>
                                <td> <img width="100"   src="{{ $data->images[0]->image_name }}"/> </td>
                            </tr>
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