@section('title', $title)
@section('description', $description)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-breadcrumb">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Transactions</h4>
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
                <div class="userDatatable orderDatatable global-shadow py-30 px-sm-30 px-20 radius-xl w-100 mb-30">
                    <div class="project-top-wrapper d-flex justify-content-between flex-wrap mb-25 mt-n10">
                        <div class="d-flex align-items-center flex-wrap justify-content-center">
                            <div class="project-search order-search  global-shadow mt-10">

                            </div><!-- End: .project-search -->
                        </div><!-- End: .d-flex -->

                    </div><!-- End: .project-top-wrapper -->
                    <div class="tab-content" id="ap-tabContent">
                        <div class="tab-pane fade show active" id="ap-overview" role="tabpanel"
                            aria-labelledby="ap-overview-tab">
                            <!-- Start Table Responsive -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover table-borderless border-0">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            <th>
                                                <div class="d-flex align-items-center">

                                                    <div class="bd-example-indeterminate">
                                                        <div class="checkbox-theme-default custom-checkbox  check-all">
                                                            <input class="checkbox" type="checkbox" id="check-23e">
                                                            <label for="check-23e">
                                                                <span class="checkbox-text ms-3">
                                                                    Transaction Ref
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Status</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Amount</span>
                                            </th>

                                            <th>
                                                <span class="userDatatable-title">Type</span>
                                            </th>

                                            <th>
                                                <span class="userDatatable-title float-end">Room</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $room)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-3 d-flex align-items-center">
                                                            <div class="checkbox-group-wrapper">
                                                                <div class="checkbox-group d-flex">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="orderDatatable-title">

                                                            {{ $room->payment_reference }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($room->status)
                                                        <div class="orderDatatable-status d-inline-block">
                                                            <span
                                                                class="order-bg-opacity-success  text-success rounded-pill active">Completed</span>
                                                        </div>
                                                    @else
                                                        <div class="orderDatatable-status d-inline-block">
                                                            <span
                                                                class="order-bg-opacity-warning  text-warning rounded-pill active">Pending</span>
                                                        </div>
                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="orderDatatable-title">
                                                        N{{ $room->amount }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="orderDatatable-title">
                                                        {{$isHotel? 'Credit' : 'Debit'}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="orderDatatable-title float-end">
                                                        <a href="/rooms/{{$room->room->id}}" class="d-block mb-0">
                                                            {{ $room->room->number }}
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- Table Responsive End -->
                        </div>

                    </div>
                </div><!-- End: .userDatatable -->
            </div><!-- End: .col -->
        </div>
    </div>
@endsection
