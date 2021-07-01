@include('header')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4>Add Client</h4>
            </div>

            @if(session('success'))
                <div class="row p-2">
                    <div class="alert alert-success w-100" role="alert">
                        {{session('success')}}
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

                    <form class="p-2" method="post" action="/store_clients">

                        @csrf

                        <div class="row animated animatedFadeInUp fadeInUp animation-delay2">
                            <div class="col-lg-6">

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

                                <small><span class="text-danger"><b>*</b></span> Mandatory Fields</small>

                            </div>

                            <div class="col-lg-6">

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


                            </div>

                        </div> <!--END OF FIRST ROW -->

                        <div class="row justify-content-end">
                            <button class="btn btn-primary" type="submit">Add Client</button>&nbsp
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>

                    </form>


                </div> <!-- END OF CONTAINER-FLUID -->
            </div> <!-- END OF CARD -->

        </main>

    </div>

</div>

</body>

</html>
