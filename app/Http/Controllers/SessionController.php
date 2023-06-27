<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoachRequest;
use App\Http\Requests\SessionRequest;
use App\Models\Coach;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function index(Request $request)
    {
        $coaches = Coach::pluck('name','id');

        if ($request->ajax()) {
            return Datatables()->of(Session::with('coaches')->get())
            ->addIndexColumn()
                ->make();
        }
        return view('session.index',compact('coaches'));
    }

    public function store(SessionRequest $request)
    {
        Session::create($request->validated());
        return redirect()->back()->withSuccess(__('Session Created Successfully!!'));
    }

    public function clientExcel(Request $request){
        // $import = Excel::import(new ClientsImport, $request->file('Excel'));

        // dd($request);
    }
}
