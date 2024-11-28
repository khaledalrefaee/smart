@extends('front.index')
@section('content')

<?php 
    $lang = app()->getLocale();
?>
<style>


</style>

    


    <div class="container">

           
            
        <div id="aboutus" data-aos-duration="2000" data-aos="fade-right" class="row align-items-xl-center ">

            <div class="col-lg-7 ps-lg-4 ps-xl-5 d-flex flex-column align-items-center">
                <h3 class="text-9 text-lg-8 text-primary text-xl-9 line-height-3 text-transform-none font-weight-semibold mb-4 mb-lg-3 mb-xl-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" style="animation-delay: 250ms; text-align: center;">
              
                    {{$sub_Category->Abbreviation_name}}
                </h3>
            
                <p class="text-2-2 pb-1 mb-4 mb-lg-2 mb-xl-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" style="animation-delay: 500ms; text-align: center;">
                    
                    {{ $sub_Category->{'name_'.$lang} }}
                </p>
              
            </div>
            <div  class="col-md-5 d-flex justify-content-center">
              
                <div data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.1, 'isInsideSVG': true, 'transition': true, 'transitionDuration': 2000}">
                    <img src="{{asset($sub_Category->image)}}" width="250" class="img-fluid position-relative z-index-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100" alt="" />
                </div>
            </div>
             
        </div>
    </div>



    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 order-lg-2 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" style="animation-delay: 500ms;">
                <div class="row g-3 portfolio-list lightbox" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                    @foreach ($sub_Category->product->whereNull('sub_product_id')  as $product)
                        <div class="col-12 col-sm-6 col-lg-4 card box-shadow-1    appear-animation text-decoration-none" data-appear-animation="expandIn" data-appear-animation-delay="400">
                            <div class="portfolio-item" dir="ltr">
                                <div class="owl-carousel box-shadow-5 owl-theme nav-inside nav-inside-edge mb-0 nav-squared nav-with-transparency nav-dark mt-5" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
                                    @foreach ($product->images as $image)
                                        <div class="d-flex justify-content-center">
                                            <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                                                <img src="{{ asset('uploads/' . $image->filename) }}" style="width: 237px; height: 187px;" class="img-fluid border-radius-0" alt="Product Image">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <a href="{{ route('front.products.show', $product->slug_en) }}" class="card-body z-index-1 py-0 mt-0">
                                <h2 class="text-color-primary font-weight-bold text-4 mb-2">{{ $product->{'name_'.$lang} }}</h2>
                                <p class="card-text text-black mb-3">{{ \Illuminate\Support\Str::limit($product->{'description_'.$lang}, 40, ' ... ') }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
    
            <div class="col-lg-4 order-lg-1 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" style="animation-delay: 250ms;">
                <div class="card box-shadow-1 custom-border-radius-1 mb-5">
                    <div class="card-body z-index-1 py-4 my-3">
                        <h2 class="text-color-dark font-weight-bold text-6 mb-4">{{ __('route.All Categories') }}</h2>
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
                                                    <a href="{{ route('front.subcategory.show', $subcat->slug_en) }}" class="accordion-toggle text-decoration-none text-color-dark text-color-hover-primary text-2-4">
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
    

@endsection