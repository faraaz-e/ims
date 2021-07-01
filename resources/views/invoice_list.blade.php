@include('header')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div class="container">

                <div class="row">

                    <div class="col-md-2">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h4>Invoice List</h4>
                        </div>
                    </div>

                    @if( !empty( $invoice_list ) )
                    <div class="col-md-5">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <input type="text" class="form-control" id="myInputNumber" onkeyup="myFunctionNumber()" placeholder="&#128269; Search by Invoice Number">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <input type="text" class="form-control" id="myInputName" onkeyup="myFunctionName()" placeholder="&#128269; Search by Client Name">
                        </div>
                    </div>
                    @endif

                </div>

                @if(session('delete_invoice'))
                    <div class="row p-2">
                        <div class="alert alert-success w-100 timeout" role="alert">
                            {{session('delete_invoice')}}
                        </div>
                    </div>
                @endif

                @if( !empty($invoice_list) )

                    <?php $i=0; ?>

                <div class="row">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped table-sm animated animatedFadeInRight fadeInRight" id="myTable">

                            <thead style="background-color: #80bdff">
                            <tr class="text-center">
                                <th>Sr No.</th>
                                <th>Invoice No.</th>
                                <th>Client Name</th>
                                <th>Grand Total</th>
                                <th>Invoice Date</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $invoice_list as $invoice_list )

                            <tr class="text-center">
                                <td> <?php ++$i;
                                        echo $i; ?>
                                </td>
                                <td><i class="fa fa-file-pdf-o text-danger" aria-hidden="true" title="View File"></i> &nbsp <a href="show_invoice/{{ $invoice_list['invoice_number'] }}">{{ $invoice_list['invoice_number'] }}</a> </td>
                                <td> {{ $invoice_list['client_name'] }} </td>
                                <td> {{ $invoice_list['grand_total'] }} </td>
                                <td> {{ $invoice_list['invoice_date'] }} </td>
                                <td> {{ $invoice_list['created_at'] }} </td>
                                <td>
                                    <a href="delete_invoice/{{ $invoice_list['id'] }}"><i class="fa fa-trash text-danger" id="delete_invoice" aria-hidden="true" title="Delete"></i></a>
                                </td>
                            </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div> <!-- END OF SECOND ROW -->

                @else

                    <div class="row p-2">
                        <div class="alert alert-warning w-100" role="alert">
                            <p> No data found ! </p>
                        </div>
                    </div>

                @endif


            </div>
        </main>


<script>

    function myFunctionNumber() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInputNumber");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
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

    function myFunctionName() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInputName");
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
    $("document").ready(function(){
        setTimeout(function(){
            $("div.timeout").remove();
        }, 3000 ); // 3 secs

    });
</script>




