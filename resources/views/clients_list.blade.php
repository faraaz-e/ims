@include('header')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div class="container">

                <div class="row">
                    <div class="col-md-3">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h4>Clients List</h4>
                        </div>
                    </div>

                    @if( !empty($clients_list_data) )
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="&#128269; Search for Client Name">
                        </div>
                    </div>
                    @endif
                    <div class="col-md-3">
                        <div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3">
                            <button class="btn btn-outline-primary btn-sm rounded-0" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp Add Client</button>
                        </div>
                    </div>
                </div>

                    @if(session('update_message'))
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
                            }, 5000 ); // 5 secs

                        });
                    </script>




                @if( !empty($clients_list_data) )

                    <?php
                    $i=0;
                    ?>

                <div class="row">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-sm animated animatedFadeInRight fadeInRight" id="myTable">

                            <thead>
                            <tr class="text-center" style="background-color: #94f2d6">
                                <th>Sr.</th>
                                <th>Client Name</th>
                                <th width="15%">Address</th>
                                <th>Town/City</th>
                                <th>Comments</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Total (₹)</th>
                                <th>Paid (₹)</th>
                                <th>Balance (₹)</th>
                                <th>Manage</th>
                            </tr>
                            </thead>

                            <tbody>

                                @foreach( $clients_list_data as $clients_data )
                                    <tr class="text-center">
                                        <td>
                                            <?php
                                            ++$i;
                                            echo $i ;
                                            ?>
                                        </td>
                                        <td><a href="client_detail/{{ $clients_data -> id }}"> {{ $clients_data -> client_name }} </a></td>
                                        <td> {{ $clients_data -> client_shop_street }}<br>
                                        </td>
                                        <td> {{ $clients_data -> client_city_town }} <br>
                                             {{ $clients_data -> client_pincode }}
                                        </td>
                                        <td> {{ $clients_data -> client_desc }} </td>
                                        <td>
                                                {{ $clients_data -> client_contact1 }}<br>
                                                {{ $clients_data -> client_contact2 }}
                                        </td>
                                        <td> {{ $clients_data -> client_email }} </td>
                                        <td> {{ $clients_data -> client_total_amt }} </td>
                                        <td> {{ $clients_data -> client_paid_amt }} </td>

                                        <td> <?php
                                                $client_pending_amt = ($clients_data->client_total_amt) - ($clients_data->client_paid_amt);
                                                echo $client_pending_amt;
                                            ?>
                                        </td>
                                        <td>
                                            <a href="edit_client/{{ $clients_data->id }}"><i class="fa fa-edit text-primary" aria-hidden="true" title="Edit / Update"></i></a>&nbsp &nbsp
                                            <a href="delete_client/{{ $clients_data->id }}"><i class="fa fa-trash text-danger" aria-hidden="true" title="Delete" id="alert_btn"></i></a>&nbsp
                                        </td>


                                     </tr>
                                        @endforeach


                            </tbody>
                        </table>
                    </div>
                    </div>

                @else
                    <div class="row p-2">
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
                            <form action="/store_clients" method="post">

                                @csrf

                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault">Client Name <span class="text-danger"><b>*</b></span></label>
                                    <input type="text" class="form-control" placeholder="Name of your Client / Consumer" name="client_name" id="inputDefault">
                                </div>

                                <label class="col-form-label" for="inputDefault">Address</label>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault"><i> Shop & Street / Lane </i></label>
                                    <input type="text" class="form-control" placeholder="eg. ABC Collection, XYZ Road" name="client_shop_street" id="inputDefault">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault"><i> Town / City </i></label>
                                    <input type="text" class="form-control" placeholder="eg. Andheri" name="client_city_town" id="inputDefault">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault"><i> Pin Code </i></label>
                                    <input type="number" class="form-control" placeholder="Enter 6-digits Pin Code" name="client_pincode" id="inputDefault" maxlength="6">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault"> Comments/Remarks </label>
                                    <textarea class="form-control" rows="2" placeholder="Enter Description/Comments/Remarks" name="client_desc" id="inputDefault"></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault">Contact No. </label>
                                    <input type="number" class="form-control" placeholder="Enter 10-digits phone number" name="client_contact1" id="inputDefault" min-length="10" maxlength="10">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault"> Alternate Contact No. </label>
                                    <input type="number" class="form-control" placeholder="Enter 10-digits phone number" name="client_contact2" id="inputDefault" min-length="10" maxlength="10">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault"> Email </label>
                                    <input type="email" class="form-control" placeholder="eg. example@domain.com" name="client_email" id="inputDefault">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault">Total Payment (₹)</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" placeholder="Total Amount to be paid by Client/Consumer" name="client_total_amt" step=".01" id="inputDefault">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault">Paid Payment (₹)</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" placeholder="Amount paid by Client/Consumer from Total Amount" name="client_paid_amt" step=".01" id="inputDefault">
                                    </div>
                                </div>


                                <small><span class="text-danger"><b>*</b></span> Mandatory Fields</small>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary rounded-0">Add Client</button>
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
</script>

