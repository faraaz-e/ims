@include('header')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="container">

        <div class="row">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4>Backup Data</h4>
            </div>

            <div class="container-fluid animated animatedFadeInUp fadeInUp animation-delay2">
                <br>
                <div class="row justify-content-center">
                    <div class="alert alert-warning" role="alert">
                        Download the Stocks (Products) Data that is created by you, this will export the &nbsp
                        <span class="text-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i></span>
                        &nbsp
                        CSV / Excel file.
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">

                    @if( count($stock_detail) > 0 )
                       <a href="download_stocks_data"><button class="btn btn-sm btn-warning">
                               Download Stocks Data
                           </button>
                       </a>
                    @else
                        <a href="download_stocks_data"><button class="btn btn-sm btn-warning" disabled>
                                No Stocks Data found
                            </button>
                        </a>
                    @endif
                </div>

                <br>
                <br>

                <div class="row justify-content-center">
                    <div class="alert alert-success" role="alert">
                        Download the Clients Data that is created by you, this will export the &nbsp
                        <span class="text-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i></span>
                        &nbsp
                        CSV / Excel file.
                    </div>
                </div>

                <br>

                <div class="row justify-content-center">
                    @if( count($client_detail) > 0 )
                        <a href="download_clients_data"><button class="btn btn-sm btn-success">
                            Download Clients Data
                        </button>
                        </a>
                    @else
                        <a href="download_clients_data"><button class="btn btn-sm btn-success" disabled>
                                No Clients Data found
                            </button>
                        </a>
                    @endif
                </div>

                <br>
                <br>

                <div class="row justify-content-center">
                    <div class="alert alert-danger" role="alert">
                        Download the Invoice data that is created by you, this will export the &nbsp
                        <span class="text-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i></span>
                        &nbsp CSV / Excel file.
                    </div>
                </div>

                <br>

                <div class="row justify-content-center">
                    @if( count($invoice_detail) > 0 )
                        <a href="download_invoice_data"><button class="btn btn-sm btn-danger">
                                Download Invoice List
                            </button>
                        </a> &nbsp &nbsp
                        <a href="download_invoice_products"><button class="btn btn-sm btn-danger">
                                Download Invoice Products
                            </button>
                        </a>
                    @else
                        <a href="download_invoice_data"><button class="btn btn-sm btn-danger" disabled>
                                No Invoice Data found
                            </button>
                        </a>
                    @endif
                </div>

            </div>
        </div>

    </div>
</main>


