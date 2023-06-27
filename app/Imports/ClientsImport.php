<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class ClientsImport implements ToModel,WithValidation
{
    public function model(array $row)
    {
        return new Client([
            'membership_id'     => $row[0],
            'name'    => $row[1],
            'mobile'     => $row[2],
            'email'    => $row[3],
            'status'     => $row[4],
        ]);
    }

    public function rules(): array
    {
        return [
            'membership_id' => ['required', 'numeric', 'max:255', 'min:1', 'unique:clients,membership_id'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255', 'digits:11', 'unique:clients,mobile'],
            'status' => ['required', 'numeric', 'max:255', 'digits:1', 'min:0', 'max:1'],
            'email' => ['required', 'email', 'max:255', 'unique:clients,email'],
        ];
    }
}
