<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function clientImport(Request $request)
    {
        if ($request->hasFile('file')) {
            $extension = $request->file('file')->extension();
            if ($extension == "xlsx" || $extension == "xls" || $extension == "xlm" || $extension == "csv") {

                $excelData = Excel::toArray([], $request->file('file')->store('files'))[0]; // store excell in array
                $excelColumnName = $excelData[0]; //get excel cloumn name

                $excelColumnCount = count($excelData);
                $excelrowCount = count($excelColumnName);

                if ($excelColumnName[0] == 'client_id' && $excelColumnName[1] == 'next_payment' && $excelColumnName[2] == 'end_date') {
                    for ($x = 1; $excelColumnCount > $x; $x++) {
                        for ($y = 1; $excelrowCount > $y; $y++) {
                            dd($excelData[$x][$y]);
                            Register::create([
                                'client_id',
                                'next_date',
                                'end_date'
                            ]);
                        }
                    }
                } else {
                    return redirect()->back()->withError('First Column Must be client_id & Second Column Must be next_payment & Third Column Must be end_date');
                }
            }
        } else {
        }
    }
}
