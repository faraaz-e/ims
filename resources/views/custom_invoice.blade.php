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
    <title> CUSTOM INVOICE | IMS </title>

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
        <a href="/"><button class="btn btn-sm btn-info">&#129144; Back to dashboard</button></a>
    </div>

    <div class="container">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

        </div>

        <!------- FIRST ROW --------->

        <div class="row justify-content-center pt-1" style="background-color: #000">
            <h6 class="text-light"> I N V O I C E </h6>
        </div>


        <!------- SECOND ROW --------->

        <div class="row pt-3 border">

            <div class="col-md-5">
                <p><span class="text-dark" style="font-weight: 500"> From : </span>
                    <br>
                    <span id="myAddress" contenteditable="true">
{{--                        15, Trade Street, <br>--}}
{{--                        California - 32112 <br>--}}
{{--                        1234567890--}}
                    <textarea type="text" style="border-style: none" rows="4" cols="47" placeholder="Your Address/Contact"></textarea>
                    </span>
                    <br>
                </p>
            </div>

            <div class="col-md-7">
                <p class="text-right px-2">
                    <span class="text-dark" style="font-weight: 500"> Invoice : </span>
                    {{--                            <span id="invoiceNo" contenteditable="true"> INV_<?php date_default_timezone_set("Asia/Kolkata"); echo  date("dmyHis"); ?> </span>--}}
                    <input type="text" id="invoiceNo" size="15" placeholder="Enter Name of Client" value="INV_<?php date_default_timezone_set("Asia/Kolkata"); echo  date("dmyHis"); ?>" style="border-style: none" required>
                </p>
                <p class="text-right px-2">
                    <span class="text-dark" style="font-weight: 500"> Date : </span>
                    <input type="text" id="invoiceDate" value="<?php echo date("d M, Y"); ?>" size="15" style="border-style: none">
                </p>
            </div>

        </div>

        <!------- THIRD ROW --------->

        <div class="row pt-3 border border-top-0">

            <div class="col-md-4">
                <p>
                    <span class="text-dark" style="font-weight: 500"> To : </span>
                    <br>
                    <input type="text" id="clientName" size="40" placeholder="Enter Name of Client" style="border-style: none" required="required">
                    <br>
                    <span id="clientAddress" contenteditable="true">
{{--                            11, Beverly St. <br>--}}
                        {{--                            Los Angeles - 900 <br>--}}
                        {{--                            43341--}}
                          <textarea type="text" id="clientName" style="border-style: none" rows="4" cols="47" placeholder="Address/Contact of Client"></textarea>
                    </span>
                </p>
            </div>

            <div class="col-md-4 border-left">
                <p>
                    <span class="text-dark" style="font-weight: 500"> Shipping Address : </span>
                    <br>
                    <span id="shippingAddress" contenteditable="true">
{{--                                32, Wall St. <br>--}}
                        {{--                                New York - 456 <br>--}}
                        {{--                                45678--}}
                           <textarea type="text" id="clientName" style="border-style: none" rows="5" cols="47" placeholder="Shipping Address/Contact of Client"></textarea>
                    </span>
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


            <div class="row pt-1 px-2 py-2 border border-top-0">

                <div class="table-responsive px-2"  style="overflow-x: hidden">

                    <table class="table table-striped table-sm table-bordered animated animatedFadeInRight fadeInRight" id="mainTable">

                        <thead class="text-center" style="background-color: lightgrey">
                        <tr>
                            <th>Sr.</th>
                            <th>ID/SKU</th>
                            <th class="w-25">Product Name</th>
                            <th>Price (₹)</th>
                            <th>Qnty</th>
                            <th>GST%</th>
                            <th>Tax%</th>
                            <th>Disc%</th>
                            <th>Total (₹)</th>
                        </tr>
                        </thead>

                        <tbody class="text-center" id="rowData">

                        <tr class="items" id="item1">
                            <td>1</td>
                            <td><input type="text" id="product_sku" style="width: 4em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none"></td>
                            <td><textarea type="text" class="autoresize" id="products" rows="1" cols="35" style="text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none"></textarea></td>
                            <td><input type="number" id="product_sp" step=".01" style="width: 7em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none" required></td>
                            <td><input type="number" id="product_qnty" style="width: 5em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none" required></td>
                            <td><input type="number" id="gst_perc" step=".01" min="0" max="100" style="width: 3em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none"></td>
                            <td><input type="number" id="tax_perc" step=".01" min="0" max="100" style="width: 3em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none"></td>
                            <td><input type="number" id="disc_perc" step=".01" min="0" max="100" style="width: 3em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none"></td>
                            <td><input type="number" id="final_price" step=".01" style="text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none" required></td>
                        </tr>

                        </tbody>

                    </table>


                    <!----CALCULATIONS------>
                    <div class="row justify-content-end">

                        <div class="col-6">
                            <i class="fa fa-minus-square text-danger d-print-none" aria-hidden="true" id="delete_row" title="Delete Last Row"></i> &nbsp
                            <i class="fa fa-plus-square text-primary d-print-none" aria-hidden="true" id="add_row" title="Add Row"></i>
                        </div>

                        <div class="col-6">
                            <table class="table table-striped table-sm table-bordered animated animatedFadeInRight fadeInRight">

                                <tbody class="text-center">

                                <tr class="bg-white justify-content-end">
                                    <td style="font-weight: 500"> Subtotal </td>
                                    <td class="font-weight-bold justify-content-center">₹<input type="number" id="subtotal" step=".01" style="text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none"></td>
                                </tr>

                                <tr class="bg-white justify-content-end">
                                    <td> Shipping </td>
                                    <td><input type="number" id="shipping_cost" style="text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none"></td>
                                </tr>

                                <tr class="bg-white justify-content-end">
                                    <td style="font-weight: 700"> Grand-Total </td>
                                    <td class="font-weight-bold justify-content-center">₹<input type="number" id="grandtotal" step=".01" style="text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none" readonly></td>
                                </tr>

                                </tbody>

                            </table>
                        </div>

                    </div>


                </div>

            </div>

            <div class="text-center">
                <input type="checkbox" id="checkInvoice" value="1" class="d-print-none" />
                <label for="checkInvoice" class="text-danger d-print-none"><small>I have reviewed & checked the Invoice data for printing</small></label>
            </div>

            <div class="row justify-content-center">
                <button class="btn btn-primary btn-sm d-print-none" id="print_invoice" onclick="InvoiceDataProcess()" disabled>Process & Print Invoice</button>
            </div>
        </form>

    </div>

