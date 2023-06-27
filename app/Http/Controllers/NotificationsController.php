<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Models\Client;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{

    public function index(Request $request)
    {
        $clients = Client::pluck('name','id');

        if ($request->ajax()) {
            return Datatables()->of(Notification::get())
                ->addIndexColumn()
                ->make();
        }
        return view('notification.index',compact('clients'));
    }

    public function store(NotificationRequest $request)
    {
        Notification::create($request->validated());
        return redirect()->back()->withSuccess(__('Notification Created Successfully!!'));
    }

    public function clientExcel(Request $request)
    {
        // $import = Excel::import(new ClientsImport, $request->file('Excel'));

        // dd($request);
    }
}
