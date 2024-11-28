    <!-- Modal effects -->
    <div class="modal" id="modaldemo8_edit{{ $item->id }}">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Edit Sub Category {{$item->name_en}}
                            </div>
                         
                            <form action="{{route('sub.category.update',$item->id)}}" data-parsley-validate="" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">Name Arabic : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="name_ar" placeholder="Name Arabic" value="{{$item->name_ar}}"  type="text">
    
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Name English : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="name_en" placeholder="Name English" value="{{$item->name_en}}"  type="text">
    
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">Abbreviation name : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="Abbreviation_name"  placeholder="Abbreviation name" value="{{$item->Abbreviation_name}}" type="text">
                                          

                                           
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Image : <span class="tx-danger">*</span></label>
                                            <input  class="form-control" name="image" id="imageInput" type="file" accept="image/*" >
                                        </div>
                                    </div>
                                    
                                    
                                        <div class="parsley-select col-lg-12 col-md-12" id="slWrapper">
                                            <label class="form-label">category  : <span class="tx-danger">*</span></label>

                                            <select name="catgory_id" class="form-control select2" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one" required="">
                                                <option label="Choose one">
                                                </option>
                                                @foreach ($Category as $categoryItem)
                                                    <option value="{{ $categoryItem->id }}" {{ $item->catgory_id == $categoryItem->id ? 'selected' : '' }}>
                                                        {{ $categoryItem->name_en }} / {{ $categoryItem->name_ar }}
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


