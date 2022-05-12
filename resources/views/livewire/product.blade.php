<div>
    @push('scripts')
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            Livewire.on('addedToCart', function(message) {
                toastr.success("Product success added to cart");
            });
        </script>
    @endpush
    @push('css')
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @endpush


    <ul class="row list-unstyled products-group no-gutters">
        @forelse ($products as $product)
            <li class="col-6 col-md-3 col-xl-3 product-item">
                <div class="product-item__outer h-100">
                    <div class="product-item__inner px-xl-4 p-3">
                        <div class="product-item__body pb-xl-2">
                            <div class="d-flex">
                                @foreach ($product->categories as $category)
                                    <div class="mb-2 mr-2">
                                        <a href="../shop/product-categories-7-column-full-width.html"
                                            class="font-size-12 text-gray-5">{{ $category->category_name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <h5 class="mb-1 product-item__title"><a href="{{ route('product.show', $product->id) }}"
                                    class="text-blue font-weight-bold">{{ $product->product_name }}</a></h5>
                            <div class="mb-2">
                                <a href="{{ route('product.show', $product->id) }}" class="d-block text-center"><img
                                        class="img-fluid" src="{{ $product->image }}"
                                        alt="Image Description"></a>
                            </div>
                            <div class="flex-center-between mb-1">
                                @if ($product->discount)
                                    <div class="prodcut-price d-flex align-items-center position-relative">
                                        <ins class="font-size-20 text-red text-decoration-none">Rp.
                                            {{ number_format($product->price_discount(), 2, ',', '.') }}</ins>
                                        <del class="font-size-12 tex-gray-6 position-absolute " style="bottom: 75%">Rp.
                                            {{ number_format($product->price, 2, ',', '.') }}</del>
                                    </div>
                                @else
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">Rp.
                                            {{ number_format($product->price, 2, ',', '.') }}
                                        </div>
                                    </div>
                                @endif
                                <div class="d-none d-xl-block prodcut-add-cart">
                                    <button wire:click="addToCart({{ $product->id }})"
                                        class="btn-add-cart btn-primary transition-3d-hover"><i
                                            class="ec ec-add-to-cart"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @empty
            <div class="col-12 mt-10">
                <div class="alert alert-info">
                    <h4 class="alert-heading">Product Not Found</h4>
                    <p>
                        <a href="{{ route('home') }}" class="alert-link">Back to Home</a>
                    </p>
                </div>
            </div>
        @endforelse
    </ul>

    <!-- Shop Pagination -->
    {{ $products->links() }}
    <!-- End Shop Pagination -->
</div>