</main>



<!------------ INVOICE TABLE DATA ---------------->

<script>

    // get total price value

    function getFinalPrice(){
        var subTotal = $('#final_price').val().length == 0 ? 0 : parseFloat($('#final_price').val());
        remainingRows = $('.product-total');

        for(var i = 0; i < remainingRows.length; i++) {
            subTotal += remainingRows.eq(i).val().length == 0 ? 0 : parseFloat(remainingRows.eq(i).val())
        }

        console.log('subtotal is ' + subTotal)
        $("#subtotal").val(subTotal.toFixed(2));
        getGrandTotal();
    }

    function getGrandTotal(){
        // var final_price = $('#final_price').val();
        var shipping_cost = $('#shipping_cost').val().length == 0 ? 0 : $('#shipping_cost').val();
        var subTotal =  $('#subtotal').val();
        // console.log('test');
        var grandtotal = parseFloat(subTotal) + parseFloat(shipping_cost);

        $("#grandtotal").val(grandtotal.toFixed(2));
    }


    $(document).ready(function() {

        $('#product_sp, #product_qnty, #gst_perc, #tax_perc, #disc_perc').on('change', function (e) {
            var product_sp = $('#product_sp').val();
            var product_qnty = $('#product_qnty').val();
            var gst_perc = $('#gst_perc').val();
            var tax_perc = $('#tax_perc').val();
            var disc_perc = $('#disc_perc').val();

            var price_with_gst = (product_sp * product_qnty) * (gst_perc / 100);
            var price_with_tax = (product_sp * product_qnty) * (tax_perc / 100);
            var disc_value = disc_perc / 100;

            var total_price = (product_sp * product_qnty) + price_with_gst + price_with_tax;
            var disc_price = total_price * disc_value;

            var final_price = ((product_sp * product_qnty) + price_with_gst + price_with_tax) - disc_price;

            $("#final_price").val(final_price.toFixed(2));
        });


        $('#shipping_cost, #subtotal').on('change', function (e) {
            getGrandTotal();
        });

    });


        // INVOICE TABLE DATA ENDS --------------->


        $(document).ready(function () {

            $("#add_row").click(function () {
                var rowNum = $('#mainTable tbody tr:last td:first').text();
                $('#mainTable tbody tr:last').clone().insertAfter('#mainTable tbody tr:last');
                $('#mainTable tbody tr:last td:first').html(++rowNum);

                var rowData = $('#mainTable tbody tr:last').children();

                for (var i = 1; i < rowData.length; i++) {
                    //add unique ids to each input
                    var inputElement = rowData[i].firstElementChild;

                    // console.log(inputElement);

                    if (inputElement) {

                        var inputId = inputElement.id;
                        inputElement.setAttribute('id', inputId.replace(/[0-9]/g, '') + rowNum);
                        //empty default values.
                        if (i !== 0) {
                            inputElement.value = ''
                        }

                        // add class to select input from second row onwards.
                        // if (i == 2) {
                        //
                        //     inputElement.setAttribute('class', 'product-selector')
                        // }
                        if (i == 3) {
                            inputElement.setAttribute('class', 'product-price')
                        }
                        if (i == 4) {
                            inputElement.setAttribute('class', 'product-qnty')
                        }
                        if (i == 5) {
                            inputElement.setAttribute('class', 'product-gst')
                        }
                        if (i == 6) {
                            inputElement.setAttribute('class', 'product-tax')
                        }
                        if (i == 7) {
                            inputElement.setAttribute('class', 'product-disc')
                        }
                        if (i == 8) {
                            inputElement.setAttribute('class', 'product-total')
                        }

                    }
                }
            });


            $("#delete_row").click(function () {
                $("#mainTable tr:last").remove();
                getFinalPrice();
            });

            //on change events for select dropdown from row 2
            // $(document).on('change', '.product-selector', function (e) {
            //     var rowId = this.id.match(/(\d+)/)[0];
            //     // console.log(rowId);
            //     product_data.forEach((item, index) => {
            //         if (item.product_name + " - " + item.product_color === $("#products" + rowId).val()) {
            //
            //             $("#product_sku" + rowId).val(item.product_sku);
            //             $("#product_sp" + rowId).val(item.product_sp);
            //             $("#total_qnty" + rowId).val(item.product_qnty);
            //             $("#product_qnty" + rowId).attr({
            //                 "max": item.product_qnty,
            //                 "min": 1
            //             });
            //         }
            //     });
            // });

            //on change events for qnty and price from row 2
            $(document).on('change', '.product-price, .product-qnty, .product-gst, .product-tax, .product-disc', function (e) {
                var rowId = this.id.match(/(\d+)/)[0];

                var product_sp = $('#product_sp' + rowId).val();
                var product_qnty = $('#product_qnty' + rowId).val();
                var gst_perc = $('#gst_perc' + rowId).val();
                var tax_perc = $('#tax_perc' + rowId).val();
                var disc_perc = $('#disc_perc' + rowId).val();

                var price_with_gst = (product_sp * product_qnty) * (gst_perc / 100);
                var price_with_tax = (product_sp * product_qnty) * (tax_perc / 100);
                var disc_value = disc_perc / 100;

                var total_price = (product_sp * product_qnty) + price_with_gst + price_with_tax;
                var disc_price = total_price * disc_value;

                var final_price = ((product_sp * product_qnty) + price_with_gst + price_with_tax) - disc_price;

                $("#final_price" + rowId).val(final_price.toFixed(2));

            });



            //function to update subtotal of all products.
            $(document).on('change', '#product_sp, #product_qnty, #gst_perc, #tax_perc, #disc_perc, .product-price, .product-qnty, .product-gst, .product-tax, .product-disc , #final_price, .product-total', function (e) {
                getFinalPrice();
            });

        });
</script>

<script>

        //Add a JQuery click event handler onto our checkbox.
        $('#checkInvoice').click(function () {
            //If the checkbox is checked.
            if ($(this).is(':checked')) {
                //Enable the submit button.
                $('#print_invoice').attr("disabled", false);
            } else {
                //If it is not checked, disable the button.
                $('#print_invoice').attr("disabled", true);
            }
        });


        function InvoiceDataProcess() {

            window.print();

        }



</script>

<script type="text/javascript">
    textarea = document.querySelector(".autoresize");
    textarea.addEventListener('input', autoResize, false);

    function autoResize() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    }
</script>
