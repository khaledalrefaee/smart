<?php

namespace App\Http\Controllers\Back;

use App\Models\SerialNumber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SerialNumberController extends Controller
{

    public function update(Request $request, $id)
    {
        $request->validate([
            'serial_number' => 'required|string|max:255',
           
        ]);
    
        $SerialNumber = SerialNumber::findOrFail($id);
        $SerialNumber->update([
            'serial_number' => $request->serial_number,
         
        ]);
    

    
        $SerialNumber->save();
    
        toastr()->warning('Data has been updated successfully!');
    
        return redirect()->back();
    }

    public function destroy($id)
    {
        $SerialNumber = SerialNumber::findOrFail($id);
        $SerialNumber->delete();

        toastr()->error('Data has been deleted successfully!');

        return redirect()->back();
    }

}
