<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Table;

class ApiStockController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


    public static function show(Request $request)
    {

        $created_by = Auth::id();
        $stock_detail = array();
        if(empty($request->id)) {
            $stock_detail = DB::select('SELECT * FROM stocks WHERE created_by = '.$created_by.' AND product_qnty > 0 ORDER BY product_name ASC');
        }
        else{
            $stock_detail = DB::select('SELECT * FROM stocks WHERE id = '.$request->id.' AND created_by = '.$created_by);
        }

        echo json_encode($stock_detail, JSON_PRETTY_PRINT);
        exit;
    }

}
