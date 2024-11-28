<!-- Modal effects -->
<div class="modal" id="modaldemo8_edit{{ $item->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            edit Serial number {{$item->serial_number}}
                        </div>
                       
                        <form action="{{route('SerialNumber.update',$item->id)}}" enctype="multipart/form-data"  data-parsley-validate="" method="POST">
                            @csrf
                            <div class="row row-sm">
                                <div class="col-6">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">serial number : <span class="tx-danger">*</span></label>
                                        <input required="" class="form-control" name="serial_number" placeholder="" value="{{$item->serial_number}}"  type="text">

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

