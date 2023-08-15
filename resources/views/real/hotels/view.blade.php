@section('title', $title)
@section('description', $description)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-breadcrumb">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">{{ 'Hotel Details' }}</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <nav aria-label="breadcrumb">
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products mb-10">
        <div class="container-fluid">
            <div class="card product-details h-100 border-0">
                <div class="product-item d-flex p-sm-50 p-20">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="product-item__image">
                                <div class="wrap-gallery-article carousel slide carousel-fade" id="carouselExampleCaptions"
                                    data-bs-ride="carousel">
                                    <div>
                                        <div class="carousel-inner">
                                            @foreach ($hotel->images as $index => $image)
                                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                    <img class="img-fluid d-flex bg-opacity-primary "
                                                        src="{{ $image }}" alt="Card image cap" title="" />
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <ul class="reset-ul d-flex flex-wrap list-thumb-gallery">
                                            @foreach ($hotel->images as $index => $image)
                                                <li>
                                                    <a href="#" class="thumbnail {{ $index == 0 ? 'active' : '' }}"
                                                        data-bs-target="#carouselExampleCaptions"
                                                        data-bs-slide-to="{{ $index }}"
                                                        aria-label="Slide {{ $index + 1 }}">
                                                        <img class="img-fluid d-flex" src="{{ $image }}"
                                                            alt="">
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-7">
                            <div class=" b-normal-b mb-25 pb-sm-35 pb-15 mt-lg-0 mt-15">
                                <div class="product-item__body">
                                    <div class="product-item__title">
                                        <a href="#">
                                            <h1 class="card-title">
                                                {{ $hotel->name }}
                                            </h1>
                                        </a>
                                    </div>
                                    <div class="product-item__content text-capitalize">
                                        <div class="stars-rating d-flex align-items-center">
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
                                        <span
                                            class="product-desc-price ">N{{ number_format($hotel->min_price, 0, '', ',') }}
                                            - N{{ number_format($hotel->max_price, 0, '', ',') }}</span>

                                        <p class=" product-deatils-pera"> {{ $hotel->description }}</p>
                                        <div class="product-details__availability">
                                            <div class="title">
                                                <p>Available:</p>
                                                <span class="stock">In stock</span>
                                            </div>
                                            <div class="title">
                                                <p>Shipping:</p>
                                                <span class="free"> Free</span>
                                            </div>
                                        </div>
                                        <div class="quantity product-quantity flex-wrap">
                                            {{-- <div class="me-15 d-flex align-items-center flex-wrap">
                                                <p class="fs-14 fw-500 color-dark">Quantity:</p>
                                                <input type="button" value="-" class="qty-minus bttn bttn-left wh-36">
                                                <input type="number" value="1" class="qty qh-36 input">
                                                <input type="button" value="+" class="qty-plus bttn bttn-right wh-36">
                                            </div> --}}
                                            <span class="fs-13 fw-400 color-light my-sm-0 my-10">540 pieces
                                                available</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details__availability">
                                <div class="title">
                                    <p>Address:</p>
                                    <span class="free">{{ $hotel->address }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4 class="text-capitalize breadcrumb-title my-10">Rooms in the Hotel</h4>
    <div class="row contact-card-group">
        @foreach ($rooms as $room)
            <div class="col-xl-3 mb-25">
                <div class="card contact-card">
                    <div class="card-body text-center pt-30 px-25 pb-0">
                        <div class="card__more-action dropdown dropdown-click">
                            <button class="btn-link border-0 bg-transparent p-0" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{-- <img src="{{ $room->image }}" alt="more-horizontal" class="svg"> --}}
                            </button>
                            <div class="dropdown-default dropdown-bottomLeft dropdown-menu-right dropdown-menu">
                                <a class="dropdown-item" href="#">view</a>
                                <a class="dropdown-item" href="#">edit</a>
                                <a class="dropdown-item" href="#">delete</a>
                            </div>
                        </div>

                        <div class="contact-profile-card text-center">
                            <div class="cp-img d-flex justify-content-center">
                                <img class="cp-img__main" src="{{ $room->image }}" alt="ninjadash Contact">
                            </div>
                            <div class="cp-info">
                                <h6 class="cp-info__title">
                                    <span class="product-desc-price ">N{{ number_format($room->price, 0, '', ',') }}
                                    </span>

                                </h6>
                                <span class="cp-info__designation"> {{ $room->type }}</span>

                            </div>
                        </div>

                        <div class="card-footer mt-20 pt-20 pb-20 px-0 bg-transparent">
                            <ul class="c-info-list">

                                <li class="c-info-list__item d-flex">
                                    <div class="c-info-item-icon">
                                        <img src="{{ asset('assets/img/svg/code.svg') }}" alt="phone" class="svg">

                                    </div>
                                    <p class="c-info-item-text">
                                        <span class="cp-info__designation">{{ $room->number }}</span>
                                    </p>
                                </li>


                                <li class="c-info-list__item d-flex">
                                    <div class="c-info-item-icon">
                                        <img src="{{ asset('assets/img/svg/users.svg') }}" alt="mail" class="svg">
                                    </div>
                                    <p class="c-info-item-text">
                                        {{ $room->capacity }}
                                    </p>
                                </li>


                                <li class="c-info-list__item d-flex">
                                    <div class="c-info-item-icon">
                                        <img src="{{ asset('assets/img/svg/map-pin.svg') }}" alt="map-pin"
                                            class="svg">
                                    </div>
                                    <p class="c-info-item-text">
                                        {{ $room->description }}
                                    </p>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end: card -->
            </div>
        @endforeach
        <small class="text-capitalize breadcrumb-title my-10">See more</small>
        <li class="dm-pagination__item my-10">
            {!! $rooms->onEachSide(1)->links('pagination::bootstrap-4') !!}
        </li>
    </div>
@endsection
