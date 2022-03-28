<div class="table-responsive">
    <form method="post" enctype="multipart/form-data" action="{{ url('admin/') }}">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Product Name</th>
                <td><input name="product-name" type="text" class="form-control" /> </td>
            </tr>
            <tr>
                <th>Product Category</th>
                <td>
                    <select name="product-category" class="form-control">
                        <option value="0">Category</option>
                        @foreach ($category as $tm)
                            <option value="{{ $tm->id }}">{{ $tm->category_name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Price</span> </th>
                <td> <input name="price" type="text" class="form-control"></td>
            </tr>
            <tr>
                <th>Stock</span> </th>
                <td> <input name="stock" type="text" class="form-control"></td>
            </tr>
            <tr>
                <th>Weight</span> </th>
                <td> <input name="weight" type="text" class="form-control"></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><input name="desc" type="text" class="form-control" /> </td>
            </tr>
            <tr>
                <th>Product Picture</th>
                {{ $images }}
                <td>
                    <div wire:ignore x-data x-init="() => {
                        const post = FilePond.create($refs.input);
                        post.setOptions({
                            allowMultiple: 'true',
                            server: {
                                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                    @this.upload('images', file, load, error, progress)
                                },
                                revert: (filename, load) => {
                                    @this.removeUpload('images', filename, load)
                                },
                            },
                            allowImagePreview: 'true',
                            imagePreviewMaxHeight: 256,
                            allowFileTypeValidation: 'true',
                            acceptedFileTypes: ['image/jpg', 'image/jpeg', 'image/png'],
                            allowFileSizeValidation: 'true',
                            maxFileSize: '4mb'
                        });
                    }">
                        <input type="file" multiple class="form-control" x-ref="input" />
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

@push('css')
    @once
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    @endonce
@endpush

@push('scripts')
    @once
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
        <script>
            // const post = FilePond.create(document.querySelector('#product-images'));
            // post.setOptions({
            //     allowMultiple: 'true',
            //     server: {
            //         process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
            //             @this.upload('images', file, load, error, progress)
            //         },
            //         revert: (filename, load) => {
            //             @this.removeUpload('images', filename, load)
            //         },
            //     },
            //     allowImagePreview: 'true',
            //     imagePreviewMaxHeight: 256,
            //     allowFileTypeValidation: 'true',
            //     acceptedFileTypes: 'image/jpg',
            //     allowFileSizeValidation: 'true',
            //     maxFileSize: '4mb'
            // });
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImagePreview);
        </script>
    @endonce
@endpush
