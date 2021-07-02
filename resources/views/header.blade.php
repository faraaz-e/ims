<?php
if( Auth::id() == NULL )
{
    return redirect('login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- OFFLINE ASSETS LINK -->
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('font-awesome-4.7.0/css/font-awesome.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('js/jquery-3.6.0.slim.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('chart.js/dist/Chart.js') }}"></script>


    <!-- ONLINE ASSETS LINK -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js">
    <link src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">

    <!-- FOR CHART JS -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="node_modules/chartjs/dist/Chart.js"></script>

    <link rel="icon" href="{{ asset('ims-favicon.png') }}" type="image/gif" sizes="16x16">
    <title> IMS | Inventory Management System </title>

    <style>

        a{
            color: #333333;
            font-weight: 500;
        }
        .active{
            color: #005cbf ;
        }



        /******** ANIMATIONS *********/

        /* FADE-IN-UP ANIMATION */

        @keyframes fadeInUp {
            from {
                transform: translate3d(0,60px,0)
            }

            to {
                transform: translate3d(0,0,0);
                opacity: 1
            }
        }

        @-webkit-keyframes fadeInUp {
            from {
                transform: translate3d(0,60px,0)
            }

            to {
                transform: translate3d(0,0,0);
                opacity: 1
            }
        }

        .animated {
            animation-duration: 0.5s;
            animation-fill-mode: both;
            -webkit-animation-duration: 0.5s;
            -webkit-animation-fill-mode: both
        }

        .animatedFadeInUp {
            opacity: 0
        }

        .fadeInUp {
            opacity: 0;
            animation-name: fadeInUp;
            -webkit-animation-name: fadeInUp;
        }

        /* FADE-IN-LEFT ANIMATION */

        @keyframes fadeInLeft {
            from {
                transform: translate3d(-60px,0,0)
            }

            to {
                transform: translate3d(0,0,0);
                opacity: 1
            }
        }

        @-webkit-keyframes fadeInLeft {
            from {
                transform: translate3d(-60px,0,0)
            }

            to {
                transform: translate3d(0,0,0);
                opacity: 1
            }
        }

        .animatedFadeInLeft {
            opacity: 0
        }

        .fadeInLeft {
            opacity: 0;
            animation-name: fadeInLeft;
            -webkit-animation-name: fadeInLeft;
        }

        /* FADE-IN-RIGHT ANIMATION */

        @keyframes fadeInRight {
            from {
                transform: translate3d(60px,0,0)
            }

            to {
                transform: translate3d(0,0,0);
                opacity: 1
            }
        }

        @-webkit-keyframes fadeInRight {
            from {
                transform: translate3d(60px,0,0)
            }

            to {
                transform: translate3d(0,0,0);
                opacity: 1
            }
        }

        .animatedFadeInRight {
            opacity: 0
        }

        .fadeInRight {
            opacity: 0;
            animation-name: fadeInRight;
            -webkit-animation-name: fadeInRight;
        }

        .animation-delay{
            animation-delay: 0.15s;
        }
        .animation-delay2{
            animation-delay: 0.20s;
        }
        .animation-delay3{
            animation-delay: 0.25s;
        }
        .animation-delay4{
            animation-delay: 0.30s;
        }
        .animation-delay5{
            animation-delay: 0.35s;
        }
        .animation-delay6{
            animation-delay: 0.40s;
        }


        th, td {
            vertical-align: middle !important;
        }

    </style>

</head>

<body>

<script>
    var wintimeout;

    function SetWinTimeout() {
        wintimeout = window.setTimeout("window.location.href='../logout';",900000); //after 5 mins i.e. 5 * 60 * 1000
    }
    $('body').click(function() {

        window.clearTimeout(wintimeout); //when user clicks remove timeout and reset it

        SetWinTimeout();

    });
    $('body').mousemove(function() {

        window.clearTimeout(wintimeout); //when user clicks remove timeout and reset it

        SetWinTimeout();

    });
    SetWinTimeout();
</script>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-1 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/">
            <img src="{{ asset('ims-favicon.png') }}" height="25px" width="auto" alt="ims-logo">&nbsp
            Inventory <span class="text-warning font-weight-bold" style="font-size: 10px"> by Faraaz Electricwala </span></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

{{--        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">--}}
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <h6 class="text-warning" href="#">Hi, {{ Auth::user()->name }}</h6>
            </li>

        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse position-fixed bg-light border-right">
                <div class="sidebar-sticky pt-3 ">
                    <ul class="nav flex-column">
                        <li class="nav-item pb-0 animated animatedFadeInLeft fadeInLeft animation-delay">
                            <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="/">
                                <i class="fa fa-home" aria-hidden="true"></i>&nbsp
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item pb-0 animated animatedFadeInLeft fadeInLeft animation-delay">
                        <a class="nav-link {{ (request()->is('stock_list*')) ? 'active' : '' }}" href="/stock_list">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp
                                Stock List
                            </a>
                        </li>

                        <li class="nav-item pb-0 animated animatedFadeInLeft fadeInLeft animation-delay2">
                            <a class="nav-link {{ (request()->is('add_stock*')) ? 'active' : '' }}" href="/add_stock">
                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp
                                Add Stock
                            </a>
                        </li>


                        <li class="nav-item border-top pb-0 animated animatedFadeInLeft fadeInLeft animation-delay2">
                            <a class="nav-link {{ (request()->is('invoice_list*')) ? 'active' : '' }}" href="/invoice_list">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp
                                Invoice List
                            </a>
                        </li>
                        <li class="nav-item pb-0 animated animatedFadeInLeft fadeInLeft animation-delay3">
                            <a class="nav-link {{ (request()->is('create_invoice*')) ? 'active' : '' }}" href="/create_invoice">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp
                                Create Invoice
                            </a>
                        </li>
                        <li class="nav-item pb-0 animated animatedFadeInLeft fadeInLeft animation-delay3">
                            <a class="nav-link {{ (request()->is('custom_invoice*')) ? 'active' : '' }}" href="/custom_invoice">
                                <i class="fa fa-file-o" aria-hidden="true"></i>&nbsp
                                Custom Invoice
                            </a>
                        </li>
                        <li class="nav-item border-top pb-0 animated animatedFadeInLeft fadeInLeft animation-delay4">
                            <a class="nav-link {{ (request()->is('clients_list*')) ? 'active' : '' }}" href="/clients_list">
                                <i class="fa fa-users" aria-hidden="true"></i>&nbsp
                                Clients List
                            </a>
                        </li>
                        <li class="nav-item pb-0 animated animatedFadeInLeft fadeInLeft animation-delay4">
                            <a class="nav-link {{ (request()->is('add_clients*')) ? 'active' : '' }}" href="/add_clients">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp
                                Add Clients
                            </a>
                        </li>
                        <li class="nav-item border-top pb-0 animated animatedFadeInLeft fadeInLeft animation-delay5">
                            <a class="nav-link {{ (request()->is('backup_data*')) ? 'active' : '' }}" href="/backup_data">
                                <i class="fa fa-refresh" aria-hidden="true"></i>&nbsp
                                Backup Data
                            </a>
                        </li>
                        <li class="nav-item pb-0 animated animatedFadeInLeft fadeInLeft animation-delay5">
                            <a class="nav-link {{ (request()->is('settings*')) ? 'active' : '' }}" href="/settings">
                                <i class="fa fa-gear" aria-hidden="true"></i>&nbsp
                                Settings
                            </a>
                        </li>
                        <li class="nav-item border-top pb-0 animated animatedFadeInLeft fadeInLeft animation-delay5">
                            <a class="nav-link {{ (request()->is('my_account*')) ? 'active' : '' }}" href="/my_account">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp
                                My Account
                            </a>
                        </li>
                        <li class="nav-item pb-0 animated animatedFadeInLeft fadeInLeft animation-delay5">
                            <a class="nav-link {{ (request()->is('about_software*')) ? 'active' : '' }}" href="/about_software">
                                <i class="fa fa-laptop" aria-hidden="true"></i>&nbsp
                                About
                            </a>
                        </li>
                        <li class="nav-item pb-0 animated animatedFadeInLeft fadeInLeft animation-delay6">
                            <a class="nav-link {{ (request()->is('faqs*')) ? 'active' : '' }}" href="/faqs">
                                <i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbsp
                                FAQs
                            </a>
                        </li>
                        <li class="nav-item pb-0 animated animatedFadeInLeft fadeInLeft animation-delay6">
                            <a class="nav-link text-danger" href="{{ route('logout') }}" method="POST">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp
                                Logout
                            </a>
                        </li>
                    </ul>


                </div>

            </nav>
