<div class="modal" id="modaldemo8_show{{ $item->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">View data</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row row-sm">
                    <!-- عرض اسم العميل -->
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">customer name:</label>
                        <p class="form-control-static">{{ $item->customer_name }}</p>
                    </div>
                    <!-- عرض الرقم التسلسلي -->
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">serial number:</label>
                        <p class="form-control-static">{{ $item->serial_number }}</p>
                    </div>


                  
                    <!-- عرض السعر -->
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">price :</label>
                        <p class="form-control-static">{{ $item->price }}</p>
                    </div>

                        <!-- عرض الرقم التسلسلي -->
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">product:</label>
                            <p class="form-control-static">{{ $item->product->name_en }}</p>
                        </div>
                    <!-- عرض الملاحظة -->
                    <div class="col-lg-12 col-md-12">
                        <label class="form-label">note :</label>
                        <p class="form-control-static">{{ $item->note }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>