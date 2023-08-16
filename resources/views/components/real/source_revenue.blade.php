<div class="col-xxl-6 mb-25">

    <div class="card border-0 px-25 h-100">
        <div class="card-header px-0 border-0">
            <h6>Source Of Revenue Generated</h6>
            <div class="dropdown dropleft">
                {{-- <a href="#" role="button" id="todo12" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="{{ asset('assets/img/svg/more-horizontal.svg') }}" alt="more-horizontal" class="svg">
                </a> --}}
                {{-- <div class="dropdown-menu" aria-labelledby="todo12">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div> --}}
            </div>
        </div>
        <div class="p-0 card-body">
            <div class="revenueSourceChart px-0">
                <div class="parentContainer position-relative">

                    <div class="apexpie ms-md-n50">
                        <div class="apexPieToday"></div>
                    </div>

                </div>
                <div class="chart-content__details">
                    <div class="chart-content__single">
                        <span class="icon color-facebook">
                            <span class="uil uil-user-md"></span>
                        </span>
                        <span class="label">Single Rooms</span>
                        <span class="data">N{{$total_revenue_from_single}}</span>
                    </div>
                    <div class="chart-content__single">
                        <span class="icon color-twitter">
                            <span class="uil uil uil-user-arrows"></span>
                        </span>
                        <span class="label">Double Rooms</span>
                        <span class="data">N{{$total_revenue_from_double}}</span>
                    </div>
                    <div class="chart-content__single">
                        <span class="icon color-secondary">
                            <span class="uil uil uil-hospital"></span>
                        </span>
                        <span class="label">Halls</span>
                        <span class="data">N{{$total_revenue_from_hall}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@section('scripts2')
    <script>
        function pieChart(e, t, o, r = "270") {
            var a = {
                series: t,
                labels: ["Single", "Double", "Halls"],
                colors: ["#8231D3", "#00AAFF", "#5840FF"],
                chart: {
                    type: "pie",
                    group: "social",
                    width: o,
                    height: 270
                },
                legend: {
                    show: !1,
                    position: "bottom",
                    horizontalAlign: "center",
                    floating: !1,
                    fontSize: "15px",
                    fontFamily: "Jost, sans-serif",
                    fontWeight: 400,
                    labels: {
                        colors: "#525768"
                    },
                    markers: {
                        width: 7,
                        height: 7,
                        radius: 20,
                        offsetX: -4
                    },
                    itemMargin: {
                        horizontal: 10,
                        vertical: 10
                    },
                    onItemClick: {
                        toggleDataSeries: !0
                    },
                    onItemHover: {
                        highlightDataSeries: !0
                    },
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            minAngleToShowLabel: void 0
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1399,
                    options: {
                        chart: {
                            width: "100%"
                        }
                    }
                }, ],
            };
            $(e).length > 0 && new ApexCharts(document.querySelector(e), a).render();
        }
        $.ready.then(function() {
            pieChart(".apexPieToday", [
                    {{ $percentage_from_single }},
                    {{ $percentage_from_double }},
                    {{ $percentage_from_hall }}
                ],
                "100%", 270)
        })
    </script>
@endsection
