<!-- Modal effects -->
<div class="modal" id="modaldemo8_edit{{ $item->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            edit Note {{$item->note}}
                        </div>
                       
                        <form action="{{ route('Notes.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                         

                            <div class="row row-sm">
                                <!-- اختيار اسم العميل -->
                                <div class="parsley-select col-lg-6 col-md-6">
                                    <label class="form-label">Customer Name: <span class="tx-danger">*</span></label>
                                    <select required name="customer_name" class="form-control select2">
                                        <option label="Choose one"></option>
                                        @foreach ($customer as $customerItem)
                                            <option value="{{ $customerItem->full_name }}"
                                                {{ $item->customer_name == $customerItem->full_name ? 'selected' : '' }}>
                                                {{ $customerItem->full_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- اختيار الرقم التسلسلي -->
                                <div class="parsley-select col-lg-6 col-md-6">
                                    <label class="form-label">Serial Number: <span class="tx-danger">*</span></label>
                                    <select required name="serial_number" class="form-control select2">
                                        <option label="Choose one"></option>
                                        @foreach ($SerialNumber as $serialItem)
                                            <option value="{{ $serialItem->serial_number }}"
                                                {{ $item->serial_number == $serialItem->serial_number ? 'selected' : '' }}>
                                                {{ $serialItem->serial_number }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- إدخال السعر -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Price: <span class="tx-danger">*</span></label>
                                        <input required class="form-control" name="price" type="number" 
                                            value="{{ $item->price }}">
                                    </div>
                                </div>

                                <!-- إدخال الملاحظات -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Note: <span class="tx-danger">*</span></label>
                                        <textarea required class="form-control" name="note">{{ $item->note }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal effects-->