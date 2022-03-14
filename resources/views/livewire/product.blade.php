<div>
    <ul class="row list-unstyled products-group no-gutters">
        @foreach ($products as $product)
            <li class="col-6 col-md-3 col-xl-3 product-item">
                <div class="product-item__outer h-100">
                    <div class="product-item__inner px-xl-4 p-3">
                        <div class="product-item__body pb-xl-2">
                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                    class="font-size-12 text-gray-5">Speakers</a></div>
                            <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">{{ $product->product_name }}</a></h5>
                            <div class="mb-2">
                                <a href="{{ route('product.show', $product->id) }}" class="d-block text-center"><img
                                        class="img-fluid" src="{{ $product->images[0]->image_name }}g"
                                        alt="Image Description"></a>
                            </div>
                            <div class="flex-center-between mb-1">
                                <div class="prodcut-price">
                                    <div class="text-gray-100">Rp. {{ number_format($product->price, 2, ',', '.') }}
                                    </div>
                                </div>
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
        @endforeach
    </ul>

    <!-- Shop Pagination -->
    {{ $products->links() }}
    <!-- End Shop Pagination -->
</div>
