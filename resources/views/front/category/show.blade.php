@extends('front.index')
@section('content')

<style>
    .product-code {
    border-right: 1px solid #ccc;
    padding-right: 10px;
    color: #6c757d;
}

.product-code:last-child {
    border-right: none;
}


.product-logo {
    position: absolute;
    top: 221px;
    right: 10px;
    max-height: 60px;
    max-width: 60px;
}

@media (max-width: 1198px) {
    .product-logo {
        top: 239px;
        right: 8px;
        max-height: 55px;
        max-width: 55px;
    }
}

@media (max-width: 768px) {
    .product-logo {
        top: 221px;
        right: 5px;
        max-height: 50px;
        max-width: 50px;
    }
}


@media (max-width: 576px) {
    .product-logo {
        top: 200px;
        right: 2px;
        max-height: 40px;
        max-width: 40px;
    }
}

</style>

<?php 
    $lang = app()->getLocale();
?>



<div class="main">
    <div class="container">
        <div class="row py-2 position-relative">
            <div class="col text-center position-relative">
                <h1 class="text-8 font-weight-bold title">{{ $Category->{'name_'.$lang} }}</h1>
                <div class="circle-left"></div>
                <div class="circle-right"></div>
              </div>
              
        </div>
    </div>

    <div class="container my-5 pt-4 pb-5">
        <div class="row">
            

            <div data-aos="fade-up" data-aos-duration="5000" class="col-lg-8 order-lg-2 mb-5 mb-lg-0 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" style="animation-delay: 500ms;">
               @foreach ($Category->subcatgory as $item)
               <div class="card my-3 p-3" style="border-radius: 10px; position: relative;">
                <div class="row g-0 align-items-center">
                    <!-- الصورة الرئيسية -->
                    <div class="col-md-4 text-center">
                        <img src="{{asset($item->image)}}"  class="img-fluid" alt="{{$item->{'name_'.$lang} }}" style="max-height: 200px;">
                    </div>
                    <!-- النص -->
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-4 text-black">{{$item->{'name_'.$lang} }} ({{$item->Abbreviation_name}})</h5>
                            <p class="card-text text-1" style="color: #3d3d3d;">{{$item->{'name_'.$lang} }}</p>
                            <div class="d-flex flex-wrap">
                                @foreach($item->product->take(3) as $product)
                                    <span class=" me-3"><a href="{{ route('front.products.show',$product->slug_en)}}" class="text-decoration-none " style="color: #3d3d3d;">{{$product->{'name_'.$lang} }} -</a></span>
                                @endforeach
                            </div>
                            
                            @if($item->product->count() > 3)
                                <a href="{{ route('front.subcategory.show',$item->slug_en)}}" class="btn btn-link text-decoration-none mt-3 fw-bold">
                                    {{__('route.Explore')}} <i class="bi bi-arrow-right"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    <!-- الشعار -->
                    <div class="col-md-1 text-center">
                        <img src="{{asset('front/img_front/huney 1.png')}}"  class="img-fluid " alt="Pump Inverter" style="max-height: 80px;">
                    </div>
                </div>
            </div>
            
               @endforeach

                
            </div>

            
            
            <div class="col-lg-4 order-lg-1 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" style="animation-delay: 250ms;">
                <div class="card box-shadow-1 custom-border-radius-1 mb-5">
                    <div class="card-body  z-index-1 py-4 my-3">
                        <h2 class="text-color-dark font-weight-bold text-6 mb-4">{{__('route.All Categories')}}</h2>
                        <ul id="collapse12HeadingOne" class="custom-nav-list-effect-1 list list-unstyled mb-0">
                            @foreach ($categories as $cat)
                                <li class="active">
                                    <a data-bs-toggle="collapse" data-bs-target="#collapse-{{ $cat->id }}" aria-expanded="true" aria-controls="collapse-{{ $cat->id }}" class="accordion-toggle text-decoration-none text-color-dark text-color-hover-primary text-3-5">
                                        {{ $cat->{'name_'.$lang} }}
                                    </a>
                                    
                                    <div id="collapse-{{ $cat->id }}" class="collapse" aria-labelledby="collapse12HeadingOne" data-bs-parent="#accordion12">
                                        <ul class="mb-0 custom-nav-list-effect-1 list list-unstyled p-3">
                                            @foreach ($cat->subcatgory as $subcat)
                                                <li>
                                                    <a href="{{ route('front.subcategory.show',$subcat->slug_en)}}" class="accordion-toggle text-decoration-none text-color-dark text-color-hover-primary text-2-4">
                                                        {{ $subcat->{'name_'.$lang} }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        
                    </div>
                </div>
                
            </div>


            
            
        </div>


        
    </div>

</div>


@endsection