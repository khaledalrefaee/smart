    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Add Category
                            </div>
                           
                            <form action="{{route('category.store')}}" data-parsley-validate="" enctype="multipart/form-data" method="POST">
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

                                    <div class="col-6">
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">Icon : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="icon" id="iconInput" type="file" accept="image/*" onchange="previewIcon(event)">
                                          
                                                <img class="bg-grey" id="iconPreview" src="" alt="Icon Preview" style="display:none; margin-top: 10px; background-color: gray;" width="100" />

                                           
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Image : <span class="tx-danger">*</span></label>
                                            <input required="" class="form-control" name="image" id="imageInput" type="file" accept="image/*" onchange="previewImage(event)">
                                            <img id="imagePreview" src="" alt="Image Preview" style="display:none; margin-top: 10px;" width="100" />
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


    <script>
        function previewIcon(event) {
        const iconInput = document.getElementById('iconInput');
        const iconPreview = document.getElementById('iconPreview');

            const file = iconInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    iconPreview.src = e.target.result;
                    iconPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

        function previewImage(event) {
            const imageInput = document.getElementById('imageInput');
            const imagePreview = document.getElementById('imagePreview');

            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
</script>