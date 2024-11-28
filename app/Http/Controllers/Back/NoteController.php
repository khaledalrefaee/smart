<?php

namespace App\Http\Controllers\Back;

use App\Models\Note;
use App\Models\Customer;
use App\Models\SerialNumber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    public function index()
    {
        $Note = Note::orderby('id','Desc')->get();
        $customer = Customer::select('full_name')->get();

      
        $SerialNumber = SerialNumber::select('serial_number')->get();
        return view('back.Note.index',compact('Note','SerialNumber','customer'));
    }


    public function store(Request $request)
    {
      
        $request->validate([
        
            'customer_name' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
         
            'price' => 'required|string',
            'note' => 'required|string',
        
        ]);
        $serialNumber = SerialNumber::where('serial_number', $request->serial_number)->first();

        if (!$serialNumber) {
            toastr()->error('الرقم التسلسلي المقدم غير موجود!');
            
        }

        $Note = Note::create([
        
            'customer_name' => $request->customer_name,
            'serial_number' => $request->serial_number,

            'product_id' => $serialNumber->product_id, 
            'price' => $request->price,
            'note' => $request->note,
       
        ]);


        toastr()->success('Data has been saved successfully!');

        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
            'price' => 'required|string',
            'note' => 'required|string',
        ]);

        $Note = Note::findOrFail($id);

        $serialNumber = SerialNumber::where('serial_number', $request->serial_number)->first();

        if (!$serialNumber) {
            toastr()->error('الرقم التسلسلي المقدم غير موجود!');
            return redirect()->back();
        }

        $Note->update([
            'customer_name' => $request->customer_name,
            'serial_number' => $request->serial_number,
            'product_id' => $serialNumber->product_id, 
            'price' => $request->price,
            'note' => $request->note,
        ]);

        toastr()->success('Data has been updated successfully!');
        return redirect()->back();
    }



    public function destroy($id)
    {
        $Note = Note::findOrFail($id);

      
        
    

        $Note->delete();

        toastr()->error('Data has been deleted successfully!');

        return redirect()->back();
    }
}
