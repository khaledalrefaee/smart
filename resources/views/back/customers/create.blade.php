@extends('back.index')
@section('content')


	<!-- container -->
    <div class="container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Forme</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0"> create / Customers</span>
                </div>
            </div>
        
        </div>

       
        <form method="POST" id="frm" action="{{ route('store.customers') }}" data-parsley-validate="" enctype="multipart/form-data">
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
                    <h1 class="display-4 font-weight-bold" style="color: #495057">Add a New Warranty</h1>
                </div>
        
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        
                        <!-- Full Name -->
                        <div class="form-group mb-3">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" name="full_name" placeholder="Full Name" value="{{ old('full_name') }}" required>
                        </div>
        
                        <!-- Bought Date -->
                        <div class="form-group mb-3">
                            <label>Bought Date:</label>
                            <input type="date" class="form-control" name="bought_date" value="{{ old('bought_date') }}" max="{{ date('Y-m-d') }}" required>
                        </div>
        
                        <!-- Installation Manager -->
                        <div class="form-group mb-3">
                            <label>Installation Manager : <i class="fas fa-question-circle text-primary" data-toggle="tooltip" title="Name of the installation manager who supervised the installation"></i></label>
                            <input type="text" required="" class="form-control" name="Installation_Manager" value="{{ old('Installation_Manager') }}" placeholder="">
                        </div>
        
                        <!-- Purchase Source Phone -->
                        <div class="form-group mb-3">
                            <label>Purchase Source Phone : <i class="fas fa-question-circle text-primary" data-toggle="tooltip" title="Phone number of the store"></i></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img src="https://flagcdn.com/sy.svg" alt="Country Flag" width="20"> +963
                                    </span>
                                </div>
                                <input type="text" required="" class="form-control" name="Purchase_source_phone" placeholder="Source phone" maxlength="9" value="{{ old('Purchase_source_phone') }}" >
                            </div>
                        </div>
        
                        <!-- Bill Image -->
                        <div class="form-group mb-3">
                            <label>Bill Image:</label>
                            <input type="file" class="form-control" name="bill_image" accept="image/*">
                        </div>
        
                        
                        <div class="form-group">
                            <label>serial number :</label>
                            <input type="text" class="form-control" name="serial_number" id="serial_number" value="{{old('serial_number')}}" placeholder="{{old('serial_number')}}" required="">
                        </div>
                    </div>
        
                    <!-- Right Column -->
                    <div class="col-md-6">
                        
                        <!-- Phone -->
                        <div class="form-group mb-3">
                            <label>Phone:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img src="https://flagcdn.com/sy.svg" alt="Country Flag" width="20"> +963
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="phone" placeholder="Phone" maxlength="9" value="{{ old('phone') }}" required>
                            </div>
                        </div>
        
                        <!-- State -->
                        <div class="form-group mb-3">
                            <label>State:</label>
                            <select name="state" class="form-control select2" required="">
                                <option value="Damascus">Damascus</option>
                                <option value="Al Hasakah">Al Hasakah</option>
                                <option value="Ar Raqqah">Ar Raqqah</option>
                                <option value="Tartus">Tartus</option>
                                <option value="Rif Dimashq">Rif Dimashq</option>
                                <option value="Hims">Hims</option>
                                <option value="Idlib">Idlib</option>
                                <option value="Hamah">Hamah</option>
                                <option value="Halab">Halab</option>
                                <option value="Al Qunaytirah">Al Qunaytirah</option>
                                <option value="Daraa">Daraa</option>
                                <option value="AsSuwayda'">AsSuwayda</option>
                                <option value="Al Ladhiqiyah">Al Ladhiqiyah</option>
                                <option value="Dayr az Zawr">Dayr az Zawr</option>
                                <!-- Add other options here -->
                            </select>
                        </div>
        
                        <!-- Address -->
                        <div class="form-group mb-3">
                            <label>Address:</label>
                            <input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}" required>
                        </div>
        
                        <!-- Notes -->
                        <div class="form-group mb-3">
                            <label>Notes (optional):</label>
                            <textarea name="notes" class="form-control" rows="2" placeholder="Additional notes">{{ old('notes') }}</textarea>
                        </div>
        
                        <!-- Installation Images -->
                        <div class="form-group mb-3">
                            <label>Installation Images (optional): <i class="fas fa-question-circle text-primary" data-toggle="tooltip" title="To be displayed on social media"></i></label>
                            <input type="file" class="form-control" name="images[]" multiple accept="image/*">
                        </div>

        
                    </div>
                </div>

             
        
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
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