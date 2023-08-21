@section('title', $title)
@section('description', $description)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="contact-breadcrumb">

                    <div class="breadcrumb-main add-contact justify-content-sm-between ">
                        <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                            <div class="d-flex align-items-center add-contact__title justify-content-center me-sm-25">
                                <h4 class="text-capitalize fw-500 breadcrumb-title">
                                    Staff List
                                </h4>
                                <span class="sub-title ms-sm-25 ps-sm-25"></span>
                            </div>


                        </div>
                        <div class="action-btn">
                            <a href="/admins/add" class="btn px-15 btn-primary">
                                <i class="las la-plus fs-16"></i>Add New
                            </a>


                        </div>
                    </div>

                </div>
                <!-- ends: contact-breadcrumb -->
            </div>
        </div>
        <div class="row contact-card-group">
            @foreach ($admins as $admin)
                <div class="col-xl-3 mb-25">
                    <div class="card contact-card">
                        <div class="card-body text-center pt-30 px-25 pb-0">
                            <div class="card__more-action dropdown dropdown-click">
                                <button class="btn-link border-0 bg-transparent p-0" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('assets/img/svg/more-horizontal.svg') }}" alt="more-horizontal"
                                        class="svg">
                                </button>
                                <div class="dropdown-default dropdown-bottomLeft dropdown-menu-right dropdown-menu">
                                    <a class="dropdown-item" href="#">delete</a>
                                </div>
                            </div>

                            <div class="contact-profile-card text-center">
                                <div class="cp-img d-flex justify-content-center">
                                    <img class="cp-img__main" src="{{ $admin->image }}" alt="ninjadash Contact">
                                </div>
                                <div class="cp-info">
                                    <h6 class="cp-info__title">{{ $admin->name }}</h6>
                                    <span class="cp-info__designation">{{$admin->hotelAdmin->role}}</span>
                                </div>
                            </div>

                            <div class="card-footer mt-20 pt-20 pb-20 px-0 bg-transparent">
                                <ul class="c-info-list">

                                    <li class="c-info-list__item d-flex">
                                        <div class="c-info-item-icon">
                                            <img src="{{ asset('assets/img/svg/mail.svg') }}" alt="mail" class="svg">
                                        </div>
                                        <p class="c-info-item-text">
                                            {{ $admin->email }}
                                        </p>
                                    </li>



                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end: card -->
                </div>
            @endforeach

        </div>
    </div>
@endsection
