@include('header')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div class="container">

            <div class="row">
                <div class="col-md-2">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h4>Stock List</h4>
                    </div>
                </div>
                @if( !empty($stock_list_data) )
                <div class="col-md-6">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                        <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="&#128269; Search for Product Name">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap pt-3 pb-2 mb-3">
                        <ul class="nav nav-tabs">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filter</a>
                                <div class="dropdown-menu" style="">
                                    <button class="dropdown-item" onclick="window.location.reload()">View all</button>
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item" onclick="myFunctionFilterOutOfStock()" id="myFunctionFilterOutOfStock">Out of Stock</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
                <div class="col-md-2">
                    <div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3">
                    <button class="btn btn-outline-primary btn-sm rounded-0" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp Add Stock</button>
                    </div>
                </div>

            </div>

                @if(session('create_message'))
                    <div class="row p-2">
                        <div class="alert alert-success w-100 timeout" role="alert">
                            {{session('create_message')}}
                        </div>
                    </div>
                @elseif(session('update_message'))
                    <div class="row p-2">
                        <div class="alert alert-success w-100 timeout" role="alert">
                            {{session('update_message')}}
                        </div>
                    </div>
                @elseif(session('delete_message'))
                    <div class="row p-2">
                        <div class="alert alert-success w-100 timeout" role="alert">
                            {{session('delete_message')}}
                        </div>
                    </div>
                @endif

                <script>
                    $("document").ready(function(){
                        setTimeout(function(){
                            $("div.timeout").remove();
                        }, 3000 ); // 3 secs

                    });
                </script>



                <?php
                $i=0;
                ?>

                @if( !empty($stock_list_data) )

            <div class="row">

            <div class="table-responsive">

                <table class="table table-bordered table-sm animated animatedFadeInRight fadeInRight" id="myTable">

                    <thead>
                    <tr class="text-center" style="background-color: #fcfcb6">
                        <th>Sr.</th>
                        <th>Product ID/SKU</th>
                        <th>Product Name</th>
                        <th>Color</th>
                        <th width="25%">Description/Comment</th>
                        <th>Quantity </th>
                        <th>Cost (₹)</th>
                        <th>Selling (₹)</th>
                        <th>Status</th>
                        <th>Manage</th>
                    </tr>
                    </thead>

                    <tbody class="text-center">

                            @foreach( $stock_list_data as $stock_data )
                                <tr>
                                    <td> <?php
                                            ++$i;
                                            echo $i;
                                         ?>
                                    </td>
                                    <td> {{ $stock_data -> product_sku }} </td>
                                    <td><a href="/product_detail/{{ $stock_data->id }}"> {{ $stock_data -> product_name }} </a></td>
                                    <td> {{ $stock_data -> product_color }} </td>
                                    <td> {{ $stock_data -> product_desc }} </td>
                                    <td> {{ $stock_data -> product_qnty }} </td>
                                    <td> {{ $stock_data -> product_cp }} </td>
                                    <td> {{ $stock_data -> product_sp }} </td>
                                    <td>
                                        @if ( is_null($stock_data->product_qnty) || ($stock_data->product_qnty)==0  )
                                            <i class="fa fa-times-circle text-danger" aria-hidden="true" title="Out of Stock"></i>
                                        @else
                                            <i class="fa fa-check-circle text-success" aria-hidden="true" title="In Stock"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="edit_stock/{{ $stock_data->id }}"><i class="fa fa-edit text-primary" aria-hidden="true" title="Edit / Update"></i></a> &nbsp &nbsp
                                        <a href="delete_stock/{{ $stock_data->id }}"><i class="fa fa-trash text-danger" id="delete_product" aria-hidden="true" title="Delete"></i></a>
                                    </td>
                                </tr>

                            @endforeach

                    </tbody>

                </table>

            </div>

            </div>

            @else
                    <div class="row">
                        <div class="alert alert-warning w-100" role="alert">
                            <p> No data found ! </p>
                        </div>
                    </div>
            @endif

            </div>
        </main>

            <!-------- MODAL FORM -------->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Stock</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="/store_stock" method="post">

                            @csrf

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Product ID / SKU </label>
                                <input type="text" name="product_sku" class="form-control" placeholder="eg. ABC123" id="inputDefault">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Product Name <span class="text-danger"><b>*</b></span></label>
                                <input type="text" name="product_name" class="form-control" maxlength="30" placeholder="Name of your Product" id="inputDefault" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelect1">Color</label>
                                <select class="form-control" id="exampleSelect1" name="product_color">
                                    <option value="-">Select Color</option>
                                    <option>Black</option>
                                    <option>Blue</option>
                                    <option>Brown</option>
                                    <option>Cream</option>
                                    <option>Golden</option>
                                    <option>Green</option>
                                    <option>Grey</option>
                                    <option>Maroon</option>
                                    <option>Orange</option>
                                    <option>Pink</option>
                                    <option>Purple</option>
                                    <option>Red</option>
                                    <option>Violet</option>
                                    <option>White</option>
                                    <option>Yellow</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea">Description</label>
                                <textarea class="form-control" name="product_desc" id="exampleTextarea" rows="3" placeholder="Enter Product's Description / Comment / Remark"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Quantity <span class="text-danger"><b>*</b></span></label>
                                <input type="number" name="product_qnty" class="form-control" value="0" placeholder="Enter Number of Quantity in Pieces/Packets/Cartons" id="inputDefault" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Cost Price (₹)</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" name="product_cp" value="-" class="form-control" placeholder="Cost Price per Quantity" step=".01" id="inputDefault">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Selling Price (₹)</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" name="product_sp" class="form-control" placeholder="Selling Price per Quantity" step=".01" id="inputDefault">
                                </div>
                            </div>

                            <small><span class="text-danger"><b>*</b></span> Mandatory Fields</small>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary rounded-0" name="save">Add Product</button>
                        </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>




<script>
        function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                 } else {
                tr[i].style.display = "none";
                }
            }
        }
    }
</script>

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


<script>

    function myFunctionFilterOutOfStock() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        // input = document.getElementById("myInputFilter").innerText;
        input = "<?php echo " 0 "; ?>";
        filter = input.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

</script>



</body>
</html>
