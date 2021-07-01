<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoice_list = DB::select("SELECT * FROM invoice WHERE created_by =" .Auth::id(). ' ORDER BY created_at DESC');
        $invoice_list = json_decode(json_encode($invoice_list), true);
        return view('invoice_list')->with('invoice_list', $invoice_list);
    }

    public function create()
    {
        $created_by = Auth::id();
        $invoice_data = DB::select('SELECT * FROM stocks WHERE product_qnty > 0 AND created_by='.$created_by.' ORDER BY product_name');
        $invoice_data = json_decode(json_encode($invoice_data), true);

        //USER'S ADDRESS
        $account_data = DB::select('SELECT * FROM account WHERE created_by='.$created_by);
        $account_data = json_decode(json_encode($account_data), true);

        return view('create_invoice')->with('invoice_data', $invoice_data)->with('account_data', $account_data);
    }

    public function custom()
    {
        return view('custom_invoice');
    }

    public function showInvoice($invoice_number)
    {

        $invoice_data = DB::table('invoice')->select('*')
                                ->where('invoice_number', '=', $invoice_number)
                                ->get();
        $invoice_products = DB::table('invoiceproducts')->select('*')
                                ->where('invoice_number', '=', $invoice_number)
                                ->get();

        $invoice_data = json_decode(json_encode($invoice_data), 'true');
        $invoice_products = json_decode(json_encode($invoice_products), 'true');

//        echo '<pre>';
//        print_r($invoice_data);
//        die;

        return view('show_invoice')->with('invoice_data', $invoice_data)
                                        ->with('invoice_products', $invoice_products);
    }

    // MY_ACCOUNT FUNCTIONS FOR INVOICE DATA

    public function editaccount()
    {
        $count = DB::table('account')->where('created_by', '=', Auth::id())->count();

        if( $count == 0 )
        {
            DB::table('account')->insert(['created_by' => Auth::id()]);
        }

        $created_by = Auth::id();
        $account_data = DB::select('SELECT * FROM account WHERE created_by =' . $created_by);
        $account_data = json_decode(json_encode($account_data), true);

        return view('my_account')->with('account_data', $account_data);

    }

    public function update(Request $request)
    {
        $my_firstname = $request->input("my_firstname");
        $my_lastname = $request->input("my_lastname");
        $my_shop_street = $request->input("my_shop_street");
        $my_town_city = $request->input("my_town_city");
        $my_pincode = $request->input("my_pincode");
        $my_contact1 = $request->input("my_contact1");
        $my_contact2 = $request->input("my_contact2");
        $my_email = $request->input("my_email");
        $my_gst = $request->input("my_gst");
        $created_by = Auth::id();

        $updateaccountdata = array(
                                    'my_firstname' => $my_firstname,
                                    'my_lastname' => $my_lastname,
                                    'my_shop_street' => $my_shop_street,
                                    'my_town_city' => $my_town_city,
                                    'my_pincode' => $my_pincode,
                                    'my_contact1' => $my_contact1,
                                    'my_contact2' => $my_contact2,
                                    'my_email' => $my_email,
                                    'my_gst' => $my_gst
        );

        DB::table('account')
            ->where('created_by','=', $created_by)
            ->update( $updateaccountdata );

        return redirect('/my_account')->with('update_message', 'Profile Updated Successfully.');
    }

    public function deleteInvoice($id)
    {
        DB::delete('DELETE FROM invoice WHERE id='.$id);

        return redirect('invoice_list')->with('delete_invoice','Invoice deleted Successfully.');
    }


    public function invoiceDataProcess(Request $request)
    {

        $invoice_number = $request->get('invoiceNo');
        $invoice_date = $request->get('invoiceDate');
        $my_address = $request->get('myAddress');
        $client_name = $request->get('clientName');
        $client_address = $request->get('clientAddress');
        $shipping_address = $request->get('shippingAddress');
        $subtotal = $request->get('subtotal');
        $shipping_cost = $request->get('shippingCost');
        $grand_total = $request->get('grandTotal');
        $id_qnty_array = $request->get('arr');

        //Insert invoice details
        DB::insert('INSERT INTO invoice (invoice_number, invoice_date, my_address, client_name,
                    client_address, shipping_address, subtotal, shipping_cost, grand_total, created_by)
                    VALUES (?,?,?,?,?,?,?,?,?,?)' , [$invoice_number, $invoice_date, $my_address, $client_name,
            $client_address, $shipping_address, $subtotal, $shipping_cost, $grand_total, Auth::id()]);


        //retrieved all values from 2d array (made indexed array)
        $id_qnty_array = call_user_func_array('array_merge', $id_qnty_array);
        $array_values = array_values($id_qnty_array);

        $desired_array = array();

        for ($i=0; $i < count($array_values); $i++)
        {
            array_push($desired_array, array('id' => $array_values[$i],
                                                'product_qnty' => $array_values[++$i],
                                                'product_sku' => $array_values[++$i],
                                                'product_name' => $array_values[++$i],
                                                'product_sp' => $array_values[++$i],
                                                'gst_perc' => $array_values[++$i],
                                                'tax_perc' => $array_values[++$i],
                                                'disc_perc' => $array_values[++$i],
                                                'final_price' => $array_values[++$i],
            ));
        }


        foreach ($desired_array as $array)
        {
            //Deduct data from stocks
            DB::statement('UPDATE stocks SET product_qnty = product_qnty -'.$array['product_qnty']. ' WHERE id =' .$array['id'] );
        }



        foreach ($desired_array as $desired_array)
        {
            //insert product list in invoiceproducts table
            DB::insert('INSERT INTO invoiceproducts (invoice_number, product_id, product_sku, product_name, product_qnty,
                    product_sp ,gst_perc, tax_perc, disc_perc, final_price, created_by)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?)' , [$invoice_number, $desired_array['id'], $desired_array['product_sku'],
                $desired_array['product_name'], $desired_array['product_qnty'], $desired_array['product_sp'],
                $desired_array['gst_perc'], $desired_array['tax_perc'],
                $desired_array['disc_perc'], $desired_array['final_price'], Auth::id()]);
        }

        return $desired_array;

    }

}
