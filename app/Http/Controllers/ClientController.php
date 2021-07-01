<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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
        $clients_list_data = DB::select('SELECT * FROM clients WHERE created_by = '.$created_by.' ORDER BY created_at DESC');
        return view('clients_list')->with('clients_list_data', $clients_list_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_clients');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client_name = $request->input('client_name');
        $client_shop_street = $request->input('client_shop_street');
        $client_city_town = $request->input('client_city_town');
        $client_pincode = $request->input('client_pincode');
        $client_desc = $request->input('client_desc');
        $client_contact1 = $request->input('client_contact1');
        $client_contact2 = $request->input('client_contact2');
        $client_email = $request->input('client_email');
        $client_total_amt = $request->input('client_total_amt');
        $client_paid_amt = $request->input('client_paid_amt');

        $created_by = Auth::id();

        DB::insert('INSERT INTO clients (client_name, client_shop_street, client_city_town,
                    client_pincode, client_desc, client_contact1, client_contact2, client_email, client_total_amt,
                     client_paid_amt, created_by) VALUES(?,?,?,?,?,?,?,?,?,?,?)', [$client_name, $client_shop_street,
            $client_city_town, $client_pincode, $client_desc, $client_contact1, $client_contact2, $client_email,
            $client_total_amt, $client_paid_amt, $created_by] );

        return redirect('/clients_list')->with('success', 'Client added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client_detail = DB::select('SELECT * FROM clients WHERE id=' .$id);
        $client_detail = json_decode(json_encode($client_detail), true);

        return view('client_detail')->with('client_detail', $client_detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stored_client_data = DB::select('SELECT * FROM clients WHERE id=' .$id);
        $stored_client_data = json_decode(json_encode($stored_client_data), true);

        return view('edit_clients')->with('stored_client_data', $stored_client_data);
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
        $client_name = $request->input('client_name');
        $client_shop_street = $request->input('client_shop_street');
        $client_city_town = $request->input('client_city_town');
        $client_pincode = $request->input('client_pincode');
        $client_desc = $request->input('client_desc');
        $client_contact1 = $request->input('client_contact1');
        $client_contact2 = $request->input('client_contact2');
        $client_email = $request->input('client_email');
        $client_total_amt = $request->input('client_total_amt');
        $client_paid_amt = $request->input('client_paid_amt');

        $updated_data = array( 'client_name' => $client_name,
                            'client_shop_street' => $client_shop_street,
                            'client_city_town' => $client_city_town,
                            'client_pincode' => $client_pincode,
                            'client_desc' => $client_desc,
                            'client_contact1' => $client_contact1,
                            'client_contact2' => $client_contact2,
                            'client_email' => $client_email,
                            'client_total_amt' => $client_total_amt,
                            'client_paid_amt' => $client_paid_amt );

        DB::table('clients')->where('id', '=', $id)
                                ->update( $updated_data );

        return redirect('clients_list')->with('update_message', 'Client data updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM clients WHERE id='.$id);

        return redirect('clients_list')->with('delete_message','Data deleted Successfully.');
    }

}
