@include('header')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>My Account</h4>
    </div>

        @if(session('update_message'))
            <div class="row p-2">
                <div class="alert alert-success w-100" role="alert">
                    {{session('update_message')}}
                </div>
            </div>
        @endif

        <script>
            $("document").ready(function(){
                setTimeout(function(){
                    $("div.alert").remove();
                }, 5000 ); // 5 secs

            });
        </script>


    <div class="card animated animatedFadeInUp fadeInUp animation-delay shadow" style="width:100%; border-radius: 0%">

        <div class="container-fluid bg-transparent">

            <form class="p-2" action="/update" method="post">
            @csrf
                <div class="row animated animatedFadeInUp fadeInUp animation-delay2">

                    @foreach($account_data as $account_data)

                    <div class="col-lg-6">

                        <div class="form-group">
                            <label class="col-form-label" for="inputDefault"> First Name</label>
                            <input type="text" class="form-control" placeholder="Enter your Name" value="{{$account_data['my_firstname']}}" name="my_firstname">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="inputDefault"> Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter your Surname" value="{{$account_data['my_lastname']}}" name="my_lastname">
                        </div>

                        <label class="col-form-label" for="inputDefault">Shop/Office Address</label>

                        <div class="form-group">
                            <label class="col-form-label" for="inputDefault"><i> Shop & Street / Lane </i></label>
                            <input type="text" class="form-control" placeholder="eg. ABC Collection, XYZ Road" value="{{$account_data['my_shop_street']}}" name="my_shop_street">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="inputDefault"><i> Town / City </i></label>
                            <input type="text" class="form-control" placeholder="eg. Andheri" value="{{$account_data['my_town_city']}}" name="my_town_city">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="inputDefault"><i> Pin Code </i></label>
                            <input type="number" class="form-control" placeholder="Enter 6-digits Pin Code" value="{{$account_data['my_pincode']}}" name="my_pincode">
                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="form-group">
                            <label class="col-form-label" for="inputDefault">Contact 1 </label>
                            <input type="number" class="form-control" placeholder="Enter 10-digits phone number" value="{{$account_data['my_contact1']}}" name="my_contact1" min-length="10" maxlength="10">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="inputDefault">Contact 2 </label>
                            <input type="number" class="form-control" placeholder="Enter 10-digits phone number" value="{{$account_data['my_contact2']}}" name="my_contact2" min-length="10" maxlength="10">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="inputDefault"> Email </label>
                            <input type="email" class="form-control" placeholder="eg. example@domain.com" value="{{$account_data['my_email']}}" name="my_email">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="inputDefault"> GST No. </label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">GSTIN</span>
                            <input type="number" class="form-control" placeholder="15-digit GST No." value="{{$account_data['my_gst']}}" name="my_gst" maxlength="15">
                            </div>
                        </div>

{{--                        <small><span class="text-danger"><b>*</b></span> Mandatory Fields</small><br>--}}
                        <small style="color: indianred"> Note: Address/Contact/Email will automatically display while creating Invoice </small>


                    </div>

                    @endforeach

                </div> <!--END OF FIRST ROW -->

                <div class="row justify-content-end">
                    <button class="btn btn-primary" type="submit">Update Account</button>&nbsp
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </div>

            </form>

{{--            <script>--}}
{{--                function updateRecord()--}}
{{--                {--}}
{{--                    var my_firstname = $('#my_firstname').val();--}}
{{--                    var my_lastname = $('#my_lastname').val();--}}
{{--                    var my_shop_street = $('#my_shop_street').val();--}}
{{--                    var my_town_city = $('#my_town_city').val();--}}
{{--                    var my_pincode = $('#my_pincode').val();--}}
{{--                    var my_contact1 = $('#my_contact1').val();--}}
{{--                    var my_contact2 = $('#my_contact2').val();--}}
{{--                    var my_email = $('#my_gst').val();--}}

{{--                    $.ajax({--}}
{{--                       url : "InvoiceController@account,--}}
{{--                       type : 'post',--}}
{{--                        data : {--}}
{{--                            my_firstname : my_firstname,--}}
{{--                            my_lastname : my_lastname,--}}
{{--                            my_shop_street : my_shop_street,--}}
{{--                            my_town_city : my_town_city,--}}
{{--                            my_pincode : my_pincode,--}}
{{--                            my_contact1 : my_contact1,--}}
{{--                            my_contact2 : my_contact2,--}}
{{--                            my_email : my_email--}}
{{--                        },--}}
{{--                        success : function(data, status){--}}
{{--                           // readRecords();--}}
{{--                        }--}}
{{--                    });--}}
{{--                }--}}
{{--            </script>--}}



        </div> <!-- END OF CONTAINER-FLUID -->
    </div> <!-- END OF CARD -->

</main>

</div>

</div>

</body>

</html>
