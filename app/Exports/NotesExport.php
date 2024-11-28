<?php

namespace App\Exports;

use App\Models\Note;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class NotesExport implements  FromCollection, WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Note::all(['customer_name', 'product_id', 'serial_number', 'price', 'note', 'created_at']);
    }

    public function headings(): array
    {
        return [
            'Customer Name',
            'Product Name',
            'Serial Number',
            'Price',
            'Note',
            'Created At'
        ];
    }


  

    public function map($note): array
    {
        return [
            $note->customer_name,
            $note->product->name_en,
            $note->serial_number,
            $note->price,
            $note->note,

            $note->created_at,
            
        ];
    }
}
