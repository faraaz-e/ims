@extends('layouts.app')

@section('content')

<div class="container">

        @if(session('wrong_credentials'))
            <div class="row p-2 justify-content-center">
                <div class="alert alert-danger w-100 timeout" role="alert">
                    {{session('wrong_credentials')}}
                </div>
            </div>
        @endif

            <script>
                $("document").ready(function(){
                    setTimeout(function(){
                        $("div.timeout").remove();
                    }, 4000 ); // 4 secs
                });
            </script>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header" style="background-color: #0062cc; color: white">Forgot Password ?</div>

                <div class="card-body">
                    <form method="post" action="/verify_key">

                        @csrf
                        @method('GET')

                        <div class="row form-group">
                            <label for="email" class="col-md-4 col-form-label">Email Address <span class="text-danger"><b>*</b></span></label>
                            <input type="email" name="email" class="col-md-6 form-control" placeholder="Email address of login" id="inputDefault" required>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4 col-form-label" for="inputDefault">Security Key <span class="text-danger"><b>*</b></span></label>
                            <input type="password" name="security_key" class="col-md-6 form-control" placeholder="Enter your security key" id="inputDefault" required>
                        </div>

                        <div class="row justify-content-center">
                            <button class="btn btn-primary" type="submit">Submit</button> &nbsp
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
