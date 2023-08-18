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
                                        placeholder="eg Hotel Trivago" aria-label="Search" name="search" value="{{$search}}">
                                </div>
                                <button class="btn btn-primary"><img src="{{ asset('assets/img/svg/search.svg') }}"
                                        alt="search" type="submit" class="svg">search</button>
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
                        <form action="/" class="category_sidebar">
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
                                                <input type="hidden" name="min_price" value="{{ $min_price }}" />
                                                <input type="hidden" name="max_price" value="{{ $max_price }}" />
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
                                    <h6>States</h6>
                                </div>
                                <!-- Title -->
                                <!-- Body -->
                                <div class="card border-0 shadow-none multi-collapse mt-10 collapse show"
                                    id="multiCollapseExample3">
                                    <div class="product-brands limit-list-item">
                                        <ul>
                                            @foreach ($states as $state)
                                                <li>

                                                    <div class="checkbox-theme-default custom-checkbox ">
                                                        <input class="checkbox" type="checkbox"
                                                            id="check-{{ $state->id }}" name="states[]"
                                                            value="{{ $state->id }}"
                                                            {{ in_array($state->id, $selected_states) ? 'checked' : '' }}>
                                                        <label for="check-{{ $state->id }}">
                                                            <span class="checkbox-text">
                                                                {{ $state->name }}

                                                                <span
                                                                    class="item-numbers">{{ $state->hotels_count }}</span>

                                                            </span>
                                                        </label>
                                                    </div>


                                                </li>
                                            @endforeach

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
                                                    <input class="checkbox" type="checkbox" id="product-1" name="ratings[]"
                                                        value="5"
                                                        {{ in_array(5, $selected_ratings) ? 'checked' : '' }}>
                                                    <label for="product-1">

                                                        <span class="stars-rating d-flex align-items-center">
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="checkbox-text">
                                                                <span class="item-numbers">
                                                                    {{ $hotels_with_5 }}
                                                                </span>
                                                            </span>
                                                        </span>

                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="product-3"
                                                        name="ratings[]" value="4"
                                                        {{ in_array(4, $selected_ratings) ? 'checked' : '' }}>
                                                    <label for="product-3">

                                                        <span class="stars-rating d-flex align-items-center">
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="checkbox-text">
                                                                and up
                                                                <span class="item-numbers">
                                                                    {{ $hotels_above_4 }}
                                                                </span>
                                                            </span>
                                                        </span>

                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="product-4"
                                                        name="ratings[]" value="3"
                                                        {{ in_array(3, $selected_ratings) ? 'checked' : '' }}>
                                                    <label for="product-4">

                                                        <span class="stars-rating d-flex align-items-center">
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="checkbox-text">
                                                                and up
                                                                <span class="item-numbers">
                                                                    {{ $hotels_above_3 }}
                                                                </span>
                                                            </span>
                                                        </span>

                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="product-5"
                                                        name="ratings[]" value="2"
                                                        {{ in_array(2, $selected_ratings) ? 'checked' : '' }}>
                                                    <label for="product-5">

                                                        <span class="stars-rating d-flex align-items-center">
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="checkbox-text">
                                                                and up
                                                                <span class="item-numbers">
                                                                    {{ $hotels_above_2 }}
                                                                </span>
                                                            </span>
                                                        </span>

                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="product-6"
                                                        name="ratings[]" value="1"
                                                        {{ in_array(1, $selected_ratings) ? 'checked' : 'unchecked' }}>
                                                    <label for="product-6">

                                                        <span class="stars-rating d-flex align-items-center">
                                                            <span class="star-icon las la-star active"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="star-icon las la-star inactive"></span>
                                                            <span class="checkbox-text">
                                                                and up
                                                                <span class="item-numbers">
                                                                    {{ $hotels_above_1 }}
                                                                </span>
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

                            <button type="submit" class="btn btn-primary btn-default btn-squared border-0 mt-10">Filter
                            </button>
                            <!-- End: Aside -->
                        </form>

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
                                                    <p class="mb-0">{{ $hotel->address }}
                                                    </p>
                                                    <p class="mb-0">{{ $hotel->state->name }}
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



                                                        <a class="btn btn-default btn-squared color-light btn-outline-light ms-lg-0 ms-0 me-2 mb-lg-10"
                                                            href={{ "/hotels/$hotel->id" }}>
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

                        @if (count($hotels) == 0)
                            <div class="error-page text-center">
                                <img src="{{ asset('assets/img/svg/404.svg') }}" alt="404" class="svg">
                                <div class="error-page__title">404</div>
                                <h5 class="fw-500">No Hotels matched your search.</h5>

                            </div>
                        @endif

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
@section('scripts')
    <script>
        $(".price-slider").slider({
            range: !0,
            min: 0,
            max: 10000,
            values: [{{ $min_price }}, {{ $max_price }}],
            slide: function(t, s) {
                $(".price-value").text(
                    "N" + s.values[0] + " - N" + s.values[1]
                )
                $(".job-value").text(s.values[0] + " miles"),
                    $(".job-value2").text(s.values[1] + " miles");
                $("input[name='min_price']").val(s.values[0])
                $("input[name='max_price']").val(s.values[1])
            },
        });
        $(".price-value").text(
            "N" +
            $(".price-slider").slider("values", 0) +
            " - N" +
            $(".price-slider").slider("values", 1)
        );
    </script>
@endsection
