<div class="col-xxl-6 mb-25">
    <div class="card revenueChartTwo border-0">
        <div class="card-header border-0">
            <h6>Sales Revenue</h6>
            <div class="card-extra">
                <ul class="card-tab-links nav-tabs nav" role="tablist">
                    <li>
                        <a class="active" href="#tl_revenue-today" data-bs-toggle="tab" id="tl_revenue-today-tab"
                            role="tab" aria-selected="false">Today</a>
                    </li>
                    <li>
                        <a href="#tl_revenue-week" data-bs-toggle="tab" id="tl_revenue-week-tab" role="tab"
                            aria-selected="false">Week</a>
                    </li>
                    <li>
                        <a href="#tl_revenue-month" data-bs-toggle="tab" id="tl_revenue-month-tab" role="tab"
                            aria-selected="false">Month</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ends: .card-header -->
        <div class="card-body pt-0 pb-40">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="tl_revenue-today" role="tabpanel"
                    aria-labelledby="tl_revenue-today-tab">
                    <div class="cashflow-display cashflow-display2 d-flex">

                    </div>
                    <!-- ends: .performance-stats -->

                    <div class="wp-chart">
                        <div class="parentContainer">


                            <div>
                                <canvas id="saleRevenueToday"></canvas>
                            </div>


                        </div>
                    </div>

                    <!-- ends: .performance-stats -->
                </div>
                <div class="tab-pane fade" id="tl_revenue-week" role="tabpanel" aria-labelledby="tl_revenue-week-tab">
                    <div class="cashflow-display cashflow-display2 d-flex">

                    </div>
                    <!-- ends: .performance-stats -->

                    <div class="wp-chart">
                        <div class="parentContainer">


                            <div>
                                <canvas id="saleRevenueWeek"></canvas>
                            </div>


                        </div>
                    </div>

                    <!-- ends: .performance-stats -->
                </div>
                <div class="tab-pane fade" id="tl_revenue-month" role="tabpanel" aria-labelledby="tl_revenue-month-tab">
                    <div class="cashflow-display cashflow-display2 d-flex">

                    </div>
                    <!-- ends: .performance-stats -->

                    <div class="wp-chart">
                        <div class="parentContainer">


                            <div>
                                <canvas id="saleRevenueMonth"></canvas>
                            </div>


                        </div>
                    </div>

                    <!-- ends: .performance-stats -->
                </div>
            </div>
        </div>
        <!-- ends: .card-body -->
    </div>
    @section('scripts')
        <script>
            $.ready.then(function() {
                $("#tl_revenue-week-tab").on("shown.bs.tab", function() {
                    chartjsLineChart(
                            "saleRevenueWeek",
                            "113",
                            (data = @json($week_vals)),
                            (labels = @json($week_keys)),
                            "Current period",
                            !0
                        ),
                        $("#tl_revenue-week-tab").off();
                });
                $("#tl_revenue-month-tab").on("shown.bs.tab", function() {
                    chartjsLineChart(
                            "saleRevenueMonth",
                            "113",
                            (data = @json($month_vals)),
                            (labels = @json($month_keys)),
                            "Current period",
                            !0
                        ),
                        $("#tl_revenue-month-tab").off();
                });
                chartjsLineChart(
                    "saleRevenueToday",
                    "113",
                    (data = @json($year_vals)),
                    (labels = @json($year_keys)),
                    "Current period",
                    !0
                );
            })
        </script>
    @endsection
</div>
