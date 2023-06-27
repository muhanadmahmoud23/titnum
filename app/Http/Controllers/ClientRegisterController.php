<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Client;
use App\Models\Payment;
use App\Models\Register;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientRegisterController extends Controller
{

    public function index(Request $request)
    {
        $clients = Client::pluck('name', 'id');
        $registeredClients = Register::with('clients')->get();

        if ($request->ajax()) {
            return Datatables()->of($registeredClients)
                ->addIndexColumn()
                ->make();
        }
        return view('register.index', compact('clients'));
    }

    public function store(RegisterRequest $request)
    {
        Register::create($request->validated());
        return redirect()->route('register.index')->withSuccess(__('Client Registered Succefully!!'));
    }

    public function clientExcel(Request $request)
    {
        // $import = Excel::import(new ClientsImport, $request->file('Excel'));

        // dd($request);
    }
}
