<?php

namespace App\Http\Controllers\Back;

use App\Models\Category;
use App\Models\SubCatygory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index(){
        $subCategory =  SubCatygory::orderby('id','desc')->get();
        $Category =  Category::orderby('id','desc')->get();

        return view('back.subcategory.index',compact('subCategory','Category'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'Abbreviation_name' => 'required|string|max:255',
            'catgory_id' => 'required',
            'slug_en' => 'nullable|string|max:255', 
        ]);
    
        if ($request->hasFile('image')) {
    
           
            $image = $request->file('image');
            $imageName = time() . '_image.webp';
            $imagePath = public_path('uploads/' . $imageName);
        
            $mainImage = Image::make($image);
            $mainImage->resize(1500, 900, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp'); 
            $mainImage->save($imagePath);
    
            $slug_en = $request->slug_en ? $request->slug_en : Str::slug($request->name_en);
    
            $sub_category = new SubCatygory();
            
            $sub_category->image = 'uploads/' . $imageName;
            $sub_category->name_en = $request->name_en;
            $sub_category->name_ar = $request->name_ar;
            $sub_category->catgory_id = $request->catgory_id;
            $sub_category->Abbreviation_name = $request->Abbreviation_name;
            $sub_category->slug_en = $slug_en; 
         
            $sub_category->save();
    
            toastr()->success('Data has been saved successfully!');
            return redirect()->back();
        } else {
            toastr()->error('Please upload valid images.');
            return redirect()->back();
        }
    }


    public function update(Request $request, $id)
    {
   
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'slug_en' => 'nullable|string|max:255', 
            'Abbreviation_name'=>'required|string|max:255',
            'catgory_id'=>'required|string|max:255',
        ]);
    
        $Subcategory = SubCatygory::findOrFail($id);
    
        $slug_en = $request->slug_en ? $request->slug_en : Str::slug($request->name_en);
    
     
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_image.webp';
            $imagePath = public_path('uploads/' . $imageName);
    
            $mainImage = Image::make($image);
            $mainImage->resize(1500, 900, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp');
            $mainImage->save($imagePath);
    
            if (file_exists(public_path($Subcategory->image))) {
                unlink(public_path($Subcategory->image));
            }
    
            $Subcategory->image = 'uploads/' . $imageName;
        }
    
        $Subcategory->name_en = $request->name_en;
        $Subcategory->name_ar = $request->name_ar;
        $Subcategory->slug_en = $slug_en;
        $Subcategory->Abbreviation_name = $request->Abbreviation_name;
        $Subcategory->catgory_id = $request->catgory_id;
        $Subcategory->save();
    
        toastr()->warning('Data has been updated successfully!');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $subcategory = SubCatygory::findOrFail($id);

    

        if (file_exists(public_path($subcategory->image))) {
            unlink(public_path($subcategory->image));
        }

        $subcategory->delete();

        toastr()->error('Sub Category has been deleted successfully!');

        return redirect()->route('sub.Categories');
    }

}
