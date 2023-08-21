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
                                        name="search" placeholder="Filter by room number" aria-label="Search"
                                        value="{{ $search }}">
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
                            <div class="action-btn">
                                <a href="#" class="btn px-15 btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#add-contact">
                                    <i class="las la-plus fs-16"></i>Add New
                                </a>
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="orderDatatable-title">
                                                            <a href="/rooms/{{ $room->id }}" class="d-block mb-0">
                                                                {{ $room->number }}
                                                            </a>
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

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="orderDatatable-title">
                                                            <a href="/rooms/{{ $room->id }}" class="d-block mb-0">
                                                                {{ $room->number }}
                                                            </a>
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

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="orderDatatable-title">
                                                            <a href="/rooms/{{ $room->id }}" class="d-block mb-0">
                                                                {{ $room->number }}
                                                            </a>
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
        {{-- add room moda; --}}
        <div class="modal fade add-contact" id="add-contact" role="dialog" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content radius-xl">
                    <div class="modal-header">
                        <h6 class="modal-title fw-500" id="staticBackdropLabel">Add Room</h6>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="uil uil-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="add-new-contact">
                            <form action="/admin/rooms/create" method="POST">
                                @csrf
                                <div class="form-group mb-20">

                                    <div class="account-profile d-flex align-items-center mb-4 ">
                                        <div class="ap-img pro_img_wrapper">
                                            <input id="profile-picture" type="file" accept="image/*" name="image"
                                                class="d-none image-upload-field"
                                                data-preview-element="profile-picture-preview">
                                            <!-- Profile picture image-->
                                            <label for="profile-picture">
                                                <img src="{{ asset('assets/img/svg/user.svg') }}" alt="user"
                                                    class="profile-picture-preview ap-img__main rounded-circle wh-120 bg-lighter d-flex">

                                                <span title="Pick an image" id="remove_pro_pic"
                                                    class="cross clear-input-file-btn" data-input-has-file="0"
                                                    data-pick-title="Pick an image"
                                                    data-pick-icon="{{ asset('assets/img/svg/camera-white.svg') }}"
                                                    data-clear-title="Remove"
                                                    data-clear-icon="{{ asset('assets/img/svg/close-white.svg') }}"
                                                    data-input-element-id="profile-picture"
                                                    data-preview-element="profile-picture-preview"
                                                    data-default-preview-image="{{ asset('assets/img/svg/user.svg') }}">
                                                    <img src="{{ asset('assets/img/svg/camera-white.svg') }}"
                                                        alt="camera">
                                                </span>
                                            </label>
                                        </div>
                                        <div class="account-profile__title">
                                            <h6 class="fs-15 ms-20 fw-500 text-capitalize">Room photo</h6>
                                        </div>
                                    </div>


                                    <label>Room Number:</label>
                                    <input type="text" name="number" class="form-control form-control-lg"
                                        placeholder="number" value="R-" required>
                                </div>

                                <div class="form-group mb-20">
                                    <label>Capacity</label>
                                    <input type="number" name="capacity" class="form-control form-control-lg"
                                        placeholder="text" required min="{{ now()->format('Y-m-d') }}">
                                </div>

                                <div class="form-group mb-20">
                                    <label>Type</label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="type"
                                        id="user" required>
                                        <option disabled>Choose Customer</option>
                                        <option value="Single">Single
                                        </option>
                                        <option value="Double">Double
                                        </option>
                                        <option value="Hall">Hall
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                </div>
                                <div class="form-group mb-20">
                                    <label>Description:</label>
                                    <input type="text" name="description" class="form-control form-control-lg"
                                        placeholder="A good Room" value="" required>
                                </div>

                                <div class="form-group mb-20">
                                    <label>Price</label>
                                    <input type="number" name="price" class="form-control form-control-lg"
                                        placeholder="5000" required>
                                </div>

                                <div class="button-group d-flex pt-20">
                                    <button type="submit" class="btn btn-primary btn-default btn-squared "> Add Room
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
