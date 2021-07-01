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
    <title> CREATE INVOICE | IMS </title>

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
                        <p><span class="text-dark" style="font-weight: 500"> From : </span>
                            <br>
                            <textarea type="text" id="myAddress" style="border-style: none" rows="5" cols="47" placeholder="Enter your Shop/Address/Contact/GST">@if( !empty( $account_data ) ){{ $account_data[0]['my_shop_street'] }} &#13;&#10 {{ $account_data[0]['my_town_city'] }} - {{ $account_data[0]['my_pincode'] }} &#13;&#10 {{ $account_data[0]['my_contact1'] }} {{ "/ ". $account_data[0]['my_contact2'] }} &#13;&#10 GST : {{ $account_data[0]['my_gst'] }}
                                @endif
                            </textarea>
                            <br>
                        </p>
                    </div>

                    <div class="col-md-7">
                        <p class="text-right px-2">
                            <span class="text-dark" style="font-weight: 500"> Invoice : </span>
                            <input type="text" id="invoiceNo" size="15" placeholder="Enter Invoice No." value="INV_<?php date_default_timezone_set("Asia/Kolkata"); echo  date("dmyHis"); ?>" style="border-style: none" required readonly>
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
                            <textarea type="text" id="clientAddress" style="border-style: none" rows="4" cols="47" placeholder="Address/Contact of Client"></textarea>
                        </p>
                    </div>

                    <div class="col-md-4 border-left">
                        <p>
                            <span class="text-dark" style="font-weight: 500"> Shipping Address : </span>
                            <br>
                            <textarea id="shippingAddress" style="border-style: none" rows="5" cols="47" placeholder="Shipping Address/Contact of Client"></textarea>
                        </p>
                    </div>

                    <div class="col-md-4">
                        <p>
                            <!--FOR SPACING-->
                        </p>
                    </div>

                </div>

                <div class="row border-left border-right">
                    <p class=" pl-3 text-danger d-print-none"><small>Out of Stock Products will not be displayed in the product list.</small></p>
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
                                    <th class="d-print-none d-none">id</th>
                                    <th>ID/SKU</th>
                                    <th>Product Name</th>
                                    <th class="d-print-none">Total Qty</th>
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
                                        <td class="d-none d-print-none"><input type="hidden" id="product_id" style="width: 4em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none" name="product_id"></td>
                                        <td><input type="text" id="product_sku" style="width: 4em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none"></td>
                                        <td>
                                            <select id="products" style="text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none">
                                                <option>Select Product</option>
                                            </select>
                                        </td>
                                        <td class="d-print-none"><input type="number" id="total_qnty" style="color:green; font-weight: bold; width: 5em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none" disabled></td>
                                        <td><input type="number" id="product_sp" step=".01" style="width: 7em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none" required></td>
                                        <td><input type="number" id="product_qnty" style="width: 5em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none" name="product_qnty" required></td>
                                        <td><input type="number" id="gst_perc" step=".01" min="0" max="100" style="width: 3em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none"></td>
                                        <td><input type="number" id="tax_perc" step=".01" min="0" max="100" style="width: 3em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none"></td>
                                        <td><input type="number" id="disc_perc" step=".01" min="0" max="100" style="width: 3em; text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none"></td>
                                        <td><input type="number" id="final_price" step=".01" style="text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none" required readonly></td>
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
                                        <td class="font-weight-bold justify-content-center">₹<input type="number" id="subtotal" step=".01" style="text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none" readonly></td>
                                    </tr>

                                    <tr class="bg-white justify-content-end">
                                        <td> Shipping </td>
                                        <td>₹<input type="number" id="shipping_cost" style="text-align: center; border: 0px solid; background-color: transparent; -webkit-appearance:none"></td>
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

            </div>

                <div class="text-center">
                    <input type="checkbox" id="checkInvoice" value="1" class="d-print-none" />
                    <label for="checkInvoice" class="text-danger d-print-none"><small>I have reviewed & checked the Invoice data for printing</small></label>
                </div>

                <div class="row justify-content-center">
                    <button class="btn btn-primary btn-sm d-print-none" type="submit" id="print_invoice" disabled> Process & Print Invoice </button>
                </div>
        </form>

            </div>

        </main>
      <br>



   <!------------ INVOICE TABLE DATA ---------------->

    <script>
        // const url = "https://api.npoint.io/6385108827619389ef21";
        const url = '{{ URL::to('/get_stock') }}';
        var select = document.getElementById("products");
        var product_data = [];


        // get total price value

        function getFinalPrice(){
            var subTotal = $('#final_price').val().length == 0 ? 0 : parseFloat($('#final_price').val());
            remainingRows = $('.product-total');
            for(var i = 0; i < remainingRows.length; i++) {
                subTotal += remainingRows.eq(i).val().length == 0 ? 0 : parseFloat(remainingRows.eq(i).val())
            }

            // console.log('subtotal is ' + subTotal)
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


        $(document).ready(function(){
            $.ajax({
                url : url,
                data : '',
                dataType : 'json',
                success:function(data){

                product_data = data;
                data.forEach((item, index)=>{
                    var el = document.createElement("option");
                    el.value = el.textContent = item.product_name +" - "+item.product_color;
                    select.appendChild(el);
                });

                $('#products').on('change', function (e) {
                    data.forEach((item, index)=>{
                        if(item.product_name +" - "+item.product_color === $("#products").val()){
                            $("#product_id").val(item.id);
                            $("#product_sku").val(item.product_sku);
                            $("#product_sp").val(item.product_sp);
                            $("#total_qnty").val(item.product_qnty);
                            $("#product_qnty").attr({
                                "max" : item.product_qnty,
                                "min" : 1
                            });
                        }
                    });
                });


                    $('#products, #product_sp, #product_qnty, #gst_perc, #tax_perc, #disc_perc').on('change', function (e) {
                        var product_sp = $('#product_sp').val();
                        var product_qnty = $('#product_qnty').val();
                        var gst_perc = $('#gst_perc').val();
                        var tax_perc = $('#tax_perc').val();
                        var disc_perc = $('#disc_perc').val();

                        var price_with_gst =  (product_sp * product_qnty) * (gst_perc/100);
                        var price_with_tax =  (product_sp * product_qnty) * (tax_perc/100);
                        var disc_value =  disc_perc/100;

                        var total_price = (product_sp * product_qnty) + price_with_gst + price_with_tax;
                        var disc_price = total_price * disc_value;

                        var final_price = ( (product_sp * product_qnty) + price_with_gst + price_with_tax ) - disc_price;

                        $("#final_price").val(final_price.toFixed(2));
                    });

                    $('#shipping_cost, #subtotal').on('change', function (e) {
                        getGrandTotal();
                    });

                }
            });
        });



// INVOICE TABLE DATA ENDS --------------->




    $(document).ready(function (){

        $("#add_row").click(function(){
            var rowNum = $('#mainTable tbody tr:last td:first').text();
            $('#mainTable tbody tr:last').clone().insertAfter('#mainTable tbody tr:last');
            $('#mainTable tbody tr:last td:first').html(++rowNum);

            var rowData = $('#mainTable tbody tr:last').children();

            for(var i = 1; i < rowData.length; i++ ){
                //add unique ids to each input
                var inputElement = rowData[i].firstElementChild;

                if( inputElement )
                {

                    var inputId = inputElement.id;
                    inputElement.setAttribute('id', inputId.replace(/[0-9]/g, '') + rowNum );
                    //empty default values.
                    if (i !== 3){
                        inputElement.value = ''
                    }

                    // add class to select input from second row onwards.
                    if (i == 1){
                        inputElement.setAttribute('class', 'product-id' )
                    }
                    if (i == 4){
                        inputElement.setAttribute('class', 'total-qnty' )
                    }
                    if (i == 3){
                        populateProducts();
                        inputElement.setAttribute('class', 'product-selector' )
                    }
                    if (i == 5){
                        inputElement.setAttribute('class', 'product-price' )
                    }
                    if (i == 6){
                        inputElement.setAttribute('class', 'product-qnty' )
                    }
                    if (i == 7){
                        inputElement.setAttribute('class', 'product-gst' )
                    }
                    if (i == 8){
                        inputElement.setAttribute('class', 'product-tax' )
                    }
                    if (i == 9){
                        inputElement.setAttribute('class', 'product-disc' )
                    }
                    if (i == 10){
                        inputElement.setAttribute('class', 'product-total' )
                    }

                }
            }
        });


        $("#delete_row").click(function(){
            $("#mainTable tr:last").remove();
            getFinalPrice();
        });

        //on change events for select dropdown from row 2
        $(document).on('change', '.product-selector', function (e) {
            var rowId = this.id.match(/(\d+)/)[0];
            // console.log(rowId);
            product_data.forEach((item, index) => {
                if (item.product_name + " - " + item.product_color === $("#products"+rowId).val()) {
                    $("#product_id"+rowId).val(item.id);
                    $("#product_sku"+rowId).val(item.product_sku);
                    $("#product_sp"+rowId).val(item.product_sp);
                    $("#total_qnty"+rowId).val(item.product_qnty);
                    $("#product_qnty"+rowId).attr({
                        "max": item.product_qnty,
                        "min": 1
                    });
                }
            });
        });

        //on change events for qnty and price from row 2
        $(document).on('change', '.product-selector, .product-price, .product-qnty, .product-gst, .product-tax, .product-disc', function (e) {
            var rowId = this.id.match(/(\d+)/)[0];

            var product_sp = $('#product_sp'+rowId).val();
            var product_qnty = $('#product_qnty'+rowId).val();
            var gst_perc = $('#gst_perc'+rowId).val();
            var tax_perc = $('#tax_perc'+rowId).val();
            var disc_perc = $('#disc_perc'+rowId).val();

            var price_with_gst =  (product_sp * product_qnty) * (gst_perc/100);
            var price_with_tax =  (product_sp * product_qnty) * (tax_perc/100);
            var disc_value =  disc_perc/100;

            var total_price = (product_sp * product_qnty) + price_with_gst + price_with_tax;
            var disc_price = total_price * disc_value;

            var final_price = ( (product_sp * product_qnty) + price_with_gst + price_with_tax ) - disc_price;

            $("#final_price"+rowId).val(final_price.toFixed(2));

        });

        //function to update subtotal of all products.
        $(document).on('change', '#products, .product-selector ,#product_sp, #product_qnty, #gst_perc, #tax_perc, #disc_perc, .product-price, .product-qnty, .product-gst, .product-tax, .product-disc , #final_price, .product-total', function (e) {
            getFinalPrice();
        });



        // populate non selected products when new drop down is generated
        function populateProducts(){
            previouslySelectedProducts = [];

            previouslySelectedProducts.push($('#products').val())

            // collect previously selected products
            remainingRows = $('.product-selector');
            for(var i = 0; i < remainingRows.length-1; i++) {
                previouslySelectedProducts.push(remainingRows.eq(i).val())
            }


            // select last dropdown for product
            var newSelector = $('select').eq($('select').length - 1).attr('id')

            //now remove selected product from last selector.

            for(var i = 0; i < previouslySelectedProducts.length; i++){
                if(previouslySelectedProducts[i] !== 'Select Product'){
                    $('#'+ newSelector + " option[value='" + previouslySelectedProducts[i] + "']").remove();
                }
            }

        }


    });



        //Add a JQuery click event handler onto our checkbox.
        $('#checkInvoice').click(function(){
            //If the checkbox is checked.
            if($(this).is(':checked')){
                //Enable the submit button.
                $('#print_invoice').attr("disabled", false);
            } else{
                //If it is not checked, disable the button.
                $('#print_invoice').attr("disabled", true);
            }
        });



        $(function() {
            $("#print_invoice").on("click", function(e) {

                e.preventDefault();

                var check = 0 ;

                if( parseInt( $('#product_qnty').val() ) > parseInt( $('#total_qnty').val() ) )
                {
                    check += 1 ;
                    alert("Product quantity is greater than Total quantity in stock, Please recheck Row No. 1");

                }

                var count = $('#mainTable .items').length;


                for(var i = 2; i <= count; i++ )
                    {
                        if( parseInt( $('#product_qnty' + i).val() ) > parseInt( $('#total_qnty' + i).val() ) )
                        {
                            check += 1 ;
                            alert("Product quantity is greater than Total Quantity in Stock. Please recheck Row No. "+ i);
                        }
                    }

                     if(check == 0)
                        {

                            e.preventDefault(); // stop submission
                            const arr = $("#rowData [id^=product_id]")
                                .map(function () {
                                    const $qnty = $(this).closest("tr").find("[id^=product_qnty]")
                                    const $sku = $(this).closest("tr").find("[id^=product_sku]")
                                    const $name = $(this).closest("tr").find("[id^=products]")
                                    const $price = $(this).closest("tr").find("[id^=product_sp]")
                                    const $gst = $(this).closest("tr").find("[id^=gst_perc]")
                                    const $tax = $(this).closest("tr").find("[id^=tax_perc]")
                                    const $disc = $(this).closest("tr").find("[id^=disc_perc]")
                                    const $finalprice = $(this).closest("tr").find("[id^=final_price]")
                                    return ({
                                        [$(this).attr("id")]: $(this).val(),
                                        [$qnty.attr("id")]: $qnty.val(),
                                        [$sku.attr("id")]: $sku.val(),
                                        [$name.attr("id")]: $name.val(),
                                        [$price.attr("id")]: $price.val(),
                                        [$gst.attr("id")]: $gst.val(),
                                        [$tax.attr("id")]: $tax.val(),
                                        [$disc.attr("id")]: $disc.val(),
                                        [$finalprice.attr("id")]: $finalprice.val()
                                    })
                                })
                                .get();
                            var invoiceNo = $('#invoiceNo').val();
                            var invoiceDate = $('#invoiceDate').val();
                            var myAddress = $('#myAddress').val();
                            var clientName = $('#clientName').val();
                            var clientAddress = $('#clientAddress').val();
                            var shippingAddress = $('#shippingAddress').val();
                            var subtotal = $('#subtotal').val();
                            var shippingCost = $('#shipping_cost').val();
                            var grandTotal = $('#grandtotal').val();
                            console.log(arr)
                            console.log(invoiceNo)
                            console.log(invoiceDate)
                            console.log(myAddress)
                            console.log(clientName)
                            console.log(clientAddress)
                            console.log(shippingAddress)
                            console.log(subtotal)
                            console.log(shippingCost)
                            console.log(grandTotal)

                            $.ajax(
                                {
                                    type: "GET", //HTTP POST Method
                                    url: '{{ URL::to('/invoice_data_process') }}', // Controller/View
                                    data: { //Passing data
                                        'myAddress' : myAddress,
                                        'invoiceNo' : invoiceNo,
                                        'invoiceDate' : invoiceDate,
                                        'clientName' : clientName,
                                        'clientAddress' : clientAddress,
                                        'shippingAddress' : shippingAddress,
                                        'subtotal' : subtotal,
                                        'shippingCost' : shippingCost,
                                        'grandTotal': grandTotal,
                                        'arr': arr
                                    },
                                    success: function (response) {
                                        console.log(response);

                                        window.print();
                                        window.location.replace("{{ URL::to('/create_invoice') }}");
                                    },

                                });


                        } //end of else

            });
        });


    </script>

</body>
