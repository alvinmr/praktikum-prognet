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
                    <h5>Create Data Product</h5>
                    <a href="{{url('admin/product')}}" class="float-right btn btn-success btn-sm" >Back!</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" enctype="multipart/form-data" action="{{url('admin/product')}}">
                            @csrf
                        <table class="table table-bordered" > 
                            <tr>
                                <th>Product Name</th>
                                <td><input name="product-name" type="text" class="form-control" value="{{$data->product_name}}"/> </td>
                            </tr>
                            <tr>
                                <th>Product Category</th>
                                <td>
                                    <select name="product-category" class="form-control">
                                        <option value="0">Category</option>
                                        @foreach($category as $tm)
                                        <option value="{{$tm->id}}">{{$tm->category_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Price</span> </th>
                                <td> <input name="price" type="text" class="form-control" value="{{$data->price}}"></td> 
                            </tr>
                            <tr>
                                <th>Stock</span> </th>
                                <td> <input name="stock" type="text" class="form-control" value="{{$data->stock}}"></td> 
                            </tr>
                            <tr>
                                <th>Weight</span> </th>
                                <td> <input name="weight" type="text" class="form-control" value="{{$data->weight}}"></td> 
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><input name="desc" type="text" class="form-control" value="{{$data->description}}"/> </td>
                            </tr>
                            <tr>
                                <th>Product Picture</th>
                                <td><input name="pict" type="file" class="form-control"/> </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" /> 
                                </td>
                            </tr>
                        </table>
                        </form>
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