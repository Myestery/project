@section('title', $title)
@section('description', $description)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-breadcrumb">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Bookings</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <nav aria-label="breadcrumb">

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="cartPage global-shadow pe-sm-30 ps-sm-30  p-15 py-sm-30 radius-xl w-100 mb-30">
            <div class="row justify-content-center">
                <div class="">
                    <div class="product-cart mb-sm-0 mb-20">
                        <div class="table-responsive">
                            <table id="cart" class="table table-borderless table-hover">
                                <thead>
                                    <tr class="product-cart__header">
                                        <th scope="col">Room</th>
                                        <th scope="col">Check In</th>
                                        <th scope="col">Check Out</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td class="Product-cart-title">
                                                <div class="media  align-items-center">
                                                    <img class="me-3 wh-80 align-self-center radius-xl"
                                                        src="{{ $booking->room->image }}" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">
                                                            <a href="{{ route('rooms.view', $booking->room->id) }}">
                                                                {{ $booking->room->number }}
                                                            </a>
                                                        </h5>
                                                        <div class="d-flex">
                                                            <p>Size:<span>{{ $booking->room->type }}</span></p>
                                                            {{-- <p>color:<span>brown</span></p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="price">{{ $booking->check_in->diffForHumans() }}</td>
                                            <td class="price">{{ $booking->check_out->diffForHumans() }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="product-cart__badge product-cart__badge--success me-2">
                                                        {{ $booking->check_out > now() ? 'Active' : 'Expired' }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center subtotal">
                                                N{{ number_format($booking->total_price, 0, '', ',') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="user-pagination">
                        <div class="d-flex justify-content-md-end justify-content-center mt-1 mb-30">

                            <nav class="dm-page">
                                <ul class="dm-pagination d-flex">
                                    <li class="dm-pagination__item">
                                        {!! $bookings->onEachSide(1)->links('pagination::bootstrap-4') !!}
                                    </li>
                                </ul>
                            </nav>



                        </div>
                        <!-- End of Pagination-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
