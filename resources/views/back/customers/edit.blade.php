@extends('back.index')
@section('content')


	<!-- container -->
    <div class="container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Forme</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0"> edit / {{$customer->full_name}} Customers</span>
                </div>
            </div>
        
        </div>

        <form method="POST" id="frm" action="{{ route('update.customers', $customer->id) }}" data-parsley-validate="" enctype="multipart/form-data">
            @csrf
            
            <div class="container p-4 border rounded shadow-sm bg-white">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        
                <div class="text-center mb-4">
                    <h1 class="display-4 font-weight-bold" style="color: #495057">Update Warranty Information</h1>
                </div>
        
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" name="full_name" value="{{ old('full_name', $customer->full_name) }}" required>
                        </div>
        
                        <div class="form-group mb-3">
                            <label>Bought Date:</label>
                            <input type="date" class="form-control" name="bought_date" value="{{ old('bought_date', $customer->bought_date) }}" max="{{ date('Y-m-d') }}" required>
                        </div>
        
                        <div class="form-group mb-3">
                            <label>Installation Manager (optional):</label>
                            <input type="text" class="form-control" name="Installation_Manager" value="{{ old('Installation_Manager', $customer->Installation_Manager) }}">
                        </div>
        
                        <div class="form-group mb-3">
                            <label>Purchase Source Phone (optional):</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img src="https://flagcdn.com/sy.svg" alt="Country Flag" width="20"> +963
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="Purchase_source_phone" value="{{ old('Purchase_source_phone', $customer->Purchase_source_phone) }}" maxlength="9">
                            </div>
                        </div>
        
                        <div class="form-group mb-3">
                            <label>Bill Image:</label>
                            <input type="file" class="form-control" name="bill_image" accept="image/*">
                            @if($customer->bill_image)
                                <small>Current Image:</small>
                                <br>
                                <img src="{{ asset($customer->bill_image) }}" alt="Bill Image" width="80" height="80" style="border-radius: 4px; margin-top: 5px;">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Serial Number:</label>
                            <input type="text" class="form-control" name="serial_number" value="{{ old('serial_number', $customer->serial_number) }}" required>
                        </div>
                    </div>
        
                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Phone:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img src="https://flagcdn.com/sy.svg" alt="Country Flag" width="20"> +963
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone', str_replace('+963', '', $customer->phone)) }}" maxlength="9" required>
                            </div>

                          
                        </div>
        
                        <div class="form-group mb-3">
                            <label>State:</label>
                            <select name="state" class="form-control" required>
                                <option value="Damascus" {{ $customer->state == 'Damascus' ? 'selected' : '' }}>Damascus</option>
                                <!-- Add more states as needed with conditional selection based on current data -->
                            </select>
                        </div>
        
                        <div class="form-group mb-3">
                            <label>Address:</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address', $customer->address) }}" required>
                        </div>
        
                        <div class="form-group mb-3">
                            <label>Notes (optional):</label>
                            <textarea name="notes" class="form-control" rows="2">{{ old('notes', $customer->notes) }}</textarea>
                        </div>
        
                        <div class="form-group mb-3">
                            <label>Installation Images (optional):</label>
                            <input type="file" class="form-control" name="images[]" multiple accept="image/*">


                            @foreach($customer->images as $image)
                                <div class="col-md-3 mb-3 text-center">
                                    <img src="{{ asset('uploads/Customer/' . $image->filename) }}" alt="Additional Image" class="img-fluid rounded shadow-sm mb-2" style="max-height: 200px;"/>
                                    <div>
                                        <a href="{{ asset('uploads/Customer/' . $image->filename) }}" download="{{ $image->filename }}" class="btn btn-primary btn-sm mt-2">
                                            Download
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        
              
        
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
                </div>
            </div>
        </form>
        
    </div>


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