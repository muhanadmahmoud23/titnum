<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoachRequest;
use App\Models\Coach;
use Illuminate\Http\Request;

class CoachesController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            return Datatables()->of(Coach::get())
            ->addIndexColumn()
                ->make();
        }
        return view('coach.index');
    }

    public function store(CoachRequest $request)
    {
        Coach::create($request->validated());
        return redirect()->back()->withSuccess(__('Coach Created Successfully!!'));
    }

    public function clientExcel(Request $request){
        // $import = Excel::import(new ClientsImport, $request->file('Excel'));

        // dd($request);
    }
}
