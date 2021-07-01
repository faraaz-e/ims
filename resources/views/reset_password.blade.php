@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header" style="background-color: #9561e2; color: white">Reset Password</div>

                    <div class="card-body">
                        <form method="post" action="/change_password">

                            @csrf

                            <div class="row form-group">
                                <label for="email" class="col-md-4 col-form-label">New Password <span class="text-danger"><b>*</b></span></label>
                                <input type="password" name="new_password" id="newPassword" minlength="8" class="col-md-6 form-control" placeholder="Enter new password" required>
                            </div>

                            <div class="row form-group">
                                <label class="col-md-4 col-form-label" for="inputDefault">Confirm Password <span class="text-danger"><b>*</b></span></label>
                                <input type="password" id="confirmPassword" class="col-md-6 form-control" minlength="8" placeholder="Re-enter your password" required>
                            </div>

                            <div class="row justify-content-center">
                                <label id="message"></label>
                            </div>

                            <div class="row justify-content-center">
                                <button class="btn btn-info" type="submit" id="button" disabled>Set Password</button> &nbsp
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#newPassword, #confirmPassword').on('keyup', function (){
           if( ( $('#newPassword').val() == $('#confirmPassword').val() ) )
           {
               $('#message').html('Password matched.').css('color', 'green');
               $('#button').attr("disabled", false);
           }
           else{
               $('#message').html('Password did not matched in both fields').css('color', 'red');
               $('#button').attr("disabled", true);
            }
        });
    </script>

@endsection

