@extends('layouts.admin-layout.master')

@section('title')
    Courier Master
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Courier Master</h3>
        @endslot
    @endcomponent

    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Data Courier</h5>
                        <a href="{{ url('admin/courier/create') }}" class="float-right btn btn-success btn-sm">Add
                            Courier!</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Courier</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($couriers as $courier)
                                        <tr>
                                            <td>{{ $courier->id }}</td>
                                            <td>{{ $courier->courier }}</td>
                                            <td>
                                                <a href="{{ url('admin/courier/' . $courier->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{ url('admin/courier/' . $courier->id . '/edit') }}"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Apakah anda yakin untuk menghapus data courier?')"
                                                    href="{{ url('admin/courier/' . $courier->id . '/delete') }}"
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

    @push('scripts')
        <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    @endpush
@endsection
