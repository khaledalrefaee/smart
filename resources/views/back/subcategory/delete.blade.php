<div class="modal" id="modaldemo5_delete{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span></button> 
                    <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger mg-b-20">Look out: are you sure to delete ! {{ $item->name_en}}</h4>
                    <a href="{{route('sub.category.destroy',$item->id)}}" class="btn ripple btn-danger pd-x-25" type="button">Continue</a>
            </div>
        </div>
    </div>
</div>