@extends('layouts.admin-layout.master')

@section('title')
    Product Category Master
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Product Category Master</h3>
        @endslot
    @endcomponent

    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Create Data Product Category</h5>
                        <a href="{{ url('admin/productcategory') }}" class="float-right btn btn-success btn-sm">Back!</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" enctype="multipart/form-data" action="{{ route('admin.productcategory.store') }}">
                                @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Product Category Name</th>
                                        <td><input name="name" type="text" class="form-control" /> </td>
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

    @push('scripts')
        <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    @endpush
@endsection
