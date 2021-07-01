<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Table;

class StockController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $created_by = Auth::id();
        $stock_list_data = DB::select( 'SELECT * FROM stocks WHERE created_by = '.$created_by.' ORDER BY created_at DESC');

        return view('stock_list')->with('stock_list_data', $stock_list_data);
    }

    public function dashboard()
    {
        $created_by = Auth::id();
        $out_of_stock_list = DB::select('SELECT * FROM stocks WHERE product_qnty = 0 AND created_by = '.$created_by);
        $out_of_stock_list = json_decode(json_encode($out_of_stock_list), true);

        $total_stock_count = DB::table('stocks')->where('created_by','=', $created_by)->count();

        $in_stock_count = DB::table('stocks')->where('product_qnty', '>',0)
                                                      ->where('created_by','=', $created_by)
                                                      ->count();

        $out_of_stock_count = DB::table('stocks')->where('product_qnty', '=', 0)
                                                       ->where('created_by','=', $created_by)
                                                       ->count();

        $low_stock_count = DB::table('stocks')->where('product_qnty', '<',11)
                                                    ->where('product_qnty', '>',0)
                                                    ->where('created_by','=', $created_by)
                                                    ->count();

        $total_invoice_count = DB::table('invoice')->select('*')
                                                        ->where('created_by','=', $created_by)
                                                        ->count();

        $in_stock_cp = DB::select(DB::raw("SELECT
                                                 SUM(stocks.product_qnty * stocks.product_cp) AS grand_total
                                                 FROM stocks WHERE product_qnty > 0 AND created_by =" .$created_by));
        $in_stock_cp = json_decode(json_encode($in_stock_cp), 'true');


        $client_total_pending_amt = DB::select(DB::raw("SELECT
                                                 SUM(clients.client_total_amt - clients.client_paid_amt) AS total_balance
                                                 FROM clients WHERE created_by =" .$created_by));
        $client_total_pending_amt = json_decode(json_encode($client_total_pending_amt), 'true');

        /////////// GETTING SALE DATA MONTH-WISE OF CURRENT YEAR

        $current_year = date("Y");

        $monthwise_sale = DB::select(DB::raw("SELECT SUM(grand_total), MONTH(created_at), YEAR(created_at)
                                                        FROM invoice WHERE YEAR(created_at) =".$current_year." AND created_by =".$created_by."
                                                        GROUP BY MONTH(created_at), YEAR(created_at)"));

        $monthwise_sale = json_decode(json_encode($monthwise_sale), 'true');


        //ENTERING VALUES FOR MISSING MONTHS

            $oldArr = $monthwise_sale;
            $newArr = array();

            for ($i = 1; $i <= 12; ++$i)
            {
                $new = array(
                    'SUM(grand_total)' => 0,
                    'MONTH(created_at)' => $i,
                );

            foreach($oldArr as $old) {
                if ($old['MONTH(created_at)'] == $i) {
                    $new['SUM(grand_total)'] = $old['SUM(grand_total)'];
                }
            }
            $newArr[] = $new;
            }

            //UNSET MONTH INDEX
            foreach ($newArr as $key => $subArr) {
                unset($subArr['MONTH(created_at)']);
                $newArr[$key] = $subArr;
            }

        //SEPERATING DATA WITH COMMAS

        $tempArray = array();
        foreach($newArr as $newArr)
        {
            $tempArray[] = implode(", ", $newArr);
        }
        $monthwise_sale_data = implode(", ", $tempArray);


        return view('dashboard')->with('out_of_stock_list', $out_of_stock_list)
                                        ->with('total_stock_count', $total_stock_count)
                                        ->with('in_stock_count', $in_stock_count)
                                        ->with('out_of_stock_count', $out_of_stock_count)
                                        ->with('low_stock_count', $low_stock_count)
                                        ->with('total_invoice_count', $total_invoice_count)
                                        ->with('in_stock_cp', $in_stock_cp)
                                        ->with('monthwise_sale_data', $monthwise_sale_data)
                                        ->with('client_total_pending_amt', $client_total_pending_amt);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_stock');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_sku = $request->input('product_sku');
        $product_name = $request->input('product_name');
        $product_color = $request->input('product_color');
        $product_desc = $request->input('product_desc');
        $product_qnty = $request->input('product_qnty');
        $product_cp = $request->input('product_cp');
        $product_sp = $request->input('product_sp');

        $created_by = Auth::id();

        DB::insert('INSERT INTO stocks (product_sku, product_name, product_color,
                    product_desc, product_qnty, product_cp, product_sp, created_by)
                    VALUES (?,?,?,?,?,?,?,?)' , [$product_sku, $product_name, $product_color,
            $product_desc, $product_qnty, $product_cp, $product_sp, $created_by]);

        return redirect('/stock_list')->with('create_message', 'Stock Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $created_by = Auth::id();
        $stock_detail = DB::select('SELECT * FROM stocks WHERE id = ' .$id.' AND created_by =' .$created_by);

        $stock_detail = json_decode(json_encode($stock_detail), true);

        return view('product_detail')->with('stock_detail', $stock_detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stored_stock_data = DB::select('SELECT * FROM stocks WHERE id =' .$id);
        $stored_stock_data = json_decode(json_encode($stored_stock_data), true);

        return view('edit_stock')->with('stored_stock_data', $stored_stock_data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product_sku = $request->input('product_sku');
        $product_name = $request->input('product_name');
        $product_color = $request->input('product_color');
        $product_desc = $request->input('product_desc');
        $product_qnty = $request->input('product_qnty');
        $product_cp = $request->input('product_cp');
        $product_sp = $request->input('product_sp');

        $updated_data = array( 'product_sku' => $product_sku,
                                'product_name' => $product_name,
                                'product_color' => $product_color,
                                'product_desc' => $product_desc,
                                'product_qnty' => $product_qnty,
                                'product_cp' => $product_cp,
                                'product_sp' => $product_sp );

        DB::table('stocks')
            ->where('id', '=', $id)
            ->update( $updated_data );

        return redirect('stock_list')->with('update_message', "Stock data updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM stocks WHERE id='.$id);

        return redirect('stock_list')->with('delete_message','Data deleted Successfully.');
    }

}
