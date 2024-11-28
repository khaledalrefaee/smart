@extends('front.index')
@section('content')

<style>
    .my-round {
        border-radius: 25px;
    }

    .py-4 {
        padding-top: 1.5rem !important;
        padding-bottom: 1.5rem !important;
    }
</style>
<div class="container " style="min-height: calc(100vh - 189px);">
        
    <div>
        <div class="d-flex">
            @if (app()->getLocale() == 'ar')
                <a class="h2 text-secondary" href="{{route('user-warranty')}}"><i class="fa-solid fa-chevron-right " style="color: #b4b4b8"></i></a>
                <h1 style="color: #b4b4b8" class="display-4 font-weight-bold mx-auto text-center">{{__('route.Verification of sponsorship')}}</h1>
            @else

                <h1 style="color: #b4b4b8" class="display-4 font-weight-bold mx-auto text-center">{{__('route.Verification of sponsorship')}}</h1>
                <a class="h2 text-secondary" href="{{route('user-warranty')}}"><i class="fa-solid fa-chevron-right " style="color: #b4b4b8"></i></a>

            @endif
     
        </div>
        <div class="row align-items-center ">
            <div class="col-12 col-lg-6">
                <img class="img-fluid" src="{{asset('front/img_front/paper_2 [Converted]-01.png')}}" alt="">
            </div>
            <div class="col-12 col-lg-6">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="my-card col-12 col-lg-10 ml-auto my-round" style="background:#f9f9f9; padding: 100px 50px">
                    <form method="POST" action="{{ route('check.code') }}" enctype="multipart/form-data">
                        
                        @csrf
                        <input type="hidden" name="phone" value="+963{{ old('phone') ?? $phone }}">
                        <input type="hidden" name="serial_number" value="{{ old('serial_number') ?? $serial_number }}">
                        
                        <input type="text" class="my-round form-control py-4" name="code" id="code" placeholder="كود الضمان" required="">
                        <button type="submit" class="btn my-round text-white w-100 py-2 mt-3 btn-primary" style="" >{{__('route.send')}}</button>
                    </form>
                   
                </div>
                {{-- <div class="" style="margin-right: -87px; margin-top: -20px; z-index: 5;position: relative;">
                    <img class="img-fluid" src="{{asset('front/img_front/bottom-check.png')}}" alt="">
                </div> --}}
            </div>
        </div>
    </div>
<script>
    var btn = document.getElementById('check');
    btn.addEventListener('click', function(event){
        event.preventDefault();
        var code = document.getElementById('code').value;
        if(code == ''){
            alert('Enter the Warranty Code!');
        }else{
            window.location.href = '/guest/scheck/'+code;
        }
    })
</script>
    </div>
@endsection