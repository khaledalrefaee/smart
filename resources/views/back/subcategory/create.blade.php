
 <!-- Modal effects -->
 
 
 
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Add Sub Category
                            </div>
                           
                            <form action="{{route('sub.category.store')}}" data-parsley-validate="" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">Name Arabic : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="name_ar" placeholder="Name Arabic" value="{{old('name_ar')}}"  type="text">
    
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Name English : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="name_en" placeholder="Name English" value="{{old('name_en')}}"  type="text">
    
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">Abbreviation name : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="Abbreviation_name"  placeholder="Abbreviation name" value="{{old('Abbreviation_name')}}" type="text">
                                          

                                           
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Image : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="image" id="imageInput" type="file" accept="image/*" onchange="previewImage(event)">
                                        </div>
                                    </div>
                                    
                                    
                                        <div class="parsley-select col-lg-12 col-md-12" id="slWrapper">
                                            <label class="form-label">category  : <span class="tx-danger">*</span></label>

                                            <select required name="catgory_id"class="form-control select2" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one" >
                                                <option  label="Choose one" >
                                                </option>
                                                @foreach ($Category as $item)
                                                    <option value="{{ $item->id }}" {{ old('catgory_id') == $item->id ? 'selected' : '' }}>
                                                        {{$item->name_en}} / {{$item->name_ar}}
                                                    </option>
                                                @endforeach
                                            
                                            </select>
                                            <div id="slErrorContainer"></div>
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
    </div>
    <!-- End Modal effects-->


