@include('header')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Dashboard</h4>
    </div>

    <!-- CHART ROW-->
    <div class="row">

        <div class="col-lg-1">

        </div>

        <div class="col-lg-4">
            <canvas id="myDoughnutChart" width="450px" height="450px"></canvas>

            <script>
                var ctx = document.getElementById('myDoughnutChart');
                var myDoughnutChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['In Stock', 'Low on Stock', 'Out of Stock'],
                        datasets: [{
                            label: '# of Products',
                            data: [ {{ $in_stock_count }}, {{ $low_stock_count }}, {{ $out_of_stock_count }} ],
                            backgroundColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(153, 102, 255, 1)',
                            ],
                            borderWidth: 2
                        }]
                    },
                    // options: options
                });
            </script>
        </div>

        <div class="col-lg-1">

        </div>

        <div class="col-lg-4">
            <canvas id="myLineChart" width="450px" height="450px"></canvas>

            <script>
                var ctx = document.getElementById('myLineChart');
                var myLineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb','Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Total Sale ₹',
                            data: [<?php echo $monthwise_sale_data ?>],
                            borderColor: 'seagreen',
                            pointBackgroundColor: 'lightblue',
                            backgroundColor: 'springgreen',
                            borderWidth: 2
                        }]
                    },
                    // options: options
                });
            </script>

        </div>

    </div>
    <!-- END CHART ROW-->

    <br>
    <br>


    <div class="row">
        <div class="col-md">
            <div class="card shadow">
                <div class="card-body">
                        <div class="row justify-content-center">
                            <h3 class="card-title">{{ $total_invoice_count }}</h3>
                        </div>
                        <div class="row justify-content-center">
                            <h5 class="card-subtitle mb-2 text-muted">Total Invoice Created</h5>
                        </div>
                        <div class="row align-items-center d-flex justify-content-center">
                            <img src="{{ URL::asset('bill.png') }}" height="40px" width="auto">
                        </div>

                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card shadow">
                <div class="card-body">
                        <div class="row justify-content-center">
                            <h3 class="card-title">₹ {{ $in_stock_cp[0]['grand_total'] }}</h3>
                        </div>
                        <div class="row justify-content-center">
                            <h5 class="card-subtitle mb-2 text-muted">Total In-Stock Cost</h5>
                        </div>
                        <div class="row justify-content-center">
                            <img src="{{ URL::asset('boxes.png') }}" height="40px" width="auto">
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <h3 class="card-title">₹ {{ $client_total_pending_amt[0]['total_balance'] }}</h3>
                    </div>
                    <div class="row justify-content-center">
                        <h5 class="card-subtitle mb-2 text-muted">Total Client Pending Amt</h5>
                    </div>
                    <div class="row align-items-center d-flex justify-content-center">
                        <img src="{{ URL::asset('money.png') }}" height="40px" width="auto">
                    </div>

                </div>
            </div>
        </div>
    </div>


    <br>


            <!-- STOCK OVERVIEW CARD - FIRST ROW -->
{{--            <div class="row">--}}

{{--                <div class="col-lg-6">--}}

{{--                <div class="container bg-transparent">--}}
{{--                    <div class="row">--}}
{{--                        <div class="card text-center p-2 animated animatedFadeInLeft fadeInLeft" style="width:100%; border-radius: 0%">--}}

{{--                            <h5 class="text-center"> Stock Count </h5>--}}

{{--                            <ul class="list-group shadow animated animatedFadeInUp fadeInUp animation-delay" style="border-radius: 0%">--}}
{{--                                <li class="list-group-item d-flex justify-content-between align-items-center py-2">--}}
{{--                                    Total Stock--}}
{{--                                    <h4><span class="badge badge-primary badge-pill"> {{ $total_stock_count }}</span></h4>--}}
{{--                                </li>--}}
{{--                                <li class="list-group-item d-flex justify-content-between align-items-center py-2">--}}
{{--                                    In-Stock--}}
{{--                                    <h4><span class="badge badge-success badge-pill">{{ $in_stock_count }}</span></h4>--}}
{{--                                </li>--}}
{{--                                <li class="list-group-item d-flex justify-content-between align-items-center py-2">--}}
{{--                                    Out-of-Stock--}}
{{--                                    <h4><span class="badge badge-danger badge-pill">{{ $out_of_stock_count }}</span></h4>--}}
{{--                                </li>--}}
{{--                            </ul>--}}

