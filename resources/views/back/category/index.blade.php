@extends('back.index')
@section('content')


	<!-- container -->
    <div class="container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Tables</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Category</span>
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

                                        <th class="wd-15p border-bottom-0"> Name Arabic</th>
                                        <th class="wd-15p border-bottom-0"> NamE English</th>
                                        <th class="wd-20p border-bottom-0">icon</th>
                                        <th class="wd-15p border-bottom-0">status</th>
                                        <th class="wd-25p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Category as $item)
                                        
                                 
                                        <tr>
                                            <td><img style="" class="avatar avatar-xl brround mCS_img_loaded" src="{{ asset($item->image) }}"></td>

                                            <td>{{$item->name_ar}}</td>
                                            <td>{{$item->name_en}}</td>
                                            <td ><img style="background-color: gray ; width: 50px; height: 50px;" src="{{ asset($item->icon) }}"></td>
                                        
                                            <td>
                                                <div class="checkbox-wrapper-8">
                                                    <input type="checkbox" id="cb3-8-{{$item->id}}" class="tgl tgl-skewed" data-id="{{$item->id}}" {{ $item->active ? 'checked' : '' }}>
                                                    <label for="cb3-8-{{$item->id}}" data-tg-on="ON" data-tg-off="OFF" class="tgl-btn"></label>
                                                </div>
                                            </td>
                                            

                                            <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#modaldemo8_edit{{ $item->id }}"
                                                        title="Edit"><i class="fa fa-edit"></i>
                                                    </button>
                                                    
                                                    <a class="btn ripple btn-danger btn-sm" data-target="#modaldemo5_delete{{ $item->id }}" data-toggle="modal" href=""><i class="fa fa-trash"></i></a>
                                                    @include('back.category.delete')
                                                    @include('back.category.edit')
                                                 
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
    
    <!-- Container closed -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.tgl').on('change', function() {
                var Id = $(this).data('id');
                var active = $(this).is(':checked') ? 1 : 0;
    
                $.ajax({
                    url: '/admin/Categories/update-active/'+ Id,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        active: active
                    },
                    success: function(response) {
                      Swal.fire({
                            title: "Good job!",
                            text: "Modified successfully",
                            icon: "success"
                          });
                    },
                    error: function(response) {
                        alert('Failed to update user status!');
                    }
                });
            });
        });
    </script>



@include('back.category.create')
@endsection