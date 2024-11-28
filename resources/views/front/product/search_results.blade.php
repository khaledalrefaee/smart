
@extends('front.index')
@section('content')


<?php 
$lang = app()->getLocale();
?>
<div class="main">
    <div class="container">
        <div class="row py-2 position-relative">
            <div class="col text-center position-relative">
            
                <h1 class="text-8 font-weight-bold title">
                    {{__('route.YOUR SEARCH FOR')}} ''<span>{{ $query }}</span>’’ {{__('route.REVEALED THE FOLLOWING')}} {{$resultsCount}} {{__('route.Results')}}
                </h1>
            
                @if(app()->getLocale() == 'ar')


                    <div class="search-with-select">
                        <a href="{{ route('products.search') }}" class="mobile-search-toggle-btn me-2">
                            <i class="icons icon-magnifier text-color-dark text-color-hover-primary"></i>
                        </a>
                        <form action="{{ route('products.search') }}" method="GET" class="search-form-wrapper input-group" style="flex-wrap: nowrap;">
                            <div class="search-form-select-wrapper">
                                <button class="btn" type="submit">
                                    <i class="icons icon-magnifier header-nav-top-icon text-color-dark"></i>
                                </button>
                            </div>
                            <input class="form-control text-1 w-75" id="input" name="query" value="{{ $query }}" type="search" placeholder="Search...">
                          
                        </form>
                    </div>
                @else
                    <div class="search-with-select">
                        <a href="{{ route('products.search') }}" class="mobile-search-toggle-btn me-2">
                            <i class="icons icon-magnifier text-color-dark text-color-hover-primary"></i>
                        </a>
                        <form action="{{ route('products.search') }}" method="GET" class="search-form-wrapper input-group" style="flex-wrap: nowrap;">
                            <input class="form-control text-1 w-75" id="input" name="query" value="{{ $query }}" type="search" placeholder="Search...">
                            <div class="search-form-select-wrapper">
                                <button class="btn" type="submit">
                                    <i class="icons icon-magnifier header-nav-top-icon text-color-dark"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                @endif
            
                
      

            </div>
            
        </div>
    </div>



    @if($products->isEmpty())
        <div class="container">
            <div class="row py-2 position-relative">
                <div class="col d-flex align-items-center justify-content-center" style="min-height: 200px;">
                    <h1 class="text-6  title text-center">
                        {{__('route.No products with this name found')}}
                    </h1>
                </div>
            </div>
        </div>
    @else

    <div class="container my-5 pt-4 pb-5">
        <div data-aos="fade-up" data-aos-duration="5000" class="col-lg-8 order-lg-2 mb-5 mb-lg-0 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" style="animation-delay: 500ms;">
            <div class="row g-4 mb-1 portfolio-list lightbox" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
         
            

              
                    @foreach ($products as $product)
                        <div class="col-12 col-sm-6 col-lg-4 card product-card appear-animation m-2 text-decoration-none" data-appear-animation="expandIn" data-appear-animation-delay="400">
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
                            <a a href="{{ route('front.products.show',$product->slug_en)}}" class="card-body z-index-1 py-0 mt-0">
                                <h2 class="text-color-primary font-weight-bold text-3 mb-2">{{ $product->{'name_'.$lang} }}</h2>
                                <p class="card-text text-black text-1 mb-3">{{ \Illuminate\Support\Str::limit($product->{'description_'.$lang}, 40, '       ... ') }}</p>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
            
        </div>
    </div>
</div>












@endsection