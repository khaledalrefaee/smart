<?php

namespace App\Http\Controllers\front;

use App\Models\Otp;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\SubCatygory;
use App\Models\SerialNumber;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class FrontController extends Controller
{
    public function home(){
        $products = Product::where('popular','yes')->paginate(4);
        $Category =  Category::where('active','1')->orderby('id','desc')->get();
        return view('front.content',compact('Category','products'));
    }

    public function about_us(){
        return view('front.front.about_us');
    }

    public function contact_us(){
        return view('front.front.contact-us');
    }


    public function contactus_Send(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone'=>'required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $msg = $request->message;
    
        $message = "Sender Email is : " . $email . "His Name " . $name . "And this Message From Sender: ".$msg;
        $subject = "Smart Contanct US Using Website";
        
   
        mail("info@smart-battery.com", $subject, $message);
        
        toastr()->success('Thank you for contacting us, we will contact you immediately !', 'Success');
        return redirect()->back();
    }


    public function categories(){
        $Category =  Category::where('active','1')->orderby('id','desc')->paginate(15);
        return view('front.front.categories',compact('Category'));    
    }
  
    public function sub_category($slug){
        $categories =  Category::where('active','1')->get();

        $Category =  Category::where('active','1')->where('slug_en',$slug)->firstOrFail();
        return view('front.category.show',compact('Category','categories'));
    }


    public function sub_category_product($slug){
        $categories =  Category::where('active','1')->get();

        $sub_Category =  SubCatygory::where('slug_en',$slug)->firstOrFail();
        return view('front.subcategories.index',compact('categories','sub_Category'));
    }

    public function products_show($slug){

        $product = Product::where('slug_en',$slug)->firstOrFail();

        if ($product->products()->exists()) {
            $similarProducts = $product->products()->where('id', '!=', $product->id)->get();
        } elseif ($product->product) {
            $similarProducts = $product->product()->where('id', '!=', $product->id)->get();
        } else {
            $similarProducts = collect();
        }

        
        return view('front.product.show',compact('product','similarProducts'));
    }
   


        public function search(Request $request)
    {

        $query = $request->input('query');

        $products = Product::where('name_ar', 'LIKE', "%{$query}%")
        ->orWhere('name_en', 'LIKE', "%{$query}%")
        ->get();


        $resultsCount = $products->count();

        return view('front.product.search_results', compact('products', 'query', 'resultsCount'));
    }

    public function guest_add(){
        $Category =  Category::where('active','1')->get();

        return view('front.ewarranty.guest_add',compact('Category'));
    }


    public function store_customer(Request $request)
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
            // إذا لم يتم العثور على الرقم التسلسلي، قم بإرجاع رسالة خطأ
            return response()->json([
                'message' => 'The provided serial number does not exist.',
            ], 400);
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

     
       

        session([
            'form_data.full_name' => $request->full_name,
            'form_data.phone' => $request->phone,
            'form_data.bought_date' => $request->bought_date,
            'form_data.Installation_Manager' => $request->Installation_Manager,
            'form_data.Purchase_source_phone' => $request->Purchase_source_phone,
            'form_data.address' => $request->address,
            // Add other fields as needed
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
        
                // // التحقق من البيانات قبل الحفظ
                // dd($imagePath);
        
                // حفظ بيانات الصورة في جدول images
                $Customer->images()->create(['filename' => $imageName]);
            }
        }

        Otp::where('phone', $request->phone)
        ->where('serial_number', $request->serial_number)
        ->delete();
    
        $otp = new Otp();  
        $otp->phone = '+963'.$request->phone; 
        $otp->generateCode(); 
        $otp->serial_number = $request->serial_number; 
        $otp->save();

        $this->otpwhatsapp($request, $otp->code,$otp->serial_number);

        session(['phone' => $request->phone, 'serial_number' => $request->serial_number]);
        toastr()->success('A verification code has been sent!');

        return redirect()->route('guest-check');
    }


    public function otpwhatsapp(Request $request , $otpCode ,$serial_number){

        $message = 'Your OTP code is: ' . $otpCode .' For the product has serial number ' . $serial_number;

        $params=array(
        'token' => 'gdw3xjtzts7mtkco',
        'to' => $request->phone,
        'body' => $message,
        'priority' => '1',
        'referenceId' => '',
        'msgId' => '',
        'mentions' => ''
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.ultramsg.com/instance99995/messages/chat",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => http_build_query($params),
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        // echo "cURL Error #:" . $err;
        } else {
        // echo $response;
        }
    }
    
    public function guest_check(){
        $phone = session('phone');
        $serial_number = session('serial_number');
        return view('front.ewarranty.check',compact('serial_number','phone'));
    }

    public function checkCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'phone' => 'nullable|string',
            'serial_number' => 'nullable|string',
        ]);
    
        $code = $request->input('code');
    
        // ابحث عن OTP بناءً على الكود، ورقم الهاتف، والرقم التسلسلي
        $otp = Otp::where('code', $code)
                    ->where('phone', $request->phone)
                    ->where('serial_number', $request->serial_number)
                    ->first();
    
        // تحقق إذا لم يتم العثور على OTP
        if (!$otp) {
            toastr()->error('لم يتم العثور على OTP !');
            return back();
        }
    
        // تحقق من انتهاء صلاحية الكود
        if (now() > $otp->expires_at) {
            toastr()->error('انتهت صلاحية OTP!');
            return back();
        }
    
        // إذا كان كل شيء صحيح، قم بتحديث الحالة في جدول العملاء
        $customer = Customer::where('phone', $request->phone)
                            ->where('serial_number', $request->serial_number)
                            ->first();
    
        if ($customer) {
            $customer->update(['status' => 1]);
            toastr()->success('تم تفعيل الضمان!');
        } else {
            toastr()->error('لم يتم العثور على العميل!');
        }
    
        return back();
    }
    
}