{{--                        </div> <!-- END OF CARD -->--}}
{{--                    </div>  <!-- END OF ROW -->--}}
{{--                </div> <!-- END OF CONTAINER -->--}}

{{--                </div> <!--END OF FIRST COLUMN-->--}}


{{--                <div class="col-lg-6">--}}

{{--                    <div class="container bg-transparent">--}}

{{--                        <div class="row">--}}
{{--                            <div class="card text-center p-2 animated animatedFadeInLeft fadeInLeft" style="width:100%; border-radius: 0%">--}}

{{--                                <h5 class="text-center"> Sale Count </h5>--}}

{{--                                <ul class="list-group shadow animated animatedFadeInUp fadeInUp animation-delay" style="border-radius: 0%">--}}
{{--                                    <li class="list-group-item d-flex justify-content-between align-items-center py-2">--}}
{{--                                        Total Sale--}}
{{--                                        <h4><span class="badge badge-warning badge-pill">500</span></h4>--}}
{{--                                    </li>--}}
{{--                                    <li class="list-group-item d-flex justify-content-between align-items-center py-2">--}}
{{--                                        Today--}}
{{--                                        <h4><span class="badge badge-warning badge-pill">350</span></h4>--}}
{{--                                    </li>--}}
{{--                                    <li class="list-group-item d-flex justify-content-between align-items-center py-2">--}}
{{--                                        Yesterday--}}
{{--                                        <h4><span class="badge badge-warning badge-pill">150</span></h4>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}

{{--                            </div> <!-- END OF CARD -->--}}
{{--                        </div>  <!-- END OF ROW -->--}}
{{--                    </div> <!-- END OF CONTAINER -->--}}

{{--                </div> <!--END OF SECOND COLUMN-->--}}


{{--            </div> <!--END OF FIRST ROW -->--}}


            <div class="container-fluid">

            <div class="row">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4>Out of Stock Products</h4>
                </div>

                    <div class="table-responsive">

                        <table class="table table-striped table-sm table-bordered animated animatedFadeInRight fadeInRight">

                            <?php
                            $i=0;
                            ?>

                            @if ( count($out_of_stock_list) > 0 )

                                <thead class="text-center" style="background-color: #333; color:white">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Product ID/SKU</th>
                                    <th>Product Name</th>
                                    <th>Color</th>
                                    <th>Cost Price (₹)</th>
                                </tr>
                                </thead>

                                <tbody class="text-center">


                                @foreach($out_of_stock_list as $out_of_stock_data)

                                    <tr>
                                        <td> <?php
                                                   ++$i;
                                                    echo $i ;
                                                ?>
                                        </td>
                                        <td> {{ $out_of_stock_data['product_sku'] }} </td>
                                        <td> {{ $out_of_stock_data['product_name'] }} </td>
                                        <td> {{ $out_of_stock_data['product_color'] }} </td>
                                        <td> {{ $out_of_stock_data['product_cp'] }} </td>
                                    </tr>

                                @endforeach

                            @else

                                    <div class="alert alert-warning w-100" role="alert">
                                        <p> No data found ! </p>
                                    </div>

                            @endif

                            </tbody>
                        </table>
                    </div>

                </div> <!-- END OF SECOND ROW -->
            </div>
            </main>


{{--        </div>--}}

{{--    </div>--}}

{{--    <footer class="footer m-0 py-0 bg-dark">--}}
{{--        <div class="container">--}}
{{--            <span class="text-secondary"> Inventory Application for Company Name only</span>--}}
{{--            <span class="float-right text-secondary">Designed & Developed by Person Name </span>--}}
{{--        </div>--}}
{{--    </footer>--}}

</body>

</html>
