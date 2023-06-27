<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SessionPaymentController;
use App\Models\Client;
use App\Models\Notification;
use App\Models\Session;
use App\Models\SessionPayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ClientHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('client.home');
    }

    public function schedule(Request $request)
    {
        $date = !$request->date ?  Carbon::now()->toDateString() : $request->date;
        $schedules = Session::with('coaches')->where('day', $date)->get();
        $date = Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');  //Format to show in blade

        return view('client.schedule', compact('schedules', 'date'));
    }
    public function notifications()
    {
        $notifications = Notification::all();
        return view('client.notifications', compact('notifications'));
    }

    public function book_services(Request $request)
    {
        // $UserSessions = DB::table('sessions')
        //     ->join('session_payments', 'session_payments.session_id', '=', 'sessions.id')
        //     ->where('session_payments.client_id', '=', $this->getUserClientId())
        //     ->distinct('sessions.id')
        //     ->pluck('sessions.id');

        $services = Session::with('coaches')->get();

        if ($request->id) {

            $session_id = $request->id;
            $client_id = $this->getUserClientId();
            $checkSeats = (new SessionPaymentController)->checkSeats($client_id, $session_id);

            if ($checkSeats == 0) {
                return view('client.book_services', compact('services'))->with('error', '
                ! ALERT ! <br><br>
                Apologies you cannot attend two Spinning classes during <br><br>
                the same week! <br><br>
                We would like to offer the opportunity for other members <br><br>
                to try it too. <br><br>
                Try booking your session next week. <br><br>
                Thank you for understanding, <br><br>
                Titanium Fitness Administration.
                ');
            } elseif ($checkSeats == -1) {
                return view('client.book_services', compact('services'))->with('error', 'Client already registerd to this session !!');
            } else {

                $checkSeats = Session::find($session_id);
                $checkSeats->update(['reserved' => $checkSeats->reserved += 1]);
                SessionPayment::create([
                    'client_id' => $client_id,
                    'session_id' => $session_id
                ]);
                return view('client.book_services', compact('services'))->with('success', 'Session Reserved Successfully !!');
            }
        }

        return view('client.book_services', compact('services'));
    }

    public function paidServices()
    {
        $paidServices = SessionPayment::with('clients', 'sessions')->where('client_id', $this->getUserClientId())->get();
        return view('client.paidServices', compact('paidServices'));
    }

    public function profile()
    {
        $profile = Client::with('register')->where('id',$this->getUserClientId())->first();
        return view('client.profile', compact('profile'));
    }

    public function getUserClientId()
    {
        $membershipId = User::where('id', Auth::user()->id)->pluck('membership_id')->first();
        $client_id = Client::where('membership_id', $membershipId)->pluck('id')->first();
        return $client_id;
    }
}
