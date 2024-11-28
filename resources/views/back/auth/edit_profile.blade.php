@extends('back.index')
@section('content')


	<!-- container -->
    <div class="container-fluid">

        {{-- <!-- breadcrumb -->
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
        </div> --}}



        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="card w-50 p-4">
                <h3 class="text-center mb-4">Modify admin data</h3>
                <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $admin->phone }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small class="form-text text-muted">Leave it blank if you don't want to change it.</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update data</button>
                </form>
            </div>
        </div>
    </div>
@endsection