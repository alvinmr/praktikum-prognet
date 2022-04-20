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

    {{-- // Ini tabel  produk --}}
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Edit Data Product</h5>
                        <a href="{{ url('admin/product') }}" class="float-right btn btn-success btn-sm">Back!</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" enctype="multipart/form-data" action="{{ route('admin.product.update',$product) }}">
                                @csrf
                                @method('PUT')
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Product Name</th>
                                        <td><input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{$product->product_name}}" /> 
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Price</span> </th>
                                        <td> <input name="price" type="text" class="form-control  @error('price') is-invalid @enderror" value="{{$product->price}}">
                                            @error('price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Stock</span> </th>
                                        <td> <input name="stock" type="number" class="form-control @error('stock') is-invalid @enderror" value="{{$product->stock}}">
                                            @error('stock')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Weight</span> </th>
                                        <td> <input name="weight" type="number" class="form-control @error('weight') is-invalid @enderror" value="{{$product->weight}}">
                                            @error('weight')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td><input name="desc" type="text" class="form-control @error('desc') is-invalid @enderror" value="{{$product->description}}" /> 
                                            @error('desc')
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

    {{-- // Ini tabel image produk --}}
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Data Image Product</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addImageModal">
                            + Add Image Product
                    </button>
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
                                    @foreach ($product->images as $image)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td> <img class="img-fluid" width="100" src="{{ $image->image_name }}"/></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#imageModal{{ $image->id }}">
                                                <i class="fa-solid fa fa-image"></i>
                                                </button>
                                                <a onclick="return confirm('Apakah anda yakin untuk menghapus gambar product?')"
                                                    href="{{ url('admin/product/' . $image->id . '/deleteImage') }}"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>     
                                            </td>
                                        </tr>
                                         {{-- Image modal --}}
                                    <div class="modal fade" id="imageModal{{ $image->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Image Product</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <center>
                                                <div class="modal-body">
                                                    <img src="{{ $image->image_name }}" class="img-fluid"
                                                        alt="{{ $image->name }}">
                                                </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Ini tabel kategori produk --}}
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Data Category Product</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                + Add Category Product
                        </button>
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
                                    @foreach ($product->categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>
                                                <form action="{{ route('admin.product.delete-category', $product->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $category->id}}">
                                                    <button type="submit"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                                {{-- <a onclick="return confirm('Apakah anda yakin untuk menghapus category product?')"
                                                    href="{{ url('admin/product/' . $category->id . '/deleteCategory') }}"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> --}}
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

    {{-- Ini Modal tambah kategori produk --}}
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Category Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.product.category.add',$product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Product Category</label>
                            <select name="categories[]" multiple class="form-control" id="category" name="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                    </option>
                                    @endforeach
                            </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>

      {{-- Ini Modal tambah image produk --}}
      <div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Category Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.product.image.add',$product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Picture</label>
                            <input type="file" multiple name="product[]" class="form-control" id="product-images" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
