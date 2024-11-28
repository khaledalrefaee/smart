<!-- Modal effects -->
<div class="modal" id="modaldemo8_edit{{ $item->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            edit category {{$item->name_en}}
                        </div>
                       
                        <form action="{{route('category.update',$item->id)}}" enctype="multipart/form-data"  data-parsley-validate="" method="POST">
                            @csrf
                            <div class="row row-sm">
                                <div class="col-6">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">Name Arabic : <span class="tx-danger">*</span></label>
                                        <input required="" class="form-control" name="name_ar" placeholder="" value="{{$item->name_ar}}"  type="text">

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Name English : <span class="tx-danger">*</span></label>
                                        <input required="" class="form-control" name="name_en" placeholder="" value="{{$item->name_en}}"  type="text">

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">Icon : <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="icon" id="iconInputedit" type="file" accept="image/*" onchange="previewIcon(event)">
                                      
                                            <img class="bg-grey" id="iconPreviewedit" src="" alt="Icon Preview" style="display:none; margin-top: 10px; background-color: gray;" width="100" />

                                       
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Image : <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="image" id="imageInputedit" type="file" accept="image/*" onchange="previewImage(event)">
                                        <img id="imagePreviewedit" src="" alt="Image Preview" style="display:none; margin-top: 10px;" width="100" />
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
    const iconInputedit = document.getElementById('iconInputedit');
    const iconPreviewedit = document.getElementById('iconPreviewedit');

        const file = iconInputedit.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                iconPreviewedit.src = e.target.result;
                iconPreviewedit.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }

    function previewImage(event) {
        const imageInputedit = document.getElementById('imageInputedit');
        const imagePreviewedit = document.getElementById('imagePreviewedit');

        const file = imageInputedit.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreviewedit.src = e.target.result;
                imagePreviewedit.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
</script>