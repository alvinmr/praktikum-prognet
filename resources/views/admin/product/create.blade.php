@extends('layouts.admin-layout.master')

@section('title')
    Product Master
    {{ $title }}
@endsection



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
                        <a href="{{ url('admin/product') }}" class="float-right btn btn-success btn-sm">Back!</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" enctype="multipart/form-data" action="{{ route('admin.product.store') }}">
                                @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Product Name</th>
                                        <td><input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Category</th>
                                        <td>
                                            <select name="categories[]" multiple class="form-control" id="category">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Price</span> </th>
                                        <td> <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                                            @error('price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Stock</span> </th>
                                        <td> <input name="stock" type="number" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}">
                                            @error('stock')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Weight</span> </th>
                                        <td> <input name="weight" type="number" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}">
                                            @error('weight')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td><input name="desc" type="text" class="form-control @error('desc') is-invalid @enderror" value="{{ old('desc') }}"/> 
                                            @error('desc')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Picture</th>
                                        <td>
                                            <div>
                                                <input type="file" multiple name="product[]" class="form-control"
                                                    id="product-images" />
                                            </div>
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
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    <style>
        .select2-selection--multiple .select2-search--inline .select2-search__field {
            width: auto !important;
        }

    </style>
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.3/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        $(document).ready(function() {

            // Selecr2
            $('#category').select2({
                placeholder: 'Select Category',
                width: 'resolve',
            });

            // filepond
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(
                FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImagePreview);
            const post = FilePond.create(document.querySelector('#product-images'));
            post.setOptions({
                server: {
                    process: {
                        url: '{{ route('admin.product.images.upload') }}',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    },
                    revert: {
                        url: '{{ route('admin.product.images.revert') }}',
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        onload: (response) => {
                            console.log(response);
                        },
                        onerror: (response) => {
                            console.log(response);
                        }
                    }
                },
                allowImagePreview: 'true',
                imagePreviewMaxHeight: 256,
                allowFileTypeValidation: 'true',
                acceptedFileTypes: ['image/jpg', 'image/jpeg', 'image/png'],
                allowFileSizeValidation: 'true',
                maxFileSize: '3mb'
            });
        });
    </script>
@endpush
