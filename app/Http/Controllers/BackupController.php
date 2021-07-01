<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Table;

class BackupController extends Controller
{

    public function index()
    {
        $created_by = Auth::id();

        $stock_detail = DB::select('SELECT product_sku, product_name, product_color, product_desc, product_qnty, product_cp, product_sp FROM stocks WHERE created_by =' .$created_by);
        $stock_detail = json_decode(json_encode($stock_detail), true);

        $client_detail = DB::select('SELECT client_name, client_shop_street, client_city_town, client_pincode, client_contact1, client_contact2, client_email, client_total_amt, client_paid_amt FROM clients WHERE created_by =' .$created_by);
        $client_detail = json_decode(json_encode($client_detail), true);

        $invoice_detail = DB::select('SELECT client_name, client_shop_street, client_city_town, client_pincode, client_contact1, client_contact2, client_email, client_total_amt, client_paid_amt FROM clients WHERE created_by =' .$created_by);
        $invoice_detail = json_decode(json_encode($invoice_detail), true);

        return view('backup_data')->with('stock_detail', $stock_detail)
                                        ->with('client_detail', $client_detail)
                                        ->with('invoice_detail', $invoice_detail);
    }

    public function downloadStocksData()
    {

        $created_by = Auth::id();
        $stock_detail = DB::select('SELECT product_sku, product_name, product_color, product_desc, product_qnty, product_cp, product_sp, created_at, updated_at FROM stocks WHERE created_by =' .$created_by.' ORDER BY created_at DESC');
        $stock_detail = json_decode(json_encode($stock_detail), true);

        $filename = 'ims_stocks_backup.csv';
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename= $filename");

        $output = fopen("php://output", "w");

//        $header = array_keys($stock_detail[0]);
        $header = array('Product ID/SKU', 'Product Name', 'Product Color', 'Product Description', 'Product Quantity', 'Product Cost Price', 'Product Selling Price', 'Created at', 'Updated at');


        fputcsv($output, $header);

        foreach($stock_detail as $row)
        {
            fputcsv($output, $row);
        }

        fclose($output);

    }

    public function downloadClientsData()
    {

        $created_by = Auth::id();
        $client_detail = DB::select('SELECT client_name, client_shop_street, client_city_town, client_pincode, client_desc, client_contact1, client_contact2, client_email, client_total_amt, client_paid_amt, created_at, updated_at FROM clients WHERE created_by =' .$created_by.' ORDER BY created_at DESC');
        $client_detail = json_decode(json_encode($client_detail), true);

            $filename = 'ims_clients_backup.csv';
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename= $filename");

            $output = fopen("php://output", "w");

//            $header = array_keys($client_detail[0]);
            $header = array('Client Name', 'Client Shop/Street', 'Client City/Town', 'Client Pincode','Comments', 'Client Contact 1', 'Client Contact 2', 'Client Email', 'Client Total Amount', 'Client Paid Amount' , 'Created at', 'Updated at');
            fputcsv($output, $header);

            foreach($client_detail as $row)
            {
                fputcsv($output, $row);
            }

            fclose($output);
        }

    public function downloadInvoiceData()
    {

        $created_by = Auth::id();
        $invoice_detail = DB::select('SELECT invoice_number, client_name, grand_total, invoice_date, created_at FROM invoice WHERE created_by =' .$created_by.' ORDER BY created_at DESC');
        $invoice_detail = json_decode(json_encode($invoice_detail), true);

        $filename = 'ims_invoice_data_backup.csv';
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename= $filename");

        $output = fopen("php://output", "w");

//        $header = array_keys($invoice_detail[0]); //working
        $header = array('Invoice Number', 'Client Name', 'Grand Total', 'Invoice Date', 'Created at');

        fputcsv($output, $header);

        foreach($invoice_detail as $row)
        {
            fputcsv($output, $row);
        }

        fclose($output);
    }

    public function downloadInvoiceProducts()
    {

        $created_by = Auth::id();
        $invoice_products = DB::select('SELECT invoice_number, product_sku, product_name, product_qnty, product_sp, gst_perc, tax_perc, disc_perc, final_price FROM invoiceproducts WHERE created_by =' .$created_by.' ORDER BY created_at DESC');
        $invoice_products = json_decode(json_encode($invoice_products), true);

        $filename = 'ims_invoice_products_backup.csv';
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename= $filename");

        $output = fopen("php://output", "w");

//        $header = array_keys($invoice_detail[0]); //working
        $header = array('Invoice Number', 'Product ID/SKU', 'Product Name/Color', 'Product Quantity', 'Product Selling Price', 'GST%', 'Tax%', 'Discount%', 'Total');

        fputcsv($output, $header);

        foreach($invoice_products as $row)
        {
            fputcsv($output, $row);
        }

        fclose($output);

    }


}
