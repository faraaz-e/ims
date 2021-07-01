@include('header')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="container">

        <div class="row">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4>Client Detail</h4>
            </div>


            <div class="container-fluid shadow animated animatedFadeInUp fadeInUp animation-delay2">

                <div class="row p-2 justify-content-end">
                    <a href="/edit_client/{{ $client_detail[0]['id'] }}"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true" title="Edit / Update"></i>&nbsp Edit</button></a>&nbsp &nbsp
                    <a href="/delete_client/{{ $client_detail[0]['id'] }}"><button class="btn btn-danger btn-sm" id="delete_client"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i>&nbsp Delete</button></a>&nbsp
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey">Client Name : </span> &nbsp {{ $client_detail[0]['client_name'] }}</p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey">Address : </span> <br>
                                <span style="color: darkslategrey; font-weight: 500">Shop/Street/Lane : &nbsp</span> {{ $client_detail[0]['client_shop_street'] }} <br>
                                <span style="color: darkslategrey; font-weight: 500">Town/City : &nbsp</span>  {{ $client_detail[0]['client_city_town'] }} <br>
                                <span style="color: darkslategrey; font-weight: 500">Pincode : &nbsp</span>  {{ $client_detail[0]['client_pincode'] }} <br>
                            </p>
                        </div>

                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey">Comments/Remark : </span> &nbsp {{ $client_detail[0]['client_desc'] }} </p>
                        </div>

                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey">Contact : </span> &nbsp {{ $client_detail[0]['client_contact1'] }} </p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey">Alternate Contact : </span> &nbsp {{ $client_detail[0]['client_contact2'] }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 border-left">
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey">Client Email : </span> &nbsp {{ $client_detail[0]['client_email'] }} </p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey"> Total Payment : </span> &nbsp ₹ {{ $client_detail[0]['client_total_amt'] }} </p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey"> Paid Payment : </span> &nbsp ₹ {{ $client_detail[0]['client_paid_amt'] }} </p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey"> Pending Payment : </span> &nbsp ₹ {{ ($client_detail[0]['client_total_amt']) - ($client_detail[0]['client_paid_amt']) }} </p>
                        </div>
                        <div class="row p-2 border-bottom">
                            <p><span class="font-weight-bold" style="color: darkslategrey"> Client Added On : </span> &nbsp {{ date('d M Y H:i:s', strtotime($client_detail[0]['created_at']) ) }}  </p>
                        </div>
                        <div class="row p-2">
                            <p><span class="font-weight-bold" style="color: darkslategrey"> Client Updated On : </span> &nbsp {{ date('d M Y H:i:s', strtotime($client_detail[0]['updated_at']) ) }} </p>
                        </div>
                    </div>
                </div>


            </div>


        </div> <!-- END OF FIRST ROW -->
    </div>
</main>

<script>
    $(document).ready(function(){
        $('#delete_client').click(function (){
            var temp = confirm("Are you sure, you want to DELETE this Client ?");
            if( temp == false ){
                return false;
            }
        });
    });
</script>

