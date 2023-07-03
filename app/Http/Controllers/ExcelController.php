<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Coach;
use App\Models\Notification;
use App\Models\Register;
use App\Models\Session;
use App\Models\SessionPayment;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function Registerimport(Request $request)
    {
        if ($request->hasFile('file')) {
            $extension = $request->file('file')->extension();
            if ($extension == "xlsx" || $extension == "xls" || $extension == "xlm" || $extension == "csv") {

                $excelData = Excel::toArray([], $request->file('file')->store('files'))[0]; // store excell in array
                $excelColumnName = $excelData[0]; //get excel cloumn name

                $excelrowCount = count($excelColumnName);

                if ($excelColumnName[0] == 'client_id' && $excelColumnName[1] == 'next_payment' && $excelColumnName[2] == 'end_date') {
                    for ($y = 1; $excelrowCount >= $y; $y++) {
                        Register::create([
                            'client_id' => $excelData[$y][0],
                            'next_date' =>  $this->transDateFromExcel($excelData[$y][1]),
                            'end_date' => $this->transDateFromExcel($excelData[$y][2])
                        ]);
                    }
                } else {
                    return redirect()->back()->withError('First Column Must be client_id & Second Column Must be next_payment & Third Column Must be end_date');
                }
            } else {
                return redirect()->back()->withError('Wrong File Selected');
            }
        } else {
            return redirect()->back()->withError('No file selected');
        }

        return redirect()->back()->withSuccess('All data inserted succefully');
    }

    public function Paymentimport(Request $request)
    {
        if ($request->hasFile('file')) {
            $extension = $request->file('file')->extension();
            if ($extension == "xlsx" || $extension == "xls" || $extension == "xlm" || $extension == "csv") {

                $excelData = Excel::toArray([], $request->file('file')->store('files'))[0]; // store excell in array
                $excelColumnName = $excelData[0]; //get excel cloumn name

                $excelColumnCount = count($excelData);

                if ($excelColumnName[0] == 'client_id' && $excelColumnName[1] == 'session_id') {
                    for ($y = 1; $excelColumnCount > $y; $y++) {
                        SessionPayment::create([
                            'client_id' => $excelData[$y][0],
                            'session_id' => $excelData[$y][1],
                        ]);
                    }
                } else {
                    return redirect()->back()->withError('First Column Must be client_id & Second Column Must be session_id');
                }
            } else {
                return redirect()->back()->withError('Wrong File Selected');
            }
        } else {
            return redirect()->back()->withError('No file selected');
        }

        return redirect()->back()->withSuccess('All data inserted succefully');
    }

    public function Clientimport(Request $request)
    {
        if ($request->hasFile('file')) {
            $extension = $request->file('file')->extension();
            if ($extension == "xlsx" || $extension == "xls" || $extension == "xlm" || $extension == "csv") {

                $excelData = Excel::toArray([], $request->file('file')->store('files'))[0]; // store excell in array
                $excelColumnName = $excelData[0]; //get excel cloumn name

                $excelColumnCount = count($excelData);

                if ($excelColumnName[0] == 'membership_id' && $excelColumnName[1] == 'name' && $excelColumnName[2] == 'mobile' && $excelColumnName[3] == 'status' && $excelColumnName[4] == 'email') {
                    for ($y = 1; $excelColumnCount > $y; $y++) {
                        Client::create([
                            'membership_id' => $excelData[$y][0],
                            'name' => $excelData[$y][1],
                            'mobile' => $excelData[$y][2],
                            'status' => $excelData[$y][3],
                            'email' => $excelData[$y][4],
                        ]);
                    }
                } else {
                    return redirect()->back()->withError('First Column Must be membership_id & Second Column Must be name & Third Column Must be mobile & Fourth Column Must be status & Fifth Column Must be email');
                }
            } else {
                return redirect()->back()->withError('Wrong File Selected');
            }
        } else {
            return redirect()->back()->withError('No file selected');
        }

        return redirect()->back()->withSuccess('All data inserted succefully');
    }

    public function Coachimport(Request $request)
    {
        if ($request->hasFile('file')) {
            $extension = $request->file('file')->extension();
            if ($extension == "xlsx" || $extension == "xls" || $extension == "xlm" || $extension == "csv") {

                $excelData = Excel::toArray([], $request->file('file')->store('files'))[0]; // store excell in array
                $excelColumnName = $excelData[0]; //get excel cloumn name

                $excelColumnCount = count($excelData);

                if ($excelColumnName[0] == 'name' && $excelColumnName[1] == 'mobile' && $excelColumnName[2] == 'status' && $excelColumnName[3] == 'email') {
                    for ($y = 1; $excelColumnCount > $y; $y++) {
                        Coach::create([
                            'name' => $excelData[$y][0],
                            'mobile' => $excelData[$y][1],
                            'status' => $excelData[$y][2],
                            'email' => $excelData[$y][3],
                        ]);
                    }
                } else {
                    return redirect()->back()->withError('First Column Must be name & Second Column Must be mobile & Third Column Must be status & Fourth Column Must be email');
                }
            } else {
                return redirect()->back()->withError('Wrong File Selected');
            }
        } else {
            return redirect()->back()->withError('No file selected');
        }

        return redirect()->back()->withSuccess('All data inserted succefully');
    }

    public function Sessionimport(Request $request)
    {
        if ($request->hasFile('file')) {
            $extension = $request->file('file')->extension();
            if ($extension == "xlsx" || $extension == "xls" || $extension == "xlm" || $extension == "csv") {

                $excelData = Excel::toArray([], $request->file('file')->store('files'))[0]; // store excell in array
                $excelColumnName = $excelData[0]; //get excel cloumn name

                $excelColumnCount = count($excelData);

                if (
                    $excelColumnName[0] == 'name' && $excelColumnName[1] == 'coach_id' && $excelColumnName[2] == 'day' && $excelColumnName[3] == 'session_time' && $excelColumnName[4] == 'duartion'
                    && $excelColumnName[5] == 'applicable_from' && $excelColumnName[6] == 'applicable_to' && $excelColumnName[7] == 'seats'
                ) {
                    for ($y = 1; $excelColumnCount > $y; $y++) {
                        Session::create([
                            'name' => $excelData[$y][0],
                            'coach_id' => $excelData[$y][1],
                            'day' => $this->transDateFromExcel($excelData[$y][2]),
                            'session_time' => $this->transTimeFromExcel($excelData[$y][3]),
                            'duartion' => $excelData[$y][4],
                            'applicable_from' => $this->transDateFromExcel($excelData[$y][5]),
                            'applicable_to' => $this->transDateFromExcel($excelData[$y][6]),
                            'seats' => $excelData[$y][7],
                        ]);
                    }
                } else {
                    return redirect()->back()->withError('First Column Must be name & Second Column Must be coach_id & Third Column Must be day & Fourth Column Must be session_time &
                    Fifth Column Must be duartion & Sixth column must be applicable_from & Seventh is applicable_to and the Eighth One should be seats');
                }
            } else {
                return redirect()->back()->withError('Wrong File Selected');
            }
        } else {
            return redirect()->back()->withError('No file selected');
        }

        return redirect()->back()->withSuccess('All data inserted succefully');
    }

    public function Notificationimport(Request $request )
    {
        if ($request->hasFile('file')) {
            $extension = $request->file('file')->extension();
            if ($extension == "xlsx" || $extension == "xls" || $extension == "xlm" || $extension == "csv") {

                $excelData = Excel::toArray([], $request->file('file')->store('files'))[0]; // store excell in array
                $excelColumnName = $excelData[0]; //get excel cloumn name

                $excelColumnCount = count($excelData);

                if (
                    $excelColumnName[0] == 'name' && $excelColumnName[1] == 'alert' && $excelColumnName[2] == 'from' && $excelColumnName[3] == 'to') {
                    for ($y = 1; $excelColumnCount > $y; $y++) {
                        Notification::create([
                            'name' => $excelData[$y][0],
                            'alert' => $excelData[$y][1],
                            'from' => $this->transDateTimeFromExcel($excelData[$y][2]),
                            'to' => $this->transDateTimeFromExcel($excelData[$y][3]),
                        ]);
                    }
                } else {
                    return redirect()->back()->withError('First Column Must be name & Second Column Must be alert & Third Column Must be from & Fourth Column Must be to');
                }
            } else {
                return redirect()->back()->withError('Wrong File Selected');
            }
        } else {
            return redirect()->back()->withError('No file selected');
        }

        return redirect()->back()->withSuccess('All data inserted succefully');
    }

    private function transDateFromExcel($date){
       return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('Y-m-d');
    }
    private function transTimeFromExcel($date){
        return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('H:i:s');
     }
     private function transDateTimeFromExcel($date){
        return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('Y-m-d H:i:s');

     }
}
