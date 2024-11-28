@extends('back.index')
@section('content')


<div class="container-fluid my-5">
    
                <h1 class="text-center mb-4">Customer Details</h1>

                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title mb-0">{{ $customer->full_name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Basic Customer Information -->
                            <div class="col-md-6">
                                <h5>Customer Information</h5>
                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item"><strong>Phone:</strong> {{ $customer->phone }}</li>
                                   
                                    <li class="list-group-item"><strong>Status:</strong> {{ $customer->state }}</li>
                                    <li class="list-group-item"><strong>Address:</strong> {{ $customer->address }}</li>

                                    <li class="list-group-item"><strong>Installation Manager:</strong> {{ $customer->Installation_Manager ?? 'Not available' }}</li>
                                    <li class="list-group-item"><strong>Purchase Source Phone:</strong> {{ $customer->Purchase_source_phone ?? 'Not available' }}</li>

                                    <li class="list-group-item"><strong>Purchase Date:</strong> {{ $customer->bought_date }}</li>
                                    <li class="list-group-item"><strong>Notes:</strong> {{ $customer->notes ?? 'No notes available' }}</li>

                                </ul>
                            </div>

                            <!-- Additional Information -->
                            <div class="col-md-6">
                                <h5>Additional Information</h5>
                                <ul class="list-group list-group-flush mb-4">

                                 
                                    <li class="list-group-item"><strong>Product:</strong> {{ $customer->product->name_en ?? 'Not available' }}</li>
                                    <li class="list-group-item"><strong>Serial Number:</strong> {{ $customer->serial_number }}</li>
                                    <li class="list-group-item"><strong>Warranty Period Product:</strong> {{ $customer->product->warranty_period ?? 'Not available' }} {{ $customer->product->warranty_unit ?? 'Not available' }}</li>
                                    <li class="list-group-item"><strong>He entered the code:</strong> 
                                        @if ($customer->status == 1  )
                                            <span class="badge bg-success text-4">Yes</span>
                                        @else
                                        <span class="badge bg-danger text-4">No</span>

                                                
                                        @endif
                                    </li>


                                    
                                </ul>
                            </div>

                            <div class="col-md-12 d-flex justify-content-center align-items-center">
                                <li class="list-group-item text-center">
                                    <strong>warranty status:</strong> 
                                    
                                    @if ($customer->warranty_status == 'فعال')
                                        <span class="badge bg-success text-4">Active</span>
                                    @else
                                    
                                        <span class="badge bg-danger text-4">Not Active</span>

                                    @endif
                                </li>
                            </div>
                            
                        </div>

                        <!-- Display Images -->
                        <h5 class="mt-4">Images</h5>
                        <div class="row">
                       
                            <div class="col-md-3">
                                <strong>Bill Image:</strong>
                                @if($customer->bill_image)
                                    <img src="{{ asset($customer->bill_image) }}" alt="Bill Image" class="img-fluid rounded" style="max-height: 300px;"/>
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                        </div>

                        <!-- Additional Images -->
                        <h5 class="mt-4">Additional Images</h5>
                        <div class="row">
                            @foreach($customer->images as $image)
                                <div class="col-md-3 mb-3 text-center">
                                    <img src="{{ asset('uploads/Customer/' . $image->filename) }}" alt="Additional Image" class="img-fluid rounded shadow-sm mb-2" style="max-height: 200px;"/>
                                    <div>
                                        <a href="{{ asset('uploads/Customer/' . $image->filename) }}" download="{{ $image->filename }}" class="btn btn-primary btn-sm mt-2">
                                            Download
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('customers') }}" class="btn btn-secondary">Back to Customer List</a>
                        {{-- <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a> --}}
                        {{-- <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                        </form> --}}
                    </div>
                </div>
      
</div>

@endsection
