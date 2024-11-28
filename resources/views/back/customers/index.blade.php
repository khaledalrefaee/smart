@extends('back.index')
@section('content')


	<!-- container -->
    <div class="container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Tables</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Customers</span>
                </div>
            </div>
            <div class="d-flex my-xl-auto right-content">
              
                <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20">
                    
                    <a href="{{route('create.customers')}}" class="btn btn-info btn-icon mr-2" class="modal-effect  btn-block" >
                        <i class="mdi mdi-plus"></i>
                      
                    </a>
                  
                </div>

               
            </div>


        </div>

 

            <!-- breadcrumb -->
            <div class=" ">
               
                <div class=" ">
                    <form action="{{ route('customers.filter') }}" method="GET">
                        <div class="row">

                            <div class="col-lg-3 ">
                                <label class="form-label">bought date</label>
                                <input type="date" class="form-control" name="bought_date" value="" max="{{ date('Y-m-d') }}" >

                            </div>

                            
                            <div class="col-lg-3 ">
                                <div class="form-group">
                                    <label>State:</label>
                                    <select name="state" id="state" class="form-control select2" >
                                        <option value=""> </option>
                                        <option value="Damascus">Damascus</option>
                                        <option value="Al Hasakah">Al Hasakah</option>
                                        <option value="Ar Raqqah">Ar Raqqah</option>
                                        <option value="Tartus">Tartus</option>
                                        <option value="Rif Dimashq">Rif Dimashq</option>
                                        <option value="Hims">Hims</option>
                                        <option value="Idlib">Idlib</option>
                                        <option value="Hamah">Hamah</option>
                                        <option value="Halab">Halab</option>
                                        <option value="Al Qunaytirah">Al Qunaytirah</option>
                                        <option value="Daraa">Daraa</option>
                                        <option value="AsSuwayda'">AsSuwayda</option>
                                        <option value="Al Ladhiqiyah">Al Ladhiqiyah</option>
                                        <option value="Dayr az Zawr">Dayr az Zawr</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 ">
                                <div class="form-group">
                                    <label>full name:</label>
                                    <select name="full_name" id="full_name" class="form-control select2" >
                                        <option value=""> </option>
                                        @foreach ($customers as $item)
                                            <option value="{{$item->full_name}}">
                                                {{$item->full_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 ">
                                <div class="form-group">
                                    <label>phone:</label>
                                    <select name="phone" id="phone" class="form-control select2" >
                                        <option value=""> </option>
                                        @foreach ($customers as $item)
                                            <option value="{{$item->phone}}">
                                                {{$item->phone}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            


                            <div class="col-lg-3 ">
                                <div class="form-group">
                                    <label>cereal number:</label>
                                    <select name="serial_number" id="cereal_number" class="form-control select2" >
                                        <option value=""> </option>
                                        @foreach ($SerialNumber as $item)
                                            <option value="{{$item->serial_number}}">
                                                {{$item->serial_number}} 
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                        <button type="submit" class="btn btn-primary my-3">Filter</button>
                    </form>
                    
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
                        <div class="text-center mb-3">
                            <a href="{{ route('customers.export') }}" class="btn btn-success">Export to Excel</a>
                        </div>

                        
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Name</th>
                                        <th class="wd-15p border-bottom-0">Phone</th>
                                        <th class="wd-15p border-bottom-0">bought date</th>
                                        <th class="wd-15p border-bottom-0">serial number</th>
                                        <th class="wd-15p border-bottom-0">Warranty Period product</th>


                                        <th class="wd-5p border-bottom-0">status</th>
                                        
                                        <th class="wd-25p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $item)
                                        
                                 
                                        <tr>
                                            {{-- <td><img style="" class="avatar avatar-xl brround mCS_img_loaded" src="{{ asset($item->image) }}"></td> --}}
                                            <td>{{$item->full_name}}</td>
                                            <td>{{$item->phone}}</td>
                                            
                                            <td>{{$item->bought_date}}</td>
                                        
                                            <td>{{$item->serial_number}}</td>
                                            <td>{{ $item->product->warranty_period }} {{ $item->product->warranty_unit }}</td>
                                            <td>
                                                @if ($item->warranty_status == 'فعال')
                                                <span class="badge bg-success text-4">Active</span>
                                            @else
                                            
                                                <span class="badge bg-danger text-4">Not Active</span>
        
                                            @endif
                                            </td>

                                            <td>
                                                    <a href="{{route('customers.edit',$item->id)}}" type="button" class="btn btn-warning btn-sm" ><i class="fa fa-edit"></i></a>

                                                    <a href="{{route('customers.show',$item->id)}}" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                    <a class="btn ripple btn-danger btn-sm" data-target="#modaldemo5_delete{{ $item->id }}" data-toggle="modal" href=""><i class="fa fa-trash"></i></a>
                                                    @include('back.customers.delete')

                                     
                                                 
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
    




{{-- @include('back.subcategory.create') --}}
@endsection