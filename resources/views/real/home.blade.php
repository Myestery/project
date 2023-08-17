@section('title', $title)
@section('description', $description)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-breadcrumb">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Find Hotels</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <nav aria-label="breadcrumb">
                                {{-- <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i
                                                class="las la-home"></i>{{ trans('menu.dashboard-menu-title') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ trans('menu.ecommerce-products') }}</li>
                                </ol> --}}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-xxl-50 mb-30">
                <div class="row justify-content-center">
                    <div class="col-md-8">


                        <div class="search-style-2 global-shadow ">
                            <form action="/" class="d-flex align-items-center">
                                <div class="job-search">
                                    <img src="{{ asset('assets/img/svg/search.svg') }}" alt="search" class="svg">
                                    <input class="form-control border-0 box-shadow-none" type="search"
                                        placeholder="eg Hotel Trivago" aria-label="Search">
                                </div>
                                {{-- <div class="location-search">
                                    <img src="{{ asset('assets/img/svg/map-pin.svg') }}" alt="map-pin" class="svg">
                                    <input class="form-control border-0 box-shadow-none" type="search"
                                        placeholder="Location" aria-label="Search">
                                </div> --}}
                                <button class="btn btn-primary"><img src="{{ asset('assets/img/svg/search.svg') }}"
                                        alt="search" class="svg">search</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="products_page product_page--grid mb-30">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="columns-1 col-lg-8 col-sm-10 mb-lg-0 mb-30">
                    <div class="widget mb-lg-30">
                        <div class="widget-header-title px-20 py-15">
                            <h6 class="d-flex align-content-center fw-500">
                                <img src="{{ asset('assets/img/svg/sliders.svg') }}" alt="sliders" class="svg"> Filters
                            </h6>
                        </div>
                        <div class="category_sidebar">
                            <!-- Start: Aside -->
                            <aside class="product-sidebar-widget mb-30">
                                <!-- Title -->
                                <div class="widget_title nocollapse">
                                    <h6>Price Range</h6>
                                </div>
                                <!-- Title -->
                                <!-- Body -->
                                <div class="card border-0 shadow-none mt-10">
                                    <div class="product-price-ranges">
                                        <div id="price-range" class="mb-0">
                                            <div class="section price">
                                                <div class="price-slider"></div>
                                                <p class="price-value"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Body -->
                            </aside>

                            <!-- End: Aside -->
                            <!-- Start: Aside -->
                            <aside class="product-sidebar-widget mb-30">
                                <!-- Title -->
                                <div class="widget_title" data-bs-toggle="collapse" href="#multiCollapseExample3"
                                    role="button" aria-expanded="true">
                                    <h6>Brands</h6>
                                </div>
                                <!-- Title -->
                                <!-- Body -->
                                <div class="card border-0 shadow-none multi-collapse mt-10 collapse show"
                                    id="multiCollapseExample3">
                                    <div class="product-brands limit-list-item">
                                        <ul>
                                            <li>

                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="check-1">
                                                    <label for="check-1">
                                                        <span class="checkbox-text">
                                                            Appliances

                                                            <span class="item-numbers">25</span>

                                                        </span>
                                                    </label>
                                                </div>


                                            </li>
                                            <li>

                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="check-2">
                                                    <label for="check-2">
                                                        <span class="checkbox-text">
                                                            Bags

                                                            <span class="item-numbers">54</span>

                                                        </span>
                                                    </label>
                                                </div>

                                            </li>
                                            <li>

                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="check-3">
                                                    <label for="check-3">
                                                        <span class="checkbox-text">
                                                            Electronic

                                                            <span class="item-numbers">78</span>

                                                        </span>
                                                    </label>
                                                </div>


                                            </li>
                                            <li>

                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="check-4">
                                                    <label for="check-4">
                                                        <span class="checkbox-text">
                                                            Entertainment

                                                            <span class="item-numbers">42</span>

                                                        </span>
                                                    </label>
                                                </div>


                                            </li>
                                            <li>

                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="check-5">
                                                    <label for="check-5">
                                                        <span class="checkbox-text">
                                                            Induction

                                                            <span class="item-numbers">35</span>

                                                        </span>
                                                    </label>
                                                </div>


                                            </li>
                                            <li>

                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="check-6">
                                                    <label for="check-6">
                                                        <span class="checkbox-text">
                                                            Laptops

                                                            <span class="item-numbers">64</span>

                                                        </span>
                                                    </label>
                                                </div>


                                            </li>
                                        </ul>
                                    </div>
                                </div>


                                <!-- Body -->
                            </aside>
                            <!-- End: Aside -->
                            <!-- Start: Aside -->
                            <aside class="product-sidebar-widget">
                                <!-- Title -->
                                <div class="widget_title" data-bs-toggle="collapse" href="#multiCollapseExample4"
                                    role="button" aria-expanded="true">
                                    <h6>Ratings</h6>
                                </div>
                                <!-- Title -->
                                <!-- Body -->
                                <div class="card border-0 shadow-none multi-collapse mt-10 collapse show"
                                    id="multiCollapseExample4">
                                    <div class="product-ratings">
                                        <ul>
                                            <li>
                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="product-1">
                                                    <label for="product-1">

                                                        <span class="stars-rating d-flex align-items-center">
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="checkbox-text">
                                                                and up
                                                                <span class="item-numbers">42</span>
                                                            </span>
                                                        </span>

                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="product-3">
                                                    <label for="product-3">

                                                        <span class="stars-rating d-flex align-items-center">
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="checkbox-text">
                                                                and up
                                                                <span class="item-numbers">54</span>
                                                            </span>
                                                        </span>

                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="product-4">
                                                    <label for="product-4">

                                                        <span class="stars-rating d-flex align-items-center">
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="checkbox-text">
                                                                and up
                                                                <span class="item-numbers">78</span>
                                                            </span>
                                                        </span>

                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="product-5">
                                                    <label for="product-5">

                                                        <span class="stars-rating d-flex align-items-center">
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="checkbox-text">
                                                                and up
                                                                <span class="item-numbers">42</span>
                                                            </span>
                                                        </span>

                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="product-6">
                                                    <label for="product-6">

                                                        <span class="stars-rating d-flex align-items-center">
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="checkbox-text">
                                                                and up
                                                                <span class="item-numbers">35</span>
                                                            </span>
                                                        </span>

                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Body -->
                            </aside>
                            <!-- End: Aside -->
                        </div>
                        <button class="btn btn-primary btn-default btn-squared border-0 ms-0">Filter
                        </button>
                    </div><!-- End: .widget -->
                </div><!-- End: .columns-1 -->
                <div class="columns-2 col-lg-12">
                    <!-- Start: Top Bar -->
                    <div class="shop_products_top_filter">
                        <div class="project-top-wrapper d-flex flex-wrap align-items-center">
                            
                        </div>
                    </div>
                    <!-- End: Top Bar -->
                    <!-- Start: Shop Item -->
                    <div class="row product-page-list">
                        @foreach ($hotels as $hotel)
                            <div class="col-12 mb-30 px-10">

                                <div class="card product product--list">
                                    <div class="h-100">
                                        <div class="product-item">
                                            <div class="product-item__image">
                                                <img src="{{ $hotel->images[0] }}" alt="hotel image"
                                                    class="img-fluid w-100">
                                            </div>
                                            <div class="product-item__body mt-xl-20 mt-0 position-relative">
                                                <span class="like-icon">
                                                    <button type="button" class="content-center">
                                                        <i class="lar la-heart icon"></i>
                                                    </button>
                                                </span>
                                                <div class="product-item__title">
                                                    <a href={{ "/hotels/$hotel->id" }}>
                                                        <h6 class="card-title">
                                                            {{ $hotel->name }}
                                                        </h6>
                                                    </a>
                                                    <p class="mb-0">{{ $hotel->description }}
                                                    </p>
                                                </div>
                                                <div class="product-item__content text-capitalize">
                                                    <div class="d-flex align-items-center mb-2 flex-wrap">
                                                        <span
                                                            class="product-desc-price ">N{{ number_format($hotel->min_price, 0, '', ',') }}
                                                            - N{{ number_format($hotel->max_price, 0, '', ',') }}</span>

                                                    </div>
                                                    <div class="stars-rating d-flex align-items-center flex-wrap">
                                                        @php
                                                            $rating = $hotel->rating; // Replace this with the actual rating value
                                                            $fullStars = floor($rating);
                                                            $halfStar = $rating - $fullStars >= 0.5;
                                                        @endphp

                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $fullStars)
                                                                <span class="star-icon las la-star active"></span>
                                                            @elseif ($i == $fullStars + 1 && $halfStar)
                                                                <span class="star-icon las la-star-half-alt active"></span>
                                                            @else
                                                                <span class="star-icon las la-star"></span>
                                                            @endif
                                                        @endfor

                                                        <span class="stars-rating__point">{{ $rating }}</span>
                                                        <span class="stars-rating__review">
                                                            <span>{{ 778 }}</span> Reviews
                                                        </span>
                                                    </div>






                                                    <div class="product-item__button d-xl-block d-flex flex-wrap">



                                                        <a
                                                            class="btn btn-default btn-squared color-light btn-outline-light ms-lg-0 ms-0 me-2 mb-lg-10"
                                                            href={{"/hotels/$hotel->id"}}
                                                            >
                                                            Browse Rooms
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>
                    <!-- End: Shop Item -->
                    <div class="row">
                        <div class="col-12">
                            <div class="user-pagination">
                                <div class="d-flex justify-content-md-end justify-content-center mt-1 mb-30">

                                    <nav class="dm-page">
                                        <ul class="dm-pagination d-flex">
                                            <li class="dm-pagination__item">
                                                {!! $hotels->onEachSide(1)->links('pagination::bootstrap-4') !!}
                                            </li>
                                        </ul>
                                    </nav>



                                </div>
                                <!-- End of Pagination-->
                            </div>
                        </div>
                    </div>
                </div><!-- End: .columns-2 -->
            </div>
        </div>
    </div>
    <!-- End: .products -->
@endsection
