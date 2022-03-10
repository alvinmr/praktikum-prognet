@extends('layouts.user-layout.master')

@section('content')
<main id="content" role="main">
    <div class="container">
        <!-- Single Product Body -->
        <div class="mb-14 mt-10">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-5 mb-4 mb-md-0">
                    <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2" data-infinite="true"
                        data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                        data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                        data-nav-for="#sliderSyncingThumb">
                        <div class="js-slide">
                            <img class="img-fluid" src="{{ asset('assets_user/img/720X660/img1.jpg') }}"
                                alt="Image Description">
                        </div>
                        <div class="js-slide">
                            <img class="img-fluid" src="{{ asset('assets_user/img/720X660/img2.jpg') }}"
                                alt="Image Description">
                        </div>
                        <div class="js-slide">
                            <img class="img-fluid" src="{{ asset('assets_user/img/720X660/img3.jpg') }}"
                                alt="Image Description">
                        </div>
                        <div class="js-slide">
                            <img class="img-fluid" src="{{ asset('assets_user/img/720X660/img4.jpg') }}"
                                alt="Image Description">
                        </div>
                        <div class="js-slide">
                            <img class="img-fluid" src="{{ asset('assets_user/img/720X660/img5.jpg') }}"
                                alt="Image Description">
                        </div>
                    </div>

                    <div id="sliderSyncingThumb"
                        class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                        data-infinite="true" data-slides-show="5" data-is-thumbs="true"
                        data-nav-for="#sliderSyncingNav">
                        <div class="js-slide" style="cursor: pointer;">
                            <img class="img-fluid" src="{{ asset('assets_user/img/720X660/img1.jpg') }}"
                                alt="Image Description">
                        </div>
                        <div class="js-slide" style="cursor: pointer;">
                            <img class="img-fluid" src="{{ asset('assets_user/img/720X660/img2.jpg') }}"
                                alt="Image Description">
                        </div>
                        <div class="js-slide" style="cursor: pointer;">
                            <img class="img-fluid" src="{{ asset('assets_user/img/720X660/img3.jpg') }}"
                                alt="Image Description">
                        </div>
                        <div class="js-slide" style="cursor: pointer;">
                            <img class="img-fluid" src="{{ asset('assets_user/img/720X660/img4.jpg') }}"
                                alt="Image Description">
                        </div>
                        <div class="js-slide" style="cursor: pointer;">
                            <img class="img-fluid" src="{{ asset('assets_user/img/720X660/img5.jpg') }}"
                                alt="Image Description">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 mb-md-6 mb-lg-0">
                    <div class="mb-2">
                        <a href="#" class="font-size-12 text-gray-5 mb-2 d-inline-block">Headphones</a>
                        <h2 class="font-size-25 text-lh-1dot2">Ultra Wireless S50 Headphones S50 with Bluetooth</h2>
                        <div class="mb-2">
                            <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                <div class="text-warning mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                                <span class="text-secondary font-size-13">(3 customer reviews)</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <ul class="font-size-14 pl-3 ml-1 text-gray-110">
                                <li>4.5 inch HD Touch Screen (1280 x 720)</li>
                                <li>Android 4.4 KitKat OS</li>
                                <li>1.4 GHz Quad Core™ Processor</li>
                                <li>20 MP Electro and 28 megapixel CMOS rear camera</li>
                            </ul>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                        </p>
                        <p><strong>SKU</strong>: FW511948218</p>
                    </div>
                </div>
                <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3">
                    <div class="mb-2">
                        <div class="card p-5 border-width-2 border-color-1 borders-radius-17">
                            <div class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3">Availability:
                                <span class="text-green font-weight-bold">26 in stock</span>
                            </div>
                            <div class="mb-3">
                                <div class="font-size-36">$685.00</div>
                            </div>
                            <div class="mb-3">
                                <h6 class="font-size-14">Quantity</h6>
                                <!-- Quantity -->
                                <div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">
                                    <div class="js-quantity row align-items-center">
                                        <div class="col">
                                            <input
                                                class="js-result form-control h-auto border-0 rounded p-0 shadow-none"
                                                type="text" value="1">
                                        </div>
                                        <div class="col-auto pr-1">
                                            <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                href="javascript:;">
                                                <small class="fas fa-minus btn-icon__inner"></small>
                                            </a>
                                            <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                href="javascript:;">
                                                <small class="fas fa-plus btn-icon__inner"></small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Quantity -->
                            </div>
                            <div class="mb-3">
                                <h6 class="font-size-14">Color</h6>
                                <!-- Select -->
                                <select class="js-select selectpicker dropdown-select btn-block col-12 px-0"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border">
                                    <option value="one" selected>White with Gold</option>
                                    <option value="two">Red</option>
                                    <option value="three">Green</option>
                                    <option value="four">Blue</option>
                                </select>
                                <!-- End Select -->
                            </div>
                            <div class="mb-2 pb-0dot5">
                                <a href="#" class="btn btn-block btn-primary-dark"><i
                                        class="ec ec-add-to-cart mr-2 font-size-20"></i> Add to Cart</a>
                            </div>
                            <div class="mb-3">
                                <a href="#" class="btn btn-block btn-dark">Buy Now</a>
                            </div>
                            <div class="flex-content-center flex-wrap">
                                <a href="#" class="text-gray-6 font-size-13 mr-2"><i
                                        class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                <a href="#" class="text-gray-6 font-size-13 ml-2"><i
                                        class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Product Body -->
    </div>
    <div class="container">
        <!-- Related products -->
        <div class="mb-6">
            <div
                class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                <h3 class="section-title mb-0 pb-2 font-size-22">Related products</h3>
            </div>
            <ul class="row list-unstyled products-group no-gutters">
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree
                                        Full base audio</a></h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="../../assets/img/212X200/img1.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">$685,00</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a>
                                </h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="../../assets/img/212X200/img2.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price d-flex align-items-center position-relative">
                                        <ins class="font-size-20 text-red text-decoration-none">$1999,00</ins>
                                        <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2
                                            299,00</del>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="../../assets/img/212X200/img3.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">$685,00</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-md-lg">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="../../assets/img/212X200/img4.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">$685,00</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-xl">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="../../assets/img/212X200/img5.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">$685,00</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li
                    class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-wd d-xl-none d-wd-block">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a>
                                </h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="../../assets/img/212X200/img2.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price d-flex align-items-center position-relative">
                                        <ins class="font-size-20 text-red text-decoration-none">$1999,00</ins>
                                        <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2
                                            299,00</del>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Related products -->
    </div>

</main>
@endsection