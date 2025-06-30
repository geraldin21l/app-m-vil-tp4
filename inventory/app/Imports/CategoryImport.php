<?php

namespace App\Imports;

use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
        {
            \Log::info('Importando fila: ', $row);
            return new Category([
                'name' => $row['name'] ?? null,
            ]);
        }
}
