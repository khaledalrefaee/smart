@extends('front.index')
@section('content')


<?php 
    $lang = app()->getLocale();
?>


<div class="main">
    <div class="container">
        <div class="row py-2 position-relative">
            <div class="col text-center position-relative">
                <h1 class="text-8 font-weight-bold title">{{__('route.Categories')}}</h1>
                <div class="circle-left"></div>
                <div class="circle-right"></div>
              </div>
              
        </div>
    </div>


    
   <div class="container">
        <div class="row mt-lg-0">

            @foreach ($Category as $cat)
            <div class="col-lg-3">
                <h5 class="text-uppercase mt-4"></h5>
                <a href="{{route('front.category.show',$cat->slug_en)}}">
                    <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info">
                        <span class="thumb-info-wrapper">
                            <img src="{{ asset($cat->image) }}" class="img-fluid" alt="">
                            <span class="thumb-info-title">
                                <span class="thumb-info-inner text-5">{{ $cat->{'name_'.$lang} }} </span>
                                {{-- <span class="thumb-info-type">Project Type</span> --}}
                            </span>
                            <span class="thumb-info-action">
                                <span class="thumb-info-action-icon"><i class="fas fa-plus"></i></span>
                            </span>
                        </span>
                    </span>
                </a>
            </div>

            @endforeach
    
            
        </div>
        
        <div class="pagination d-flex justify-content-center">
            {{ $Category->links('pagination::bootstrap-4') }}
        </div>
        

   </div>

  
</div>

@endsection