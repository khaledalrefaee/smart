@extends('back.index')
@section('content')


	<!-- container -->
    <div class="container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Tables</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Product</span>
                </div>
            </div>
            <div class="d-flex my-xl-auto right-content">
              
                <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20">
                    
                    <a type="button" href="{{route('product.create')}}" class="btn btn-info btn-icon mr-2" class="modal-effect  btn-block"
                    title="Add" >
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
                                    @foreach ($products as $item)
                                        
                                 
                                        <tr>
                                            <td>
                                                @if ($item->images->isNotEmpty())
                                                <img class="d-inline-block rounded-circle" src="{{ asset('uploads/' . $item->images->first()->filename) }}" alt="Product Image" style="max-width: 50%;">
                                                @endif
                                            </td>
                                            <td>{{$item->category->name_en}} / {{$item->category->name_ar}}</td>
                                            <td>{{$item->name_en}}</td>
                                            <td>{{$item->name_ar}}</td>
                                 
                                        
                                            

                                            <td>
                                                    <a href="{{route('product.show',$item->id)}}" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                                    <a href="{{route('product.edit',$item->id)}}" type="button" class="btn btn-warning btn-sm" 
                                                        title="Edit"><i class="fa fa-edit"></i>
                                                    </a>

                                                   
                                                    
                                                    <a class="btn ripple btn-danger btn-sm" data-target="#modaldemo5_delete{{ $item->id }}" data-toggle="modal" href=""><i class="fa fa-trash"></i></a>
                                                    @include('back.product.delete')
                                                     {{-- @include('back.subcategory.edit') --}}
                                                 
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
    





@endsection