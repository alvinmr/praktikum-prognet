@extends('layouts.admin-layout.master')

@section('title')
    Discount Master
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Discount Master</h3>
        @endslot
    @endcomponent

    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Edit Data Discount</h5>
                        <a href="{{ url('admin/discount') }}" class="float-right btn btn-success btn-sm">Back!</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" enctype="multipart/form-data" action="{{ route('admin.discount.update',$discount) }}">
                                @csrf
                                @method('put')
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Product</span> </th>
                                        <td> <input  readonly name="product" type="text" class="form-control @error('product') is-invalid @enderror" value="{{ $discount->product->product_name }}" >
                                            @error('discount')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Discount</span> </th>
                                        <td> <input name="discount" type="number" class="form-control @error('discount') is-invalid @enderror" value="{{ $discount->percentage }}">
                                            @error('discount')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Start Time</span> </th>
                                        <td>
                                            <input name="start" type="datetime-local" class="form-control @error('start') is-invalid @enderror" value="{{date('Y-m-d\TH:i:s', strtotime($discount->start))}}">
                                            @error('start')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>End Time</span> </th>
                                        <td> 
                                            <input name="end" type="datetime-local" class="form-control @error('end') is-invalid @enderror" value="{{date('Y-m-d\TH:i:s', strtotime($discount->end))}}">
                                            @error('end')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.3/dist/js/select2.min.js"></script>
        <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
        <script>
            $(document).ready(function() {

            // Selecr2
            $('#product').select2({
                placeholder: 'Select Product',
                width: 'resolve',
            }); 
        });
        </script>
    @endpush

    @push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    <style>
        .select2-selection--multiple .select2-search--inline .select2-search__field {
            width: auto !important;
        }

    </style>
@endpush
@endsection
