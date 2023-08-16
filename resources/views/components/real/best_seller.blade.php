<div class="col-xxl-8 mb-25">

    <div class="card border-0 px-25">
        <div class="card-header px-0 border-0">
            <h6>Best Seller</h6>
        </div>
        <div class="card-body p-0">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="t_selling-today222" role="tabpanel"
                    aria-labelledby="t_selling-today222-tab">
                    <div class="selling-table-wrap selling-table-wrap--source">
                        <div class="table-responsive">
                            <table class="table table--default table-borderless">
                                <thead>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>No Of Bookings </th>
                                        <th>Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($best_selling_rooms as $room)
                                        <tr>
                                            <td>
                                                <div class="selling-product-img d-flex align-items-center">
                                                    <div
                                                        class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                                                        <img class=" img-fluid"
                                                            src="{{ $room->image }}"
                                                            alt="img">
                                                    </div>
                                                    <span>{{$room->number}}</span>
                                                </div>
                                            </td>
                                            <td>{{$room->total}}</td>
                                            <td>N{{$room->total_price}}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
