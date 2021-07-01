{{--@include('header')--}}
<?php
if( Auth::id() == NULL )
{
    return redirect('login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- OFFLINE ASSETS LINK -->
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('font-awesome-4.7.0/css/font-awesome.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('chart.js/dist/Chart.js') }}"></script>

    <!-- ONLINE ASSETS LINK -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js">
    <link src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">


    <!-- FOR CHART JS-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.js">
        <script src="node_modules/chartjs/dist/Chart.js"></script>

    <link rel="icon" href="{{ asset('ims-favicon.png') }}" type="image/gif" sizes="16x16">
    <title> SHOW INVOICE | IMS </title>

    <style>

        a{
            color: #333333;
            font-weight: 500;
        }
        .active{
            color: #005cbf ;
        }

        [contenteditable="true"]:active, [contenteditable="true"]:focus
        {
            border:none;
            outline:none;
            background-color: lightblue;
        }

    </style>

</head>

<body>

<script>
    var wintimeout;

    function SetWinTimeout() {
        wintimeout = window.setTimeout("window.location.href='../logout';",60000); //after 5 mins i.e. 5 * 60 * 1000
    }
    $('body').click(function() {

        window.clearTimeout(wintimeout); //when user clicks remove timeout and reset it

        SetWinTimeout();

    });
    $('body').mousemove(function() {

        window.clearTimeout(wintimeout); //when user clicks remove timeout and reset it

        SetWinTimeout();

    });
    SetWinTimeout();
</script>

<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-md-4">

    <div class="row p-1 d-print-none">
        <a href="/invoice_list"><button class="btn btn-sm btn-info">&#129144; Back to Invoice List</button></a>
    </div>

    <div class="container" id="pdfLayout">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

        </div>

        <!------- FIRST ROW --------->

        <div class="row justify-content-center pt-1" style="background-color: #000">
            <h6 class="text-light"> I N V O I C E </h6>
        </div>


        <!------- SECOND ROW --------->

        <div class="row pt-3 border">

            <div class="col-md-5">
                <p class="w-50"><span class="text-dark" style="font-weight: 500"> From : </span>
                    <br>
                    @if( !empty( $invoice_data ) ){{ $invoice_data[0]['my_address'] }}
                    @endif
                    <br>
                </p>
            </div>

            <div class="col-md-7">
                <p class="text-right px-2">
                    <span class="text-dark" style="font-weight: 500"> Invoice : </span>
                    {{ $invoice_data[0]['invoice_number'] }}
                    <br>
                </p>
                <p class="text-right px-2">
                    <span class="text-dark" style="font-weight: 500"> Date : </span>
                    {{ $invoice_data[0]['invoice_date'] }}
                    <br>
                </p>
            </div>

        </div>

        <!------- THIRD ROW --------->

        <div class="row pt-3 border border-top-0">

            <div class="col-md-4">
                <p>
                    <span class="text-dark" style="font-weight: 500"> To : </span>
                    <br>
                    <input type="text" id="clientName" size="40" value="{{ $invoice_data[0]['client_name'] }}" style="background-color: white ;border-style: none" required="required" disabled>
                    <br>
                    {{ $invoice_data[0]['client_address'] }}
                    <br>
                </p>
            </div>

            <div class="col-md-4 border-left">
                <p>
                    <span class="text-dark" style="font-weight: 500"> Shipping Address : </span>
                    <br>
                    {{ $invoice_data[0]['shipping_address'] }}
                    <br>
                </p>
            </div>

            <div class="col-md-4">
                <p>
                    <!--FOR SPACING-->
                </p>
            </div>

        </div>


        <!------- FOURTH ROW --------->
        <form id="invoice_data_process">

            <div id="print">

                <div class="row pt-1 px-2 py-2 border border-top-0">

                    <div class="table-responsive px-2"  style="overflow-x: hidden">

                        <table class="table table-striped table-sm table-bordered animated animatedFadeInRight fadeInRight" id="mainTable">

                            <thead class="text-center" style="background-color: lightgrey">
                            <tr>
                                <th>Sr.</th>
                                <th>ID/SKU</th>
                                <th>Product Name</th>
                                <th>Price (₹)</th>
                                <th>Qnty</th>
                                <th>GST%</th>
                                <th>Tax%</th>
                                <th>Disc%</th>
                                <th>Total (₹)</th>
                            </tr>
                            </thead>

                            <tbody class="text-center" id="rowData">

                            @if( !empty( $invoice_products ) )
                            <?php $i=0 ?>
                                @foreach( $invoice_products as $invoice_products )

                            <tr class="items" id="item1">
                                <td> <?php echo ++$i; ?> </td>
                                <td> {{ $invoice_products['product_sku'] }} </td>
                                <td> {{ $invoice_products['product_name'] }} </td>
                                <td> {{ $invoice_products['product_sp'] }} </td>
                                <td> {{ $invoice_products['product_qnty'] }} </td>
                                <td> {{ $invoice_products['gst_perc'] }} </td>
                                <td> {{ $invoice_products['tax_perc'] }} </td>
                                <td> {{ $invoice_products['disc_perc'] }} </td>
                                <td> {{ $invoice_products['final_price'] }} </td>
                            </tr>

                                @endforeach

                            @endif

                            </tbody>

                        </table>


                        <!----CALCULATIONS------>
                        <div class="row justify-content-end">

                            <div class="col-6">
                                <!--SPACING-->
                            </div>

                            <div class="col-6">
                                <table class="table table-striped table-sm table-bordered animated animatedFadeInRight fadeInRight">

                                    <tbody class="text-center">

                                    <tr class="bg-white justify-content-end">
                                        <td style="font-weight: 500"> Subtotal </td>
                                        <td class="font-weight-bold justify-content-center">₹ {{ $invoice_data[0]['subtotal'] }} </td>
                                    </tr>

                                    <tr class="bg-white justify-content-end">
                                        <td> Shipping </td>
                                        <td>₹ {{ $invoice_data[0]['shipping_cost'] }} </td>
                                    </tr>

                                    <tr class="bg-white justify-content-end">
                                        <td style="font-weight: 700"> Grand-Total </td>
                                        <td class="font-weight-bold justify-content-center">₹ {{ $invoice_data[0]['grand_total'] }} </td>
                                    </tr>

                                    </tbody>

                                </table>
                            </div>

                        </div>


                    </div>

                </div>

            </div>

            <br>

            <div class="row justify-content-center">
                <button class="btn btn-primary btn-sm d-print-none" type="submit" onclick="window.print()"> Print Invoice </button>
            </div>
        </form>

    </div>

</main>
<br>



<!------------ INVOICE TABLE DATA ---------------->

<script>


</script>

</body>
