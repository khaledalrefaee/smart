    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Add Catalogue
                            </div>
                           
                            <form action="{{route('Catalogue.store')}}" data-parsley-validate="" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">Name Arabic : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="name_ar" placeholder="" value="{{old('name_ar')}}"  type="text">
    
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Name English : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="name_en" placeholder="" value="{{old('name_en')}}"  type="text">
    
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">file : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="file" id="datasheetInput" type="file" accept=".pdf,.doc,.docx" >
                                          

                                           
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


