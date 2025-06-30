<?php

namespace App\Imports;

use App\Customer; // ← Esta línea es la clave
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Customer([
            'customer_name' => $row['nombre'] ?? null,
            'email'         => $row['correo_electronico'] ?? null,
            'phone'         => $row['telefono'] ?? null,
            'address'       => $row['direccion'] ?? null,
        ]);
    }
}
