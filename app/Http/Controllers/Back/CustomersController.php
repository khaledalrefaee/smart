<?php

namespace App\Http\Controllers\Back;

use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\SerialNumber;
use Illuminate\Http\Request;
use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{

    public function export()
    {
        // toastr()->success('Exported successfully!');

        return Excel::download(new CustomersExport, 'customers.xlsx');

    }

    public function index()
    {
        $customers = Customer::orderby('id', 'desc')->get();
        $product =Product::select('id','name_ar','name_en')->get();
        $SerialNumber = SerialNumber::select('serial_number')->get();

        foreach ($customers as $customer) {
            $customer->warranty_status = $customer->isWarrantyValid() ? 'فعال' : 'منتهي';
        }
    
        return view('back.customers.index', compact('customers','product','SerialNumber'));
    }
    

    public function create(){
        $Category =  Category::where('active','1')->get();

        return view('back.customers.create',compact('Category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|size:9', 
            'bought_date' => 'required|date',
            'state' => 'required|string',
            'address' => 'required|string|max:255',
           
          
            'serial_number' => 'required|string|max:255|exists:serial_numbers,serial_number',

            'bill_image' => 'required|image',
            'notes' => 'nullable|string',
            'Installation_Manager' => 'nullable|string|max:255',
            'Purchase_source_phone' => 'nullable|string|max:9',

            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ]);

      
        
       
       
        
        if ($request->hasFile('bill_image')) {
            $billImage = $request->file('bill_image');
            $billImageName = time() . '_bill_image.webp';
            $billImagePath = public_path('bill_images/' . $billImageName);
            
            $mainBillImage = Image::make($billImage);
            $mainBillImage->resize(1500, 900, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp');
            $mainBillImage->save($billImagePath);
        }

        $serialNumber = SerialNumber::where('serial_number', $request->serial_number)->first();

        if (!$serialNumber) {
            toastr()->error('الرقم التسلسلي المقدم غير موجود!');
            // إذا لم يتم العثور على الرقم التسلسلي، قم بإرجاع رسالة خطأ
            
        }

        elseif ($serialNumber) {
            $serialNumber->update(['status' => 'not available']);
        }

        $Customer = Customer::create([
            'full_name' => $request->full_name,
            'phone' =>'+963'.$request->phone,
            'bought_date' => $request->bought_date,
            'state' => $request->state,
            'address' => $request->address,
           
            'serial_number' => $request->serial_number,
          
            'product_id' => $serialNumber->product_id, 
            'bill_image' => 'bill_images/' . $billImageName,
            'notes' => $request->notes,
            'Installation_Manager' => $request->Installation_Manager,
            'Purchase_source_phone' => $request->Purchase_source_phone,
            'status'=>'0',
        ]);


   

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.webp';
                $imagePath = public_path('uploads/Customer/' . $imageName);
        
                $img = Image::make($image);
                $img->resize(1500, 900, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp');
                $img->save($imagePath);
        
              
                $Customer->images()->create(['filename' => $imageName]);
            }
        }

      
        toastr()->success('A verification code has been sent!');

        return redirect()->route('customers');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->warranty_status = $customer->isWarrantyValid() ? 'فعال' : 'منتهي';
        return view('back.customers.show', compact('customer'));
    }


    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
     

        return view('back.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|size:9',
            'bought_date' => 'required|date',
            'state' => 'required|string',
            'address' => 'required|string|max:255',
          
            'serial_number' => 'required|string|max:255|exists:serial_numbers,serial_number',

           
          
            'bill_image' => 'nullable|image',
            'notes' => 'nullable|string',
            'Installation_Manager' => 'nullable|string|max:255',
            'Purchase_source_phone' => 'nullable|string|max:9',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

      

        if ($request->hasFile('bill_image')) {
            $billImage = $request->file('bill_image');
            $billImageName = time() . '_bill_image.webp';
            $billImagePath = public_path('bill_images/' . $billImageName);
            
            Image::make($billImage)->resize(1500, 900)->encode('webp')->save($billImagePath);
            $customer->bill_image = 'bill_images/' . $billImageName;
        }

        $serialNumber = SerialNumber::where('serial_number', $request->serial_number)->first();

        if (!$serialNumber) {
            toastr()->error('الرقم التسلسلي المقدم غير موجود!');
            return redirect()->back();
        }

        $oldSerialNumber = $customer->serial_number;

        if ($oldSerialNumber && $oldSerialNumber !== $request->serial_number) {
            SerialNumber::where('serial_number', $oldSerialNumber)->update(['status' => 'available']);
        }

        $serialNumber->update(['status' => 'not available']);

        $customer->update([
            'full_name' => $request->full_name,
            'phone' => '+963' . $request->phone,
            'bought_date' => $request->bought_date,
            'state' => $request->state,
            'address' => $request->address,
            
            'product_id' => $serialNumber->product_id,
            'serial_number' => $request->serial_number,
            'notes' => $request->notes,
            'Installation_Manager' => $request->Installation_Manager,
            'Purchase_source_phone' => $request->Purchase_source_phone,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.webp';
                $imagePath = public_path('uploads/Customer/' . $imageName);
            
                Image::make($image)->resize(1500, 900)->encode('webp')->save($imagePath);
            
                $customer->images()->create(['filename' => $imageName]);
            }
        }

        toastr()->success('Customer details updated successfully!');
        return redirect()->route('customers');
    }


    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        $oldSerialNumber = $customer->serial_number;

        if ($oldSerialNumber) {
            SerialNumber::where('serial_number', $oldSerialNumber)->update(['status' => 'available']);
        }

        if($customer->images)
        {
            foreach ($customer->images as $image) {
                $imagePath = public_path('uploads/Customer/' . $image->filename);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }
        }

        if ($customer->bill_image) {
            $bill_images = public_path('bill_images/' . $customer->bill_image);
            if (file_exists($bill_images)) {
                unlink($bill_images);
            }
        }

        $customer->delete();
        toastr()->error('Data has been deleted successfully!');

        return redirect()->back();
    }



    public function filterCustomer(Request $request)
    {
        $query = Customer::query();
    
        if ($request->filled('bought_date')) 
        {
            $query->where('bought_date', $request->bought_date);
        }

        if ($request->filled('full_name')) 
        {
            $query->where('full_name', $request->full_name);
        }

        if ($request->filled('phone')) 
        {
            $query->where('phone', $request->phone);
        }

        if ($request->filled('state')) 
        {
            $query->where('state', $request->state);
        }
      
        if ($request->filled('product_id')) 
        {
            $query->where('product_id', $request->product_id);
        }
      
        if ($request->filled('serial_number')) 
        {
            $query->where('serial_number', $request->serial_number);
        }
        
     
    
        $customers = Customer::orderby('id', 'desc')->get();
        foreach ($customers as $customer) {
                   $customer->warranty_status = $customer->isWarrantyValid() ? 'فعال' : 'منتهي';
               }
    
        $Customers = $query->get();
        $product =Product::select('id','name_ar','name_en')->get();
        $SerialNumber = SerialNumber::select('serial_number')->get();
        return view('back.customers.filter', compact('customers','Customers','product','SerialNumber'));
    }



}
