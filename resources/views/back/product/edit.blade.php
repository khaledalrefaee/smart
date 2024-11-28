@extends('back.index')
@section('content')


	<!-- container -->
    <div class="container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <div class="d-flex">
                        <h4 class="content-title mb-0 my-auto">Form Edit </h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">{{$product->name_en}} / Procuct</span>
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

                        <form action="{{route('product.update',$product->id)}}" data-parsley-validate="" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row row-sm">

                              

                                <div class="parsley-select col-lg-6 col-md-4" id="slWrapper">
                                    <label class="form-label">Category: <span class="tx-danger">*</span></label>
                                    <select name="category_id" id="category_id" class="form-control select2" required>
                                        <option value="">Choose one</option>
                                        @foreach ($Category as $item)
                                            <option value="{{ $item->id }}" 
                                                {{ old('category_id', $product->catgory_id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->name_en }} / {{ $item->name_ar }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                
                                <div class="parsley-select col-lg-6 col-md-4" id="slWrapper">
                                    <label class="form-label">Subcategory: <span class="tx-danger">*</span></label>
                                    <select name="sub_category_id" id="sub_category_id" class="form-control select2" required>
                                        <option value="">Choose one</option>
                                    </select>
                                </div>
                                
                                {{-- <div class="col-4">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">Cereal Number : <span class="tx-danger">*</span></label>
                                        <input required="" class="form-control" name="cereal_number" placeholder="Cereal Number" value="{{$product->cereal_number}}"  type="text">

                                    </div>
                                </div> --}}
                              
                                <div class="col-6">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">warranty period : <span class="tx-danger">*</span></label>
                                        <input required="" class="form-control" name="warranty_period" placeholder="warranty period" value="{{$product->warranty_period}}"  type="text">

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">warranty unit : <span class="tx-danger">*</span></label>
                                        <select name="warranty_unit" id="warranty_unit" class="form-control select2" required>
                                            <option value="">Choose one</option>
                                            
                                            <option value="months" 
                                                {{ (old('warranty_unit') ?? $product->warranty_unit ?? '') == 'months' ? 'selected' : '' }}>
                                                months
                                            </option>
                                        
                                            <option value="years" 
                                                {{ (old('warranty_unit') ?? $product->warranty_unit ?? '') == 'years' ? 'selected' : '' }}>
                                                years
                                            </option>
                                        </select>
                                        
                                        

                                    </div>
                                </div>

                                
                          

                                
                                <div class="col-4">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">Name Arabic : <span class="tx-danger">*</span></label>
                                        <input required="" class="form-control" name="name_ar" placeholder="Name Arabic" value="{{$product->name_ar}}"  type="text">

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Name English : <span class="tx-danger">*</span></label>
                                        <input required="" class="form-control" name="name_en" placeholder="Name English" value="{{$product->name_en}}"  type="text">

                                    </div>
                                </div>



                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Popular: <span class="text-danger">*</span></label>

                                        <div>
                                            <label class="form-check-label" style="margin-right: 10px;">
                                                <input type="radio" name="popular" value="yes" {{ (old('popular') == 'yes' || $product->popular == 'yes') ? 'checked' : '' }} required> Yes
                                            </label>
                                            <label class="form-check-label">
                                                <input type="radio" name="popular" value="no" {{ (old('popular') == 'no' || $product->popular == 'no') ? 'checked' : '' }} required> No
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>

                              

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Description Arabic : <span class="tx-danger">*</span></label>
                                        <textarea required="" name="description_ar" class="form-control" placeholder="Description Arabic" cols="10" rows="4">{{$product->description_ar}}</textarea>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Description English : <span class="tx-danger">*</span></label>
                                        <textarea  required="" name="description_en" class="form-control" placeholder="Description English" cols="10" rows="4">{{$product->description_en}}</textarea>


                                    </div>
                                </div>


                             
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Made In: <span class="text-success">(option)</span></label>
                                        <input  class="form-control" name="made" placeholder="made" value="{{$product->made}}"  type="text">

                                    </div>
                                </div>
                             

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Capacities : <span class="text-success">(option)</span></label>
                                        <input  class="form-control" name="capacities" placeholder="capacities" value="{{$product->capacities}}"  type="text">

                                    </div>
                                </div>

                              

                                
                               
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Weight : <span class="text-success">(option)</span></label>
                                        <input  class="form-control" name="weight" placeholder="weight" value="{{$product->weight}}"  type="text">

                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Terminals : <span class="text-success">(option)</span></label>
                                        <input  class="form-control" name="terminals" placeholder="terminals" value="{{$product->terminals}}"  type="text">

                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Cycles : <span class="text-success">(option)</span></label>
                                        <input  class="form-control" name="cycles" placeholder="cycles" value="{{$product->cycles}}"  type="text">

                                    </div>
                                </div>


                               

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">datasheet: <span class="text-success">(option)</span></label>
                                        <input class="form-control" name="datasheet" id="datasheetInput" type="file" accept=".pdf,.doc,.docx">
                                        @if($product->datasheet)
                                            <div class="mt-2">
                                                <a href="{{ asset($product->datasheet) }}" target="_blank" class="text-primary">View current datasheet</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">user_manual: <span class="text-success">(option)</span></label>
                                        <input class="form-control" name="user_manual" id="userManualInput" type="file" accept=".pdf,.doc,.docx">
                                        @if($product->user_manual)
                                            <div class="mt-2">
                                                <a href="{{ asset($product->user_manual) }}" target="_blank" class="text-primary">View current user manual</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Images: <span class="tx-danger">*</span></label>
                                        <input  class="form-control" name="images[]" id="imageInput" type="file" accept="image/*" multiple onchange="previewImages(event)">
                                    </div>
                                    <div id="imagePreviewContainer">
                                        @if($product->images)
                                        <div class="row">
                                            @foreach($product->images as $image)
                                            <div class="image-preview col-4">
                                                <img src="{{ asset('uploads/' . $image->filename) }}" alt="Image" style="width: 100px; height: auto; margin-right: 10px;">
                                            </div>
                                        @endforeach
                                        </div>
                                         
                                        @endif
                                    </div>
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
        $(document).ready(function() {
            var selectedSubCategoryId = {{ $product->sub_category_id ?? 'null' }}; // الفئة الفرعية المحددة مسبقاً
    
            $('select[name="category_id"]').on('change', function() {
                var categoryId = $(this).val();
    
                if (categoryId) {
                    $.ajax({
                        url: '/admin/get/subcategory/by/' + categoryId,
                        type: "get",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
    
                            var subcategorySelect = $('select[name="sub_category_id"]');
                            subcategorySelect.empty();
                            subcategorySelect.append('<option value="">اختر الفئة الفرعية</option>');
    
                            $.each(data, function(key, value) {
                                var isSelected = (value.id == selectedSubCategoryId) ? 'selected' : ''; // التحقق من الفئة الفرعية المحددة
                                subcategorySelect.append('<option value="' + value.id + '" ' + isSelected + '>' + value.name_en + ' / ' + value.name_ar + '</option>');
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
    
            // تشغيل الحدث change عند تحميل الصفحة إذا كانت هناك فئة محددة مسبقاً
            if ($('select[name="category_id"]').val()) {
                $('select[name="category_id"]').trigger('change');
            }

              // Handle change event for Subcategory
              $('select[name="sub_category_id"]').on('change', function(){
                var subCategoryId = $(this).val();
                
                if(subCategoryId) {
                    $.ajax({
                        url: '/admin/get/subproduct/by/' + subCategoryId,
                        type: "get",
                        dataType: "json",
                        success: function(data) {
                            var subProductSelect = $('select[name="sub_product_id"]');
                            subProductSelect.empty();
                            subProductSelect.append('<option value="">Choose one</option>');
    
                            $.each(data, function(key, value){
                                subProductSelect.append('<option value="'+ value.id +'">'+ value.name_en +' / '+ value.name_ar +'</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("Error: " + error);
                        }
                    });
                } else {
                    $('select[name="sub_product_id"]').empty().append('<option value="">Choose one</option>');
                }
            });
        });
    </script>
    
    
<script>
    
    function previewImages(event) {
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    imagePreviewContainer.innerHTML = ''; // تفريغ المحتوى السابق

    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100px';
            img.style.height = '100px';
            img.style.marginRight = '10px';
            imagePreviewContainer.appendChild(img);
        };

        reader.readAsDataURL(file);
    }
}

</script>
@endsection