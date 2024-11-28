@extends('back.index')
@section('content')

<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
 
 padding-left: 16.4rem !important;

}
</style>
	<!-- container -->
    <div class="container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Tables</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Sub Category</span>
                </div>
            </div>
            <div class="d-flex my-xl-auto right-content">
              
                <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20">
                    
                    <a type="button" class="btn btn-info btn-icon mr-2" class="modal-effect  btn-block" data-effect="effect-sign" 
                        data-toggle="modal" title="Add" href="#modaldemo8">
                        <i class="mdi mdi-plus"></i>
                      
                    </a>
                  
                </div>

               
            </div>
        </div>
        <!-- breadcrumb -->

        <!-- row opened -->
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Image</th>
                                        <th class="wd-15p border-bottom-0">Category</th>

                                        <th class="wd-15p border-bottom-0"> NamE English</th>
                                        <th class="wd-15p border-bottom-0"> Name Arabic</th>
                                        
                                        <th class="wd-25p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subCategory as $item)
                                        
                                 
                                        <tr>
                                            <td><img style="" class="avatar avatar-xl brround mCS_img_loaded" src="{{ asset($item->image) }}"></td>
                                            <td>{{$item->category->name_en}} / {{$item->category->name_ar}}</td>
                                            <td>{{$item->name_en}}</td>
                                            <td>{{$item->name_ar}}</td>
                                            
                                        
                                            

                                            <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#modaldemo8_edit{{ $item->id }}"
                                                        title="Edit"><i class="fa fa-edit"></i>
                                                    </button>
                                                    
                                                    <a class="btn ripple btn-danger btn-sm" data-target="#modaldemo5_delete{{ $item->id }}" data-toggle="modal" href=""><i class="fa fa-trash"></i></a>
                                                    @include('back.subcategory.delete')
                                                    @include('back.subcategory.edit')
                                                 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->
        </div>
        <!-- /row -->
    </div>
    




@include('back.subcategory.create')
@endsection