@extends('front.index')
@section('content')
<style>

.bg-add {
  position: absolute;
  width: 60vmin;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: auto;
}
</style>
{{-- <img class="bg-add"  src="{{asset('front/img_front/bg-add.svg')}}" alt=""> --}}





<form method="POST" class="" id="frm" action="{{ route('customers.store') }}" data-parsley-validate="" enctype="multipart/form-data">
    @csrf

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex">
            @if (app()->getLocale() == 'ar')
                <a class="h2 text-secondary" href="{{route('user-warranty')}}"><i class="fa-solid fa-chevron-right" style="color: #b4b4b8"></i></a>
                <h1  class="display-4  font-weight-bold mx-auto text-center" style="color: #b4b4b8"> {{__('route.Add a new warranty')}} </h1>
            @else   
                <h1  class="display-4  font-weight-bold mx-auto text-center" style="color: #b4b4b8"> {{__('route.Add a new warranty')}} </h1>
                <a class="h2 text-secondary" href="{{route('user-warranty')}}"><i class="fa-solid fa-chevron-right" style="color: #b4b4b8"></i></a>
        
            @endif
          
        </div>

            <div class="row justify-content-around mt-4">
                <div class="col-12 col-md-6 col-lg-5">
                    

                    <div class="form-group">
                        <label>{{__('route.Full Name')}}:</label>
                        <input type="text" class="form-control" placeholder="{{__('route.Full Name')}}" value="{{ old('full_name', session('form_data.full_name')) }}" name="full_name" required="">
                    </div>
                
            
                    
                    
                    
                    
            
                    
                    <div class="form-group">
                        <label>{{__('route.bought_date')}}:</label>
                        
                        <input  type="date"  class="form-control"  name="bought_date"  value="{{ old('bought_date', session('form_data.bought_date')) }}"   max="{{ date('Y-m-d') }}"  required>
                    </div>

                    <div class="form-group">
                        
                        <label>{{__('route.Installation Manager')}} :
                            <i class="fas fa-question-circle text-primary"  style="cursor:pointer"  data-toggle="tooltip"  data-placement="top"  title="{{__('route.What is the name of the installation manager who supervised the installation')}}"></i>

                        </label>
                    
                        <input type="text" class="form-control" required="
                        " name="Installation_Manager" value="{{session('form_data.Installation_Manager')}}" placeholder="" >
                    </div>
                    

                    <div class="form-group ">
                        <label for="phone">
                            {{__('route.Purchase source phone')}} :
                            <i class="fas fa-question-circle text-primary" style="cursor:pointer"  data-toggle="tooltip"  data-placement="top"  title="{{__('route.What is the phone number of the store you bought from')}}"></i>

                        </label>
                        <div class="input-group">
                            @if (app()->getLocale() == 'ar')
                            
                                <input type="text" id="Purchase_source_phone" required="" class="form-control" placeholder="{{ __('route.Purchase source phone') }}" maxlength="9" minlength="9" value="{{ old('Purchase_source_phone', session('form_data.Purchase_source_phone')) }}"  name="Purchase_source_phone" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img src="https://flagcdn.com/sy.svg" alt="Country Flag" width="20">
                                        +963
                                    </span>
                                </div>    
                            @else
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img src="https://flagcdn.com/sy.svg" alt="Country Flag" width="20">
                                        +963
                                    </span>
                                </div>
                                <input type="text" id="Purchase_source_phone" required="" class="form-control" placeholder="{{ __('route.Purchase source phone') }}" maxlength="9" minlength="9" value="{{ old('Purchase_source_phone', session('form_data.Purchase_source_phone')) }}" name="Purchase_source_phone" required> 
                            @endif                                                                                                                                                      
            
                        </div>
                    </div>
                
               

                    <div class="form-group">
                        <label>{{__('route.bill image')}}:</label>
                        <div class="custom-file">
                            <input type="file" class="form-control" value="" name="bill_image" required="" accept="image/*">
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label>{{__('route.serial_number')}} :</label>
                        <input type="text" class="form-control" name="serial_number" id="serial_number" value="{{old('serial_number')}}" placeholder="{{old('serial_number')}}" required="">
                    </div>
                       
                   

                
                </div>

                <div class="col-12 col-md-6 col-lg-5">
                    
            
                    <div class="form-group ">
                        <label for="phone">{{ __('route.phone') }}:</label>
                        <div class="input-group">
                            @if (app()->getLocale() == 'ar')
                            
                                <input type="text" id="phone" class="form-control" placeholder="{{ __('route.phone') }}" maxlength="9" minlength="9" value="{{ old('phone', session('form_data.phone')) }}" name="phone" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img src="https://flagcdn.com/sy.svg" alt="Country Flag" width="20">
                                        +963
                                    </span>
                                </div>    
                            @else
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img src="https://flagcdn.com/sy.svg" alt="Country Flag" width="20">
                                        +963
                                    </span>
                                </div>
                                <input type="text" id="phone" class="form-control" placeholder="{{ __('route.phone') }}" maxlength="9" minlength="9" value="{{ old('phone', session('form_data.phone')) }}" name="phone" required> 
                            @endif

                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label>{{__('route.state')}}</label>
                
                        <select name="state" id="state" class="form-select  mb-3" required="">
                            <option value="Damascus">{{__('route.Damascus')}}</option>
                            <option value="Al Hasakah">{{__('route.Al Hasakah')}}</option>
                            <option value="Ar Raqqah">{{__('route.Ar Raqqah')}}</option>
                            <option value="Tartus">{{__('route.Tartus')}}</option>
                            <option value="Rif Dimashq">{{__('route.Rif Dimashq')}}</option>
                            <option value="Hims">{{__('route.Hims')}}</option>
                            <option value="Idlib">{{__('route.Idlib')}}</option>
                            <option value="Hamah">{{__('route.Hamah')}}</option>
                            <option value="Halab">{{__('route.Halab')}}</option>
                            <option value="Al Qunaytirah">{{__('route.Al Qunaytirah')}}</option>
                            <option value="Daraa">{{__('route.Daraa')}}</option>
                            <option value="AsSuwayda'">{{__('route.AsSuwayda')}}</option>
                            <option value="Al Ladhiqiyah">{{__('route.Al Ladhiqiyah')}}</option>
                            <option value="Dayr az Zawr">{{__('route.Dayr az Zawr')}}</option>
                    
                        </select>
                            
                    </div>
                    
                    <div class="form-group">
                        <label>{{__('route.Address')}}:</label>
                        <input type="text" class="form-control" placeholder="{{__('route.Address')}}" value="{{ old('address', session('form_data.address')) }}"
                        name="address" required="">
                    </div>
                    
                    <div class="form-group">
                        <label>{{__('route.notes')}} ({{__('route.optional')}}):</label>
                        <textarea placeholder="{{__('route.notes')}}" class="form-control" rows="2" name="notes">{{old('notes')}}</textarea>
                    </div>
                
                    <div class="form-group">
                        <label class="form-label">{{__('route.Installation images')}}: ({{__('route.optional')}})</label>
                        <i class="fas fa-question-circle text-primary" style="cursor:pointer"  data-toggle="tooltip"  data-placement="top"  title="{{__('route.It will be displayed on social media')}}"></i>

                        <input class="form-control" name="images[]" id="imageInput" type="file" accept="image/*" multiple >
                    </div>
                    
                </div>

            </div>
        <br>
        
        
    
           
                        
                    
                        
                    
                    </div>

                    <div class="col-12 d-flex mt-4">
                        <button id="add_btn" type="submit"  style="" class="mx-auto btn btn-primary rounded text-white py-2 px-4">{{__('route.send')}}</button>
                    </div>

                 
                </div> 
            <!-- -------------------------------------------------------------------------------- -->   
            
            
          
            
    </div>
