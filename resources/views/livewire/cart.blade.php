<div>
    <div class="d-none d-xl-block bg-primary">
        <div class="container">
            <div class="row align-items-stretch min-height-50">
                <!-- Search bar -->
                <div class="col align-self-center">
                    <!-- Search-Form -->
                    <form class="js-focus-state" method="GET" action="{{ route('home') }}">
                        <label class="sr-only" for="searchProduct">Search</label>
                        <div class="input-group">
                            <input type="search"
                                class="form-control py-2 pl-5 font-size-15 border-0 height-40 rounded-left-pill"
                                name="search" id="searchProduct" placeholder="Search for Products by Name"
                                aria-label="Search for Products" aria-describedby="searchProduct1" required
                                value="{{ request()->input('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-dark height-40 py-2 px-3 rounded-right-pill" type="submit"
                                    id="searchProduct1">
                                    <span class="ec ec-search font-size-24"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- End Search-Form -->
                </div>
                <!-- End Search bar -->
                <!-- Header Icons -->
                <div class="col-md-auto align-self-center">
                    <div class="d-flex">
                        <ul class="d-flex list-unstyled mb-0">
                            <li class="col pr-0">
                                <a href="{{ route('cart') }}" class="text-gray-90 position-relative d-flex "
                                    data-toggle="tooltip" data-placement="top" title="Cart">
                                    <i class="font-size-22 ec ec-shopping-bag"></i>
                                    @auth()
                                        <span
                                            class="width-22 height-22 bg-dark position-absolute flex-content-center text-white rounded-circle left-12 top-8 font-weight-bold font-size-12">
                                            {{ $cart_count }}</span>
                                        <span class="font-weight-bold font-size-16 text-gray-90 ml-3">Rp
                                            {{ number_format($price_total, 2, ',', '.') }}</span>
                                    @endauth
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Header Icons -->
            </div>
        </div>
    </div>
</div>
