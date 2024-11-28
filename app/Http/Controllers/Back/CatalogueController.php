<?php

namespace App\Http\Controllers\Back;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogueController extends Controller
{
    public function index(){
        $Catalogue = Catalogue::get();
        return view('back.Catalogue.index',compact('Catalogue'));
    }


    public function store(Request $request)
    {
      
        $request->validate([
        
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
         
            'file' => 'nullable|mimes:pdf,doc,docx',
       
        
        ]);


        // Insert product data into the database first
        $Catalogue = Catalogue::create([
        
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
       
        ]);



    
        
    
            $file = null;
            if ($request->hasFile('file')) {
                $datasheet = $request->file('file');
                $datasheetName = time() . '_' . uniqid() . '.' . $datasheet->getClientOriginalExtension();
                $datasheet->move(public_path('uploads/file'), $datasheetName);
                $file = 'uploads/file/' . $datasheetName;
            }

            
        $Catalogue->update([
            'file' => $file,
      
        ]);


        toastr()->success('Data has been saved successfully!');

        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf,doc,docx',
        ]);
    
        $Catalogue = Catalogue::findOrFail($id);
        $Catalogue->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
        ]);
    
        if ($request->hasFile('file')) {
            if ($Catalogue->file && file_exists(public_path($Catalogue->file))) {
                unlink(public_path($Catalogue->file));
            }
    
            $datasheet = $request->file('file');
            $datasheetName = time() . '_' . uniqid() . '.' . $datasheet->getClientOriginalExtension();
            $datasheet->move(public_path('uploads/file'), $datasheetName);
            $Catalogue->file = 'uploads/file/' . $datasheetName;
        }
    
        $Catalogue->save();
    
        toastr()->warning('Data has been updated successfully!');
    
        return redirect()->back();
    }
    

    public function destroy($id)
    {
        $Catalogue = Catalogue::findOrFail($id);

      
        
        if ($Catalogue->file) {
            $userManualPath = public_path($Catalogue->file);
            if (file_exists($userManualPath)) {
                unlink($userManualPath);
            }
        }

        $Catalogue->delete();

        toastr()->error('Data has been deleted successfully!');

        return redirect()->back();
    }

}
