<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Imports\ClientsImport;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Excel;

class ClientsController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            return Datatables()->of(Client::get())
                ->addIndexColumn()
                ->make();
        }
        return view('clients.index');
    }

    public function store(ClientRequest $request)
    {
        $user = User::create([
            'membership_id' => $request->membership_id,
            'name' => $request->name,
            'email' =>  $request->email,
            'password' => bcrypt('123456')
        ]);

        $client = Client::create($request->validated());

        $user->assignRole('client');



        return redirect()->route('clients.index')->withSuccess(__('Client Created Successfully!!'));
    }

    public function clientExcel(Request $request)
    {
        $import = Excel::import(new ClientsImport, $request->file('Excel'));

        dd($request);
    }
}
