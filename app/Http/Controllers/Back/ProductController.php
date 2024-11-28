<?php

namespace App\Http\Controllers\Back;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCatygory;
use Illuminate\Support\Str;
use App\Models\SerialNumber;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Imports\SerialNumbersImport;
use App\Jobs\ImportSerialNumbersJob;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products =Product::orderby('id','desc')->where('sub_product_id',null)->get();
        return view('back.product.index',compact('products'));
    }


    public function getSubcategories($categoryId)
    {
        $subcategories = SubCatygory::where('catgory_id', $categoryId)->get(['id', 'name_en', 'name_ar']);
        return response()->json($subcategories);
    }

    public function show($id){
        $product  =Product ::with(['serialNumbers'])->findOrfail($id);
        return view('back.product.show',compact('product'));
    }

    public function create(){
        $Category =Category::get();
        return view('back.product.create',compact('Category'));
    }



    public function store(Request $request)
    {
        ini_set('memory_limit', '512M');
        ini_set('max_execution_time', 300);

        try {
            $request->validate([
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'required|exists:sub_catygories,id',
                'name_ar' => 'required|string|max:255|unique:products,name_ar,',
                'name_en' => 'required|string|max:255|unique:products,name_en,',
                'warranty_period' => 'required',
                'warranty_unit' => 'required',
                'popular' => 'required|in:yes,no',
                'description_ar' => 'required|string',
                'description_en' => 'required|string',
                'datasheet' => 'nullable|mimes:pdf,doc,docx',
                'user_manual' => 'nullable|mimes:pdf,doc,docx',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'serial_numbers' => ['nullable', 'string'],
                'serial_file' => ['nullable', 'file', 'mimes:xlsx,xls,csv'],
            ],
            [
                'serial_numbers.string' => 'يجب أن يكون النصوص المدخلة بتنسيق صحيح.',
                'serial_file.mimes' => 'يجب أن يكون الملف المرفوع بصيغة Excel (xlsx, xls, csv).',
                'serial_numbers.required_without' => 'يجب إدخال الأرقام التسلسلية كنصوص أو رفع ملف Excel.',
                'serial_file.required_without' => 'يجب إدخال الأرقام التسلسلية كنصوص أو رفع ملف Excel.',
            ]);
    
            if (!$request->serial_numbers && !$request->hasFile('serial_file')) {
                return back()->withErrors(['error' => 'يرجى إدخال الأرقام التسلسلية كنصوص أو رفع ملف Excel.']);
            }
    
            $slug_en = $request->slug_en ? $request->slug_en : Str::slug($request->name_en);
    
            $product = Product::create([
                'catgory_id' => $request->category_id,
                'sub_catgory_id' => $request->sub_category_id,
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'slug_en' => $slug_en,
                'popular' => $request->popular,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
                'made' => $request->made,
                'capacities' => $request->capacities,
                'weight' => $request->weight,
                'terminals' => $request->terminals,
                'warranty_period' => $request->warranty_period,
                'warranty_unit' => $request->warranty_unit,
                'cycles' => $request->cycles,
            ]);
    
            // التعامل مع الأرقام التسلسلية
            if ($request->has('serial_numbers')) {
                $serialNumbers = explode("\n", $request->serial_numbers);
                foreach ($serialNumbers as $serial) {
                    SerialNumber::create([
                        'product_id' => $product->id,
                        'serial_number' => trim($serial),
                    ]);
                }
            }
    
            if ($request->hasFile('serial_file')) {
                // $serialFile = $request->file('serial_file');
                // $filePath = $serialFile->store('temp');
                // ImportSerialNumbersJob::dispatch($product->id, Storage::path($filePath));
                
                Excel::import(new SerialNumbersImport($product->id), $request->file('serial_file'));
            }
    
            // رفع الصور
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = time() . '_' . uniqid() . '.webp';
                    $imagePath = public_path('uploads/' . $imageName);
    
                    $img = Image::make($image);
                    $img->resize(1500, 900, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode('webp');
                    $img->save($imagePath);
    
                    $product->images()->create(['filename' => $imageName]);
                }
            }
    
            // رفع datasheet
            $datasheetPath = null;
            if ($request->hasFile('datasheet')) {
                $datasheet = $request->file('datasheet');
                $datasheetName = time() . '_' . uniqid() . '.' . $datasheet->getClientOriginalExtension();
                $datasheet->move(public_path('uploads/datasheets'), $datasheetName);
                $datasheetPath = 'uploads/datasheets/' . $datasheetName;
            }
    
            // رفع user manual
            $userManualPath = null;
            if ($request->hasFile('user_manual')) {
                $userManual = $request->file('user_manual');
                $userManualName = time() . '_' . uniqid() . '.' . $userManual->getClientOriginalExtension();
                $userManual->move(public_path('uploads/user_manuals'), $userManualName);
                $userManualPath = 'uploads/user_manuals/' . $userManualName;
            }
    
            $product->update([
                'datasheet' => $datasheetPath,
                'user_manual' => $userManualPath,
            ]);
    
            toastr()->success('Data has been saved successfully!');
            return redirect()->route('product');
        } catch (\Exception $e) {
            // سجل الخطأ إن كنت تحتاج ذلك
            \Log::error('Excel import error: ' . $e->getMessage());

            \Log::error('Error saving product: ' . $e->getMessage());
    
            // أعط المستخدم رسالة ودية
            toastr()->error('حدث خطأ أثناء حفظ البيانات. الرجاء المحاولة لاحقاً.');
    
            return back()->withInput(); // إعادة التوجيه مع الاحتفاظ بالمدخلات
        }
    }
    


    public function edit($id){
        $product =Product::findOrFail($id);

        $Category =Category::get();
        return view('back.product.edit',compact('Category','product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_catygories,id',
            'cereal_number' => 'required|string|max:255|unique:products,cereal_number,' . $id,
            'name_ar' => 'required|string|max:255|unique:products,name_ar,' . $id,
            'name_en' => 'required|string|max:255|unique:products,name_en,' . $id,
            'popular' => 'required|in:yes,no',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'datasheet' => 'nullable|mimes:pdf,doc,docx',
            'user_manual' => 'nullable|mimes:pdf,doc,docx',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $slug_en = $request->slug_en ? $request->slug_en : Str::slug($request->name_en);

        // جلب المنتج وتحديث البيانات الأساسية
        $product = Product::findOrFail($id);
        $product->update([
            'catgory_id' => $request->category_id,
            'sub_catgory_id' => $request->sub_category_id,
            'cereal_number' => $request->cereal_number,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'slug_en' => $slug_en,
            'popular' => $request->popular,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'made' => $request->made,
            'capacities' => $request->capacities,
            'weight' => $request->weight,
            'terminals' => $request->terminals,
            'cycles' => $request->cycles,
        ]);

        // تحديث الصور إذا كانت جديدة
        if ($request->hasFile('images')) {
            // حذف الصور القديمة
            foreach ($product->images as $image) {
                if (file_exists(public_path('uploads/' . $image->filename))) {
                    unlink(public_path('uploads/' . $image->filename));
                }
                $image->delete();
            }

            // رفع الصور الجديدة
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.webp';
                $imagePath = public_path('uploads/' . $imageName);

                $img = Image::make($image);
                $img->resize(1500, 900, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp');
                $img->save($imagePath);

                $product->images()->create(['filename' => $imageName]);
            }
        }

        // تحديث ملف datasheet إذا كان جديدًا
        if ($request->hasFile('datasheet')) {
            if ($product->datasheet && file_exists(public_path($product->datasheet))) {
                unlink(public_path($product->datasheet));
            }

            $datasheet = $request->file('datasheet');
            $datasheetName = time() . '_' . uniqid() . '.' . $datasheet->getClientOriginalExtension();
            $datasheet->move(public_path('uploads/datasheets'), $datasheetName);
            $product->datasheet = 'uploads/datasheets/' . $datasheetName;
        }

        // تحديث ملف user_manual إذا كان جديدًا
        if ($request->hasFile('user_manual')) {
            if ($product->user_manual && file_exists(public_path($product->user_manual))) {
                unlink(public_path($product->user_manual));
            }

            $userManual = $request->file('user_manual');
            $userManualName = time() . '_' . uniqid() . '.' . $userManual->getClientOriginalExtension();
            $userManual->move(public_path('uploads/user_manuals'), $userManualName);
            $product->user_manual = 'uploads/user_manuals/' . $userManualName;
        }

        $product->save();

        toastr()->warning('Data has been updated successfully!');

        return redirect()->route('product');
    }

    


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        foreach ($product->images as $image) {
            $imagePath = public_path('uploads/' . $image->filename);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        if ($product->datasheet) {
            $datasheetPath = public_path($product->datasheet);
            if (file_exists($datasheetPath)) {
                unlink($datasheetPath);
            }
        }

        if ($product->user_manual) {
            $userManualPath = public_path($product->user_manual);
            if (file_exists($userManualPath)) {
                unlink($userManualPath);
            }
        }

        $product->delete();

        toastr()->error('Product has been deleted successfully!');

        return redirect()->back();
    }

}
