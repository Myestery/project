@section('title', $title)
@section('description', $description)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="profile-content mb-50">
            <div class="row">
                <div class="col-lg-12">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">
                            Room {{ $room->number }}
                        </h4>

                    </div>

                </div>

                <div class="col-xxl-3 col-md-4">
                    <aside class="profile-sider">
                        <!-- Profile Acoount -->
                        <div class="card mb-25">
                            <div class="card-body text-center pt-sm-30 pb-sm-0  px-25 pb-0">

                                <div class="account-profile">
                                    <div class="ap-img w-100 d-flex justify-content-center">
                                        <!-- Profile picture image-->
                                        <img class="ap-img__main rounded-circle mb-3  wh-120 d-flex bg-opacity-primary"
                                            src="{{ $hotel->images[0] }}" alt="profile">
                                    </div>
                                    <div class="ap-nameAddress pb-3 pt-1">
                                        <h5 class="ap-nameAddress__title">{{ $hotel->name }}</h5>
                                        {{-- <p class="ap-nameAddress__subTitle fs-14 m-0">UI/UX Designer</p> --}}
                                        <p class="ap-nameAddress__subTitle fs-14 m-0">
                                            <img src="{{ asset('assets/img/svg/map-pin.svg') }}" alt="map-pin"
                                                class="svg">{{ $hotel->address }}
                                        </p>
                                    </div>
                                </div>

                                <div class="card-footer mt-20 pt-20 pb-20 px-0 bg-transparent">
                                    <div class="profile-overview d-flex justify-content-between flex-wrap">
                                        <div class="po-details">
                                            <h6 class="po-details__title pb-1">
                                                N{{ number_format($room->price, 2) }}
                                            </h6>
                                            <span class="po-details__sTitle">Price</span>
                                        </div>
                                        <div class="po-details">
                                            <h6 class="po-details__title pb-1">{{ $room->capacity }}</h6>
                                            <span class="po-details__sTitle">Capacity</span>
                                        </div>
                                        <div class="po-details">
                                            <h6 class="po-details__title pb-1">
                                                @if ($room->is_available)
                                                    <span class="badge bg-success">Available</span>
                                                @else
                                                    <span class="badge bg-danger">Booked</span>
                                                @endif
                                            </h6>
                                            <span class="po-details__sTitle">Availability</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Profile Acoount End -->

                        <!-- Profile User Bio -->
                        <div class="card mb-25">
                            <div class="user-bio border-bottom">
                                <div class="card-header border-bottom-0 pt-sm-30 pb-sm-0  px-md-25 px-3">
                                    <div class="profile-header-title">
                                        TYPE
                                    </div>
                                </div>
                                <div class="card-body pt-md-1 pt-0">
                                    <div class="user-bio__content">
                                        <p class="m-0">
                                            {{ $room->type }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="user-bio border-bottom">
                                <div class="card-header border-bottom-0 pt-sm-30 pb-sm-0  px-md-25 px-3">
                                    <div class="profile-header-title">
                                        DESCRIPTION
                                    </div>
                                </div>
                                <div class="card-body pt-md-1 pt-0">
                                    <div class="user-bio__content">
                                        <p class="m-0">
                                            {{ $room->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="user-skils border-bottom">
                                <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                    <div class="profile-header-title">
                                        FEATURES
                                    </div>
                                </div>
                                <div class="card-body pt-md-1 pt-0">
                                    <ul class="user-skils-parent">
                                        <li class="user-skils-parent__item">
                                            <a href="#">SHOWER</a>
                                        </li>
                                        <li class="user-skils-parent__item">
                                            <a href="#">AIR CONDITIONER</a>
                                        </li>
                                        <li class="user-skils-parent__item">
                                            <a href="#">
                                                BIG MIRROR
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Profile User Bio End -->
                    </aside>
                </div>


                <div class="col-xxl-9 col-md-8">
                    <!-- Tab Menu -->
                    <div class="ap-tab ap-tab-header">
                        <div class="ap-tab-header__img">
                            <img src="{{ $room->image }}" alt="ap-header" class="img-fluid w-100">
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="modal-content" style="box-shadow: 0ch">
                            <div class="modal-header">
                                <h6 class="modal-title">Book this Room</h6>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <img src="{{ asset('assets/img/svg/x.svg') }}" alt="x" class="svg"></button>
                            </div>
                            <div class="modal-body">
                                <div class="c-event-form">
                                    <form method="POST" action="/rooms/{{$room->id}}/pay">
                                        @csrf
                                        <div class="dm-date-ranger position-relative d-flex align-items-center">
                                            <div class="form-group mb-0">
                                                <input type="text" name="date-range-from"
                                                    class="form-control form-control-default" id="date-from-2"
                                                    placeholder="Start">
                                            </div>
                                            <span class="divider">-</span>
                                            <div class="form-group mb-0">
                                                <input type="text" name="date-range-to"
                                                    class="form-control form-control-default" id="date-to-2"
                                                    placeholder="End">
                                            </div>
                                            <a class="date-picker-icon" href="#"><img
                                                    src="{{ asset('assets/img/svg/calendar.svg') }}" alt="calendar"
                                                    class="svg"></a>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="col-xxl-9 col-xl-5 col-md-6 col-sm-8">

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let bookedDays = @json($booked_dates);
        let from = $('input[name="date-range-from"]')
            .datepicker({
                defaultDate: "+1w",
                changeMonth: !0,
                numberOfMonths: 2,
                onSelect: function() {
                    e("#ui-datepicker-div").addClass("testX");
                },
                beforeShowDay: function(date) {
                    // dont allow past dates and booked days
                    return [date >= new Date() && bookedDays.indexOf(date.toISOString().slice(0, 10)) == -1]
                },
            })
            .on("change", function() {
                to.datepicker("option", "minDate", t(this));
            });
        let to = $('input[name="date-range-to"]')
            .datepicker({
                defaultDate: "+1w",
                changeMonth: !0,
                numberOfMonths: 2,
                beforeShowDay: function(date) {
                    // dont allow past dates and booked days
                    return [date >= new Date() && bookedDays.indexOf(date.toISOString().slice(0, 10)) == -1]
                },
            })
            .on("change", function() {
                from.datepicker("option", "maxDate", t(this));
            });
    </script>
@endsection