</form>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            // Handle change event for Category
            $('select[name="category_id"]').on('change', function(){
                var categoryId = $(this).val();
                
                if(categoryId) {
                    $.ajax({
                        url: '/admin/get/subcategory/by/' + categoryId,
                        type: "get",
                        dataType: "json",
                        success: function(data) {
                            var subcategorySelect = $('select[name="sub_category_id"]');
                            subcategorySelect.empty();
                            subcategorySelect.append('<option value="">Choose one</option>');
    
                            $.each(data, function(key, value){
                                subcategorySelect.append('<option value="'+ value.id +'">'+ value.name_en +' / '+ value.name_ar +'</option>');
                            });
    
                            // Clear Sub Product options when category changes
                            $('select[name="product_id"]').empty().append('<option value="">Choose one</option>');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error: " + error);
                        }
                    });
                } else {
                    $('select[name="sub_category_id"]').empty().append('<option value="">Choose one</option>');
                    $('select[name="product_id"]').empty().append('<option value="">Choose one</option>');
                }
            });
    
            // Handle change event for Subcategory
            $('select[name="sub_category_id"]').on('change', function(){
                var subCategoryId = $(this).val();
                
                if(subCategoryId) {
                    $.ajax({
                        url: '/admin/get/subproduct/by/' + subCategoryId,
                        type: "get",
                        dataType: "json",
                        success: function(data) {
                            var subProductSelect = $('select[name="product_id"]');
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
                    $('select[name="product_id"]').empty().append('<option value="">Choose one</option>');
                }
            });
        });
    </script>

@endsection