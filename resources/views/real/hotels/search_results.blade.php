@section('title', $title)
@section('description', $description)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">{{ trans('menu.search-menu-title') }}</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">

                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="search-result global-shadow rounded-pill bg-white">
                    <form action="/search" class="d-flex align-items-center justify-content-between">
                        <div class="border-right d-flex align-items-center w-100  ps-25 pe-sm-25 pe-0 py-1">
                            <img src="{{ asset('assets/img/svg/search.svg') }}" alt="search" class="svg">
                            <input class="form-control border-0 box-shadow-none" type="search"
                                placeholder="Type and search" name="search" aria-label="Search"
                                value="{{ $search }}">
                        </div>
                        <button type="submit" class="border-0 bg-transparent px-25">search</button>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="search-content bg-white radius-xl d-flex mb-50">
                            <div class="card  border-0 px-sm-30 px-20">
                                <div
                                    class="card-header flex-1 d-flex align-items-center flex-wrap justify-content-between border-bottom-0 px-0">
                                    <p class="keyword-searching text-dark py-10">{{ count($hotels) }} <span
                                            class="color-light fw-400">results found
                                            for</span> {{ $search }}</p>
                                    <p class="mb-0 fs-14 color-light fw-400 ">Showing {{ count($hotels) }} results</p>
                                </div>
                                <div class="card-body border-bottom border-top px-0 pb-0 pt-25">
                                    <div class="search-content__keyResult">
                                        @foreach ($hotels as $hotel)
                                            <div class="mb-30">
                                                <a href="{{ route('hotels.view', $hotel->id) }}">
                                                    <h6 class="fw-500">
                                                        {{ $hotel->name }}
                                                    </h6>
                                                </a>
                                                <p class="mb-0">
                                                    {{ $hotel->address }}
                                                </p>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="card-footer border-0 pt-30 pb-40 px-0 bg-transparent">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
