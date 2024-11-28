    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Add Note
                            </div>
                           
                            <form action="{{route('Notes.store')}}" data-parsley-validate="" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row row-sm">
                                    <div class="parsley-select col-lg-6 col-md-6" id="slWrapper">
                                        <label class="form-label">customer name  : <span class="tx-danger">*</span></label>

                                        <select required name="customer_name"class="form-control select2" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one" >
                                            <option  label="Choose one" >
                                            </option>
                                            @foreach ($customer as $item)
                                                <option value="{{ $item->full_name }}" {{ old('customer_name') == $item->full_name ? 'selected' : '' }}>
                                                    {{$item->full_name}} 
                                                </option>
                                            @endforeach
                                        
                                        </select>
                                        <div id="slErrorContainer"></div>
                                    </div>


                                    <div class="parsley-select col-lg-6 col-md-6" id="slWrapper">
                                        <label class="form-label">serial number  : <span class="tx-danger">*</span></label>

                                        <select required name="serial_number"class="form-control select2" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one" >
                                            <option  label="Choose one" >
                                            </option>
                                            @foreach ($SerialNumber as $item)
                                                <option value="{{ $item->serial_number }}" {{ old('serial_number') == $item->serial_number ? 'selected' : '' }}>
                                                    {{$item->serial_number}} 
                                                </option>
                                            @endforeach
                                        
                                        </select>
                                        <div id="slErrorContainer"></div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">price  : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="price" placeholder="" value="{{old('price')}}"   type="number">
    
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">Note : <span class="tx-danger">*</span></label>
                                            <textarea required="" class="form-control" name="note" placeholder="" value="" >{{old('note')}}</textarea>
                                          
                                          

                                           
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
    </div>
    <!-- End Modal effects-->


