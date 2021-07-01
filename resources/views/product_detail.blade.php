@include('header')


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="container">

        <div class="row">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4>Product Detail</h4>
            </div>

            <div class="container-fluid shadow animated animatedFadeInUp fadeInUp animation-delay2">

                <div class="row p-2 justify-content-end">
                    <a href="/edit_stock/{{ $stock_detail[0]['id'] }}"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true" title="Edit / Update"></i>&nbsp Edit</button></a>&nbsp &nbsp
                    <a href="/delete_stock/{{ $stock_detail[0]['id'] }}"><button class="btn btn-danger btn-sm" id="delete_product"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i>&nbsp Delete</button></a>&nbsp
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey">Product ID/SKU : </span> &nbsp {{ $stock_detail[0]['product_sku'] }}</p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey">Product Name : </span> &nbsp {{ $stock_detail[0]['product_name'] }}</p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey">Product Color : </span> &nbsp {{ $stock_detail[0]['product_color'] }} </p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey">Product Description : </span> &nbsp {{ $stock_detail[0]['product_desc'] }} </p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey"> Quantity : </span> &nbsp {{ $stock_detail[0]['product_qnty'] }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 border-left">
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey">Product Cost Price : </span> &nbsp ₹ {{ $stock_detail[0]['product_cp'] }} </p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey"> Product Selling Price : </span> &nbsp ₹ {{ $stock_detail[0]['product_sp'] }} </p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey"> Product Added On : </span> &nbsp {{ date('d M Y H:i:s', strtotime($stock_detail[0]['created_at']) ) }}  </p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey"> Product Updated On : </span> &nbsp {{ date('d M Y H:i:s', strtotime($stock_detail[0]['updated_at']) ) }} </p>
                        </div>
                    </div>
                </div>


            </div>


        </div> <!-- END OF FIRST ROW -->
    </div>
</main>

<script>
    $(document).ready(function(){
        $('#delete_product').click(function (){
            var temp = confirm("Are you sure, you want to DELETE this Product ?");
            if( temp == false ){
                return false;
            }
        });
    });
</script>


</body>
    </html>
