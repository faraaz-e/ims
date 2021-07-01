@include('header')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Settings</h4>
    </div>

    @if(session('settings_update_msg'))
        <div class="row p-2">
            <div class="alert alert-success w-100" role="alert">
                {{session('settings_update_msg')}}
            </div>
        </div>
    @endif


    <div class="card animated animatedFadeInUp fadeInUp animation-delay shadow" style="width:100%; border-radius: 0%">

        <div class="container-fluid bg-transparent">

            <form class="p-2" action="/update_settings" method="post">
                @csrf
                <div class="row animated animatedFadeInUp fadeInUp animation-delay2">

{{--                    @foreach($settings_data as $settings_data)--}}

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault"> Name <span class="text-danger"><b>*</b></span></label>
                                <input type="text" class="form-control" name="name" value="{{ $user_data[0]['name'] }}" placeholder="Enter your name" required>
                                <small class="text-info"> This is your name associated to your Logged in Account.</small>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault"> Security Key <span class="text-danger"><b>*</b></span></label>
                                <input type="password" class="form-control" id="securityKey" name="security_key" value="{{ $user_data[0]['security_key'] }}" placeholder="Enter your Security Key" required>
                                <small class="text-info"> Security key is used to recover your account, when you forget your password.</small>
                                <br>
                                <small><input type="checkbox" onclick="myFunction()">&nbsp Show security key</small>
                            </div>

                        </div>


{{--                    @endforeach--}}

                </div> <!--END OF FIRST ROW -->

                <div class="row justify-content-end">
                    <button class="btn btn-primary" type="submit">Update Settings</button>&nbsp
                </div>

            </form>

        </div> <!-- END OF CONTAINER-FLUID -->
    </div> <!-- END OF CARD -->

</main>

</div>

</div>

</body>

<script>
    function myFunction(){
        var x = document.getElementById("securityKey");
        if( x.type === "password" )
        {
            x.type = "text";
        }else {
            x.type = "password";
        }
    }
</script>

<script>
    $("document").ready(function(){
        setTimeout(function(){
            $("div.alert").remove();
        }, 5000 ); // 5 secs

    });
</script>


</html>
