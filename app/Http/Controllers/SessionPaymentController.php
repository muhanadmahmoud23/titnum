<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Client\ClientHomeController;
use App\Http\Requests\SessionPaymentRequest;
use App\Models\Client;
use App\Models\Session;
use App\Models\SessionPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionPaymentController extends Controller
{

    public function index(Request $request)
    {
        $sessions = Session::pluck('name', 'id');
        $clients = Client::pluck('name', 'id');

        $SessionPayment = DB::table('session_payments')
            ->select('clients.membership_id', 'clients.name as client_name', 'sessions.name as session_name', 'coaches.name as coach_name', 'session_payments.created_at')
            ->join('sessions', 'sessions.id', '=', 'session_payments.session_id')
            ->join('clients', 'clients.id', '=', 'session_payments.client_id')
            ->join('coaches', 'coaches.id', '=', 'sessions.coach_id')
            ->get();

        if ($request->ajax()) {
            return Datatables()->of($SessionPayment)
                ->addIndexColumn()
                ->make();
        }
        return view('session_payment.index', compact('clients', 'sessions'));
    }

    public function store(SessionPaymentRequest $request)
    {
        $session_id = $request->session_id;
        $client_id = $request->client_id;
        $checkSeats = $this->checkSeats($client_id, $session_id);

        if ($checkSeats == 0) {

            return redirect()->back()->withError(__('Session seats are all reserved'));
        } elseif ($checkSeats == -1) {

            return redirect()->back()->withError(__('Client already registerd to this session'));
        } else {

            $checkSeats = Session::find($session_id);
            $checkSeats->update(['reserved' => $checkSeats->reserved += 1]);
            SessionPayment::create($request->validated());
            return redirect()->back()->withSuccess(__('Payment Created Successfully!!'));
        }
    }

    public function checkSeats($client_id, $session_id)
    {
        $checkSeats = Session::find($session_id);
        $UserCheck = SessionPayment::where('session_id', $session_id)->where('client_id', $client_id)->exists();

        if ($checkSeats->seats <= $checkSeats->reserved) {
            return 0;
        } elseif ($UserCheck) {
            return -1;
        } else {
            return 1;
        }
    }

    public function clientExcel(Request $request)
    {
        // $import = Excel::import(new ClientsImport, $request->file('Excel'));

        // dd($request);
    }
}
