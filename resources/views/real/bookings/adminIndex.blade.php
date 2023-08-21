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
    <div class="action-btn">
        <a href="#" class="btn px-15 btn-primary" data-bs-toggle="modal" data-bs-target="#add-contact">
            <i class="las la-plus fs-16"></i>Add New
        </a>
    </div>
    <div class="modal fade add-contact" id="add-contact" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content radius-xl">
                <div class="modal-header">
                    <h6 class="modal-title fw-500" id="staticBackdropLabel">Add Manual Booking</h6>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="uil uil-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="add-new-contact">
                        <form action="/bookings/create" method="POST">
                            <div class="form-group mb-20">
                                <label>Room:</label>
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="room_id"
                                    id="user">
                                    <option disabled>Choose Room</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->number }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-20">
                                <label>Check In date:</label>
                                <input type="date" name="checkIn" class="form-control form-control-lg" placeholder="Date"
                                    required min="{{ now()->format('Y-m-d') }}">
                            </div>

                            <div class="form-group mb-20">
                                <label>Check Out date:</label>
                                <input type="date" name="checkOut" class="form-control form-control-lg"
                                    placeholder="Date" required min="{{ now()->format('Y-m-d') }}">
                            </div>
                            <div class="form-group mb-20">
                                <label>Customer:</label>
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="user_id"
                                    id="user">
                                    <option disabled>Choose Customer</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @csrf
                            <div class="form-group mb-20">
                                <label>Reference:</label>
                                <input type="text" name="reference" class="form-control form-control-lg"
                                    placeholder="Reference" required>
                            </div>

                            <div class="button-group d-flex pt-20">
                                <button type="submit" class="btn btn-primary btn-default btn-squared "> Add Booking
                                </button>
                            </div>
                        </form>
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
                                                            <a href="{{ route('admin.invoice', $booking->id) }}">
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
                                            <td class="price">{{ $booking->check_in->toDayDateTimeString() }}</td>
                                            <td class="price">{{ $booking->check_out->toDayDateTimeString() }}</td>
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
