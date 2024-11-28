@extends('back.index')
@section('content')


	<!-- container -->
    <div class="container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <div class="d-flex">
                        <h4 class="content-title mb-0 my-auto">Form Create</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Procuct</span>
                    </div>
                </div>
             
            </div>
            <!-- breadcrumb -->

        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                    
                    
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{route('product.store')}}" data-parsley-validate="" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row row-sm">

                              

                                <div class="parsley-select col-lg-4 col-md-4" id="slWrapper">
                                    <label class="form-label">Category: <span class="tx-danger">*</span></label>
                                    <select name="category_id" id="category_id" class="form-control select2" required>
                                        <option value="">Choose one</option>
                                        @foreach ($Category as $item)
                                            <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name_en }} / {{ $item->name_ar }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="parsley-select col-lg-4 col-md-4" id="slWrapper">
                                    <label class="form-label">Subcategory: <span class="tx-danger">*</span></label>
                                    <select name="sub_category_id" id="sub_category_id" class="form-control select2" required>
                                        <option value="">Choose one</option>
                                    </select>
                                </div>
                                
                          
                                
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Choose Input Method: <span class="tx-danger">* من فضلك انه حساس جدا</span></label>
                                        <select id="inputMethod" class="form-control" onchange="toggleInputMethod()">
                                            <option value="paste">Paste Serial Numbers</option>
                                            <option value="file">Upload File</option>
                                        </select>
                                    </div>
                                    
                                    <div id="pasteInput" class="col-12" style="display: block;">
                                        <div class="form-group">
                                            <label class="form-label">Paste Serial Numbers (one per line): <span class="tx-danger">* كل serial في سطر </span></label>
                                            <textarea id="serialNumbers" class="form-control" name="serial_numbers" placeholder="Enter serial numbers, one per line..." rows="5"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div id="fileInput" class="col-12" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label">Upload File (.xlsx or .csv): <span class="tx-danger">* يأخذ اول row كاملا</span></label>
                                            <input id="serialFile" accept=".xlsx,.csv" class="form-control" name="serial_file" type="file">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-6">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">warranty period : <span class="tx-danger">*</span></label>
                                        <input required="" class="form-control" name="warranty_period" placeholder="warranty period" value="{{old('warranty_period')}}"  type="number">

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">warranty unit : <span class="tx-danger">*</span></label>
                                        <select name="warranty_unit" id="warranty_unit" class="form-control select2" required>
                                            <option value="">Choose one</option>
                                            
                                            <option value="months" {{ old('warranty_unit') == 'months' ? 'selected' : '' }}>
                                                months
                                            </option>
                                        
                                            <option value="years" {{ old('warranty_unit') == 'years' ? 'selected' : '' }}>
                                                years
                                            </option>
                                        </select>
                                        

                                    </div>
                                </div>

                                
                                <div class="col-4">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">Name Arabic : <span class="tx-danger">*</span></label>
                                        <input required="" class="form-control" name="name_ar" placeholder="Name Arabic" value="{{old('name_ar')}}"  type="text">

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Name English : <span class="tx-danger">*</span></label>
                                        <input required="" class="form-control" name="name_en" placeholder="Name English" value="{{old('name_en')}}"  type="text">

                                    </div>
                                </div>



                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Popular: <span class="text-danger">*</span></label>

                                        <div>
                                            <label class="form-check-label" style="margin-right: 10px;">
                                                <input type="radio" name="popular" value="yes" {{ old('popular') == 'yes' ? 'checked' : '' }} required> Yes
                                            </label>
                                            <label class="form-check-label">
                                                <input type="radio" name="popular" value="no" {{ old('popular') == 'no' ? 'checked' : '' }} required> No
                                            </label>
                                        </div>
                                    </div>
                                </div>

                              

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Description Arabic : <span class="tx-danger">*</span></label>
                                        <textarea required="" name="description_ar" class="form-control" placeholder="Description Arabic" cols="10" rows="4">{{old('description_ar')}}</textarea>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Description English : <span class="tx-danger">*</span></label>
                                        <textarea  required="" name="description_en" class="form-control" placeholder="Description English" cols="10" rows="4">{{old('description_en')}}</textarea>


                                    </div>
                                </div>


                             
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Made In: <span class="text-success">(option)</span></label>
                                        <input  class="form-control" name="made" placeholder="made" value="{{old('made')}}"  type="text">

                                    </div>
                                </div>
                             

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Capacities : <span class="text-success">(option)</span></label>
                                        <input  class="form-control" name="capacities" placeholder="capacities" value="{{old('capacities')}}"  type="text">

                                    </div>
                                </div>

                              

                                
                               
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Weight : <span class="text-success">(option)</span></label>
                                        <input  class="form-control" name="weight" placeholder="weight" value="{{old('weight')}}"  type="text">

                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Terminals : <span class="text-success">(option)</span></label>
                                        <input  class="form-control" name="terminals" placeholder="terminals" value="{{old('terminals')}}"  type="text">

                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Cycles : <span class="text-success">(option)</span></label>
                                        <input  class="form-control" name="cycles" placeholder="cycles" value="{{old('cycles')}}"  type="text">

                                    </div>
                                </div>


                               

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">datasheet : <span class="text-success">(option)</span></label>
                                        <input class="form-control" name="datasheet" id="datasheetInput" type="file" accept=".pdf,.doc,.docx" >
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">user_manual : <span class="text-success">(option)</span></label>
                                        <input class="form-control" name="user_manual" id="userManualInput" type="file" accept=".pdf,.doc,.docx" >
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Images: <span class="tx-danger">*</span></label>
                                        <input required="" class="form-control" name="images[]" id="imageInput" type="file" accept="image/*" multiple onchange="previewImages(event)">
                                    </div>
                                    <div id="imagePreviewContainer"></div>
                                </div>
                                
                                
                                
                                  
                                
                            
                            </div>


                                <div class="modal-footer">
                                    <button class="btn ripple btn-primary " type="submit">Save</button>
                                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('select[name="category_id"]').on('change', function(){
                var categoryId = $(this).val();
                
                if(categoryId) {
                    $.ajax({
                        url: '/admin/get/subcategory/by/' + categoryId,
                        type: "get",
                        dataType: "json",
                        success: function(data) {
                            console.log(data); 

                            var subcategorySelect = $('select[name="sub_category_id"]');
                            subcategorySelect.empty();
                            subcategorySelect.append('<option value="">اختر الفئة الفرعية</option>');

                            $.each(data, function(key, value){
                                subcategorySelect.append('<option value="'+ value.id +'">'+ value.name_en +' / '+ value.name_ar +'</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("حدث خطأ: " + error);
                        }
                    });
                } else {
                    $('select[name="sub_category_id"]').empty();
                    $('select[name="sub_category_id"]').append('<option value="">اختر الفئة الفرعية</option>');
                }
            });
        });




    </script>
    
    <script>
        function toggleInputMethod() {
            const inputMethod = document.getElementById("inputMethod").value;
            const pasteInput = document.getElementById("pasteInput");
            const fileInput = document.getElementById("fileInput");
            const serialNumbers = document.getElementById("serialNumbers");
            const serialFile = document.getElementById("serialFile");
    
            if (inputMethod === "paste") {
                pasteInput.style.display = "block";
                fileInput.style.display = "none";
                serialNumbers.required = true; // جعل النص إلزامياً
                serialNumbers.value = ""; // تنظيف الحقل في حال تم استخدامه مسبقًا.
                serialNumbers.setAttribute("name", "serial_numbers"); // تعيين الاسم
                serialFile.removeAttribute("name"); // إزالة الاسم من الملف
            } else if (inputMethod === "file") {
                pasteInput.style.display = "none";
                fileInput.style.display = "block";
                serialNumbers.required = false; // عدم إلزام النص
                serialNumbers.value = ""; // تفريغ الحقل.
                serialNumbers.removeAttribute("name"); // إزالة الاسم من النص
                serialFile.setAttribute("name", "serial_file"); // تعيين الاسم للملف
            }
        }
    </script>
    
    

<script>
    
    
    function previewImages(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('imagePreviewContainer');
    
    previewContainer.innerHTML = ''; // مسح أي محتوى سابق
    
    Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100px';
            img.style.margin = '5px';
            previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
}
</script>
@endsection