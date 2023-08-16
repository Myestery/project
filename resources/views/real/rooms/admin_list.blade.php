@section('title', $title)
@section('description', $description)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-breadcrumb">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Rooms</h4>
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
                                <form action="/admin/rooms" class="order-search__form">
                                    <img src="{{ asset('assets/img/svg/search.svg') }}" alt="search" class="svg">
                                    <input class="form-control me-sm-2 border-0 box-shadow-none" type="search"
                                        name="search" placeholder="Filter by room number" aria-label="Search" value="{{$search}}">
                                </form>
                            </div><!-- End: .project-search -->
                            <div class="project-category d-flex align-items-center ms-md-30 mt-xxl-10 mt-15">
                                <p class="fs-14 color-gray text-capitalize mb-10 mb-md-0  me-10">Status :</p>
                                <div class="project-tap order-project-tap global-shadow">
                                    <ul class="nav px-1" id="ap-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="ap-overview-tab" data-bs-toggle="pill"
                                                href="#ap-overview" role="tab" aria-selected="true">All</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="timeline-tab" data-bs-toggle="pill" href="#timeline"
                                                role="tab" aria-selected="false">Available</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="activity-tab" data-bs-toggle="pill" href="#activity"
                                                role="tab" aria-selected="false">Booked</a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- End: .project-category -->
                        </div><!-- End: .d-flex -->
                        <div class="content-center mt-10">
                            <div class="button-group m-0 mt-xl-0 mt-sm-10 order-button-group">
                                <button type="button" class="btn btn-sm btn-primary me-0 radius-md">
                                    <i class="la la-plus"></i> Add Room</button>
                            </div>
                        </div><!-- End: .content-center -->
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
                                                                    Room number

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
                                                <span class="userDatatable-title float-end">Check Out Date</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title float-end">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $room)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-3 d-flex align-items-center">
                                                            <div class="checkbox-group-wrapper">
                                                                <div class="checkbox-group d-flex">
                                                                    <div
                                                                        class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                        <input class="checkbox" type="checkbox"
                                                                            id="check-grp-12">
                                                                        <label for="check-grp-12"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="orderDatatable-title">
                                                            <p class="d-block mb-0">
                                                                {{ $room->number }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($room->is_available)
                                                        <div class="orderDatatable-status d-inline-block">
                                                            <span
                                                                class="order-bg-opacity-success  text-success rounded-pill active">Available</span>
                                                        </div>
                                                    @else
                                                        <div class="orderDatatable-status d-inline-block">
                                                            <span
                                                                class="order-bg-opacity-warning  text-warning rounded-pill active">Booked</span>
                                                        </div>
                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="orderDatatable-title">
                                                        N{{ $room->price }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="orderDatatable-title">
                                                        {{ $room->type }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="orderDatatable-title float-end">
                                                        @if (!$room->is_available)
                                                            {{ $room->check_out_date->diffForHumans() }}
                                                        @else
                                                            -----
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    <ul class="orderDatatable_actions mb-0 d-flex flex-wrap float-end">
                                                        <li>
                                                            <a href="#" class="view">
                                                                <i class="uil uil-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="edit">
                                                                <i class="uil uil-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="remove">
                                                                <i class="uil uil-trash-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- Table Responsive End -->
                        </div>
                        <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
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
                                                                    Room number

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
                                                <span class="userDatatable-title float-end">Check Out Date</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title float-end">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($available_rooms as $room)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-3 d-flex align-items-center">
                                                            <div class="checkbox-group-wrapper">
                                                                <div class="checkbox-group d-flex">
                                                                    <div
                                                                        class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                        <input class="checkbox" type="checkbox"
                                                                            id="check-grp-12">
                                                                        <label for="check-grp-12"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="orderDatatable-title">
                                                            <p class="d-block mb-0">
                                                                {{ $room->number }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($room->is_available)
                                                        <div class="orderDatatable-status d-inline-block">
                                                            <span
                                                                class="order-bg-opacity-success  text-success rounded-pill active">Available</span>
                                                        </div>
                                                    @else
                                                        <div class="orderDatatable-status d-inline-block">
                                                            <span
                                                                class="order-bg-opacity-warning  text-warning rounded-pill active">Booked</span>
                                                        </div>
                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="orderDatatable-title">
                                                        N{{ $room->price }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="orderDatatable-title">
                                                        {{ $room->type }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="orderDatatable-title float-end">
                                                        @if (!$room->is_available)
                                                            {{ $room->check_out_date->diffForHumans() }}
                                                        @else
                                                            -----
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    <ul class="orderDatatable_actions mb-0 d-flex flex-wrap float-end">
                                                        <li>
                                                            <a href="#" class="view">
                                                                <i class="uil uil-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="edit">
                                                                <i class="uil uil-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="remove">
                                                                <i class="uil uil-trash-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- Table Responsive End -->
                        </div>
                        <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
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
                                                                    Room number

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
                                                <span class="userDatatable-title float-end">Check Out Date</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title float-end">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($booked_rooms as $room)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-3 d-flex align-items-center">
                                                            <div class="checkbox-group-wrapper">
                                                                <div class="checkbox-group d-flex">
                                                                    <div
                                                                        class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                        <input class="checkbox" type="checkbox"
                                                                            id="check-grp-12">
                                                                        <label for="check-grp-12"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="orderDatatable-title">
                                                            <p class="d-block mb-0">
                                                                {{ $room->number }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($room->is_available)
                                                        <div class="orderDatatable-status d-inline-block">
                                                            <span
                                                                class="order-bg-opacity-success  text-success rounded-pill active">Available</span>
                                                        </div>
                                                    @else
                                                        <div class="orderDatatable-status d-inline-block">
                                                            <span
                                                                class="order-bg-opacity-warning  text-warning rounded-pill active">Booked</span>
                                                        </div>
                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="orderDatatable-title">
                                                        N{{ $room->price }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="orderDatatable-title">
                                                        {{ $room->type }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="orderDatatable-title float-end">
                                                        @if (!$room->is_available)
                                                            {{ $room->check_out_date->diffForHumans() }}
                                                        @else
                                                            -----
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    <ul class="orderDatatable_actions mb-0 d-flex flex-wrap float-end">
                                                        <li>
                                                            <a href="#" class="view">
                                                                <i class="uil uil-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="edit">
                                                                <i class="uil uil-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="remove">
                                                                <i class="uil uil-trash-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
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
