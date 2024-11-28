<?php

namespace App\Imports;

use App\Models\SerialNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class SerialNumbersImport implements ToModel ,WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function model(array $row)
    {
        try {
            return new SerialNumber([
                'product_id' => $this->productId,
                'serial_number' => trim($row[0]),
            ]);
        } catch (\Exception $e) {
            \Log::error('Error processing row: ' . json_encode($row) . ' - ' . $e->getMessage());
            throw $e;
        }
    }
    

    public function chunkSize(): int
    {
        return 100; // معالجة 100 سجل في كل دفعة
    }
}
