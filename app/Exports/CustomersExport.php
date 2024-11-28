<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomersExport implements FromCollection, WithHeadings, WithMapping
{

    public function collection()
    {
        return Customer::select(
            'full_name', 'phone', 'state', 'address', 'Installation_Manager', 
            'Purchase_source_phone', 'bought_date', 'notes',  'product_id', 
            'serial_number'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Full Name', 'Phone', 'State', 'Address', 'Installation Manager', 
            'Purchase Source Phone', 'Bought Date', 'Notes', 
            'Product', 
            'Serial Number', 'Warranty Status'
        ];
    }

    public function map($customer): array
    {
        return [
            $customer->full_name,
            $customer->phone,
            $customer->state,
            $customer->address,
            $customer->Installation_Manager,
            $customer->Purchase_source_phone,
            $customer->bought_date,
            $customer->notes,
        
            $customer->product->name_en,
            $customer->serial_number,
            $customer->isWarrantyValid() ? 'Active' : 'Not Active',
        ];
    }
}
