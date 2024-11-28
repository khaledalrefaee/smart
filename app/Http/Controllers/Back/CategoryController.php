<?php

namespace App\Http\Controllers\Back;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;



class CategoryController extends Controller
{
    public function index(){
        $Category =  Category::orderby('id','desc')->get();
        return view ('back.category.index',compact('Category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'slug_en' => 'nullable|string|max:255', 
        ]);
    
        if ($request->hasFile('icon') && $request->hasFile('image')) {
    
                $icon = $request->file('icon');
                $iconName = time() . '_icon.webp';
                $iconPath = public_path('uploads/' . $iconName);
        
                $iconImage = Image::make($icon);
                $iconImage->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp'); 
                $iconImage->save($iconPath);
        
                $image = $request->file('image');
                $imageName = time() . '_image.webp';
                $imagePath = public_path('uploads/' . $imageName);
        
                $mainImage = Image::make($image);
                $mainImage->resize(1500, 900, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp'); 
                $mainImage->save($imagePath);
    
            $slug_en = $request->slug_en ? $request->slug_en : Str::slug($request->name_en);
    
            $category = new Category();
            $category->icon = 'uploads/' . $iconName;
            $category->image = 'uploads/' . $imageName;
            $category->name_en = $request->name_en;
            $category->name_ar = $request->name_ar;
            $category->slug_en = $slug_en; 
            $category->active = '1'; 
            $category->save();
    
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
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'slug_en' => 'nullable|string|max:255', 
        ]);
    
        $category = Category::findOrFail($id);
    
        $slug_en = $request->slug_en ? $request->slug_en : Str::slug($request->name_en);
    
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconName = time() . '_icon.webp';
            $iconPath = public_path('uploads/' . $iconName);
    
            $iconImage = Image::make($icon);
            $iconImage->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp');
            $iconImage->save($iconPath);
    
            if (file_exists(public_path($category->icon))) {
                unlink(public_path($category->icon));
            }
    
            $category->icon = 'uploads/' . $iconName;
        }
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_image.webp';
            $imagePath = public_path('uploads/' . $imageName);
    
            $mainImage = Image::make($image);
            $mainImage->resize(1500, 900, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp');
            $mainImage->save($imagePath);
    
            if (file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }
    
            $category->image = 'uploads/' . $imageName;
        }
    
        $category->name_en = $request->name_en;
        $category->name_ar = $request->name_ar;
        $category->slug_en = $slug_en;
    
        $category->save();
    
        toastr()->warning('Data has been updated successfully!');
        return redirect()->back();
    }

    public function updateActiveStatus(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->active = $request->input('active');
        $category->save();

        return response()->json(['success' => 'User status updated successfully']);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if (file_exists(public_path($category->icon))) {
            unlink(public_path($category->icon));
        }

        if (file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }

        $category->delete();

        toastr()->error('Category has been deleted successfully!');

        return redirect()->route('Categories');
    }
}
