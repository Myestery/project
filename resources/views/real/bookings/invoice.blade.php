@section('title', $title)
@section('description', $description)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-breadcrumb">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Invoice for {{ $booking->room->number }}</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="payment-invoice global-shadow radius-xl w-100 mb-30">
                    <div class="payment-invoice__body">
                        <div class="payment-invoice-address d-flex justify-content-sm-between">
                            <div class="payment-invoice-logo">
                                <a href="index.html">
                                    <img class="svg dark" src="{{ asset('assets/img/logo-dark.svg') }}" alt="">
                                    <img class="svg light" src="{{ asset('assets/img/logo-white.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="payment-invoice-address__area">
                                <address>{{ $booking->hotel->name }}<br> {{ $booking->hotel->address }}<br>
                                    Transaction.
                                    Id : {{ $booking->transaction->flw_transaction_id }}</address>
                            </div>
                        </div><!-- End: .payment-invoice-address -->
                        <div class="payment-invoice-qr d-flex justify-content-between mb-40 px-xl-50 px-30 py-sm-30 py-20 ">
                            <div class="d-flex justify-content-center mb-lg-0 mb-25">
                                <div class="payment-invoice-qr__number">
                                    <div class="display-3">
                                        Invoice
                                    </div>
                                    <p>No : <span>#{{ $booking->transaction->payment_reference }}</span></p>
                                    <p>Date : <span>{{ $booking->transaction->created_at }}</span></p>
                                </div>
                            </div><!-- End: .d-flex -->
                            <div class="d-flex justify-content-center mb-lg-0 mb-25">
                                <div class="payment-invoice-qr__code bg-white radius-xl p-20">
                                    <img src="{{ asset('assets/img/qr.png') }}" alt="qr">
                                    <p>{{ $booking->transaction->payment_reference }}</p>
                                </div>
                            </div><!-- End: .d-flex -->
                            <div class="d-flex justify-content-center">
                                <div class="payment-invoice-qr__address">
                                    <p>Invoice To:</p>
                                    <span>{{ auth()->user()->name }}</span><br>
                                    {{-- <span>795 Folsom Ave, Suite 600</span><br>
                                    <span>San Francisco, CA 94107, USA</span> --}}
                                </div>
                            </div><!-- End: .d-flex -->
                        </div><!-- End: .payment-invoice-qr -->
                        <div class="payment-invoice-table">
                            <div class="table-responsive">
                                <table id="cart" class="table table-borderless">
                                    <thead>
                                        <tr class="product-cart__header">
                                            <th scope="col">#</th>
                                            <th scope="col">Room</th>
                                            <th scope="col">Check in</th>
                                            <th scope="col">Check out</th>
                                            <th scope="col" class="text-end">Price Per Night</th>
                                            <th scope="col" class="text-end">Days</th>
                                            <th scope="col" class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td class="Product-cart-title">
                                                <div class="media  align-items-center">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">
                                                            <a href="{{ route('rooms.view', $booking->room->id) }}">
                                                                {{ $booking->room->number }}
                                                            </a>
                                                        </h5>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="unit text-end">
                                                {{ $booking->check_in->toDayDateTimeString() }}
                                            </td>
                                            <td class="unit text-end">
                                                {{ $booking->check_out->toDayDateTimeString() }}
                                            </td>
                                            <td class="unit text-end">
                                                N {{ number_format($booking->room->price, 2) }}
                                            </td>
                                            <td class="invoice-quantity text-end">
                                                {{ $booking->days }}
                                            </td>
                                            <td class="text-end order">
                                                N {{ number_format($booking->room->price * $booking->days, 2) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="order-summery float-right border-0   ">

                                                <div class="total-money mt-2 text-end">
                                                    <h6>Total :</h6>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="total-order float-right text-end fs-14 fw-500">

                                                    <h5 class="text-primary">
                                                        N {{ number_format($booking->room->price * $booking->days, 2) }}
                                                    </h5>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-invoice__btn mt-xxl-50 pt-xxl-30">
                                <button type="button" class="btn border rounded-pill bg-normal text-gray px-25 print-btn">
                                    <img src="{{ asset('assets/img/svg/printer.svg') }}" alt="printer"
                                        class="svg">print</button>
                            </div>
                        </div><!-- End: .payment-invoice-table -->
                    </div><!-- End: .payment-invoice__body -->
                </div><!-- End: .payment-invoice -->
            </div><!-- End: .col -->
        </div>
    </div>
@endsection
