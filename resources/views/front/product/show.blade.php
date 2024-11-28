@extends('front.index')
@section('content')

<style>



.product-btn {
  width: 170px;
  color: white;
  /* background-color: #75ce48; */
  display: flex;
  align-items: center;
  font-size: 15px;
  justify-content: start;
  padding: 8px 20px;
  border-radius: 10px;
  box-shadow: 2px 2px 7px #222;
  transition: all 200ms;
}

.product-btn:hover {
  color: white !important;
  background-color: #5cab39; /* تغيير لون الخلفية عند التمرير إذا كنت ترغب */
}


.compare-title-1 {
            padding: 9px;
            z-index: 9;
            border-radius: 9px;
            height: 50px;
        }
</style>

<?php 
$lang = app()->getLocale();
?>

<div class="container">
    <div class="row py-2 position-relative">
        <div class="col text-center position-relative">
            <h1 class="text-8 font-weight-bold title">{{__('route.Products')}}</h1>
            <div class="circle-left"></div>
            <div class="circle-right"></div>
          </div>
          
    </div>
</div>



<div class="container">

    {{-- <div class="row">
        <div class="col-lg-4 p-0" >
            <div class="thumb-gallery-wrapper" dir="ltr">
                <div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
                    <div>
                        <img alt="" class="img-fluid" 
                        src="{{asset('front/img_front/1713350553_ML.png')}}" 
                        data-zoom-image="{{asset('front/img_front/1713350553_ML.png')}}">
                    </div>
                    <div>
                        <img alt="" class="img-fluid" 
                        src="{{asset('front/img_front/1713350553_ML.png')}}" 
                        data-zoom-image="{{asset('front/img_front/1713350553_ML.png')}}">
                    </div>
                </div>
                <div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">
                    <div class="cur-pointer">
                        <img alt="" class="img-fluid" src="{{asset('front/img_front/1713350553_ML.png')}}">
                    </div>
                    <div class="cur-pointer">
                        <img alt="" class="img-fluid" src="{{asset('front/img_front/1713350553_ML.png')}}">
                    </div>
                </div>
            </div>
        </div>
      <div class="col 2">

      </div>
        <div class="col-lg-6 ">
            <div style="width: 100%; height: 120px;">
            </div>
            <div class="summary entry-summary position-relative">
                <h1 class="mb-0 font-weight-bold text-primary text-7">Porto Headphone</h1>
                <div class="col-12  hr" style="border-bottom: 2px solid #75ce48;"></div>

                <div class="pb-0 clearfix d-flex align-items-center">
                    <div title="Rated 3 out of 5" class="float-start">
                        <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                    </div>
                </div>
                <p class="text-3-5 mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed tempus nibh sed elimttis adipiscing.
                     Fusce in hendrerit purus. Lorem ipsum dolor sit amet.
                </p>
            </div>
        </div>

    </div> --}}



    <div class="row">
        <div class="col-lg-4 p-0" >
           
          
                
         

            <div class="thumb-gallery-wrapper" dir="ltr">
                <div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
                    @foreach ($product->images as $image)
                        <div>
                            <img alt="" class="img-fluid" 
                            src="{{ asset('uploads/' . $image->filename) }}" 
                            data-zoom-image="{{ asset('uploads/' . $image->filename) }}">
                        </div>
                    @endforeach
                 
                 
                </div>
                <div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">

                    @foreach ($product->images as $image)
                    <div class="cur-pointer">
                        <img alt="" class="img-fluid" src="{{ asset('uploads/' . $image->filename) }}">
                    </div>
                    @endforeach

                 
                  
                </div>
            </div>
        </div>
        <div class="col-lg-2 order-3 order-lg-3">
            <aside class="sidebar">
                <h5 class="font-weight-semi-bold text-primary">{{__('route.Contact Us')}}</h5>
                <p>{{__('route.Feel like')}}.</p>
              
                <h5 class="font-weight-semi-bold pt-4">{{__('route.Main office')}}</h5>
                <ul class="list list-icons list-icons-style-2 mt-2">
                    <li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-primary"> {{__('route.Address')}}:</strong> {{__('route.Syria Damascus Al-Suwaiqa next to Hamman Agha Mosque')}}</li>
                    <li><i class="fas fa-phone top-6"></i> <strong class="text-primary">{{__('route.phone')}}:</strong>  <a class="" href="tel:00963941112516">  +9 (639)411-125-16</a></li></li>
                    <li><i class="fas fa-envelope top-6"></i> <strong class="text-primary">{{__('route.email')}}:</strong> <a href="mailto:info@smart-battery.com">info@smart-battery.com</a></li>
                </ul>
            </aside>
        </div>

        <div class="col-lg-6 ">
            <h4 class="main-color fw-semibold bg-primary w-100 text-center mt-2 compare-title compare-title-1">{{ $product->{'name_'.$lang} }}</h4>

            <div class="summary entry-summary position-relative">
                <h1 class="mb-0 font-weight-bold text-primary text-7">{{__('route.Description')}}</h1>
                <div class="pb-0 clearfix d-flex align-items-center">
                    <div title="Rated 3 out of 5" class="float-start">
                        <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                    </div>
                </div>
                <p class="text-3 mb-3">
                    {{ $product->{'description_'.$lang} }}
                </p>

                <div class="mt-1">
                    <h2 class=" text-primary text-7">{{__('route.Product details')}}</h2>
                            <table class="mt-0 w-100">
                                <tbody class="">
                                    @if ($product->capacities == null)
                                      
                                    @else
                                        <tr>
                                            <td class="py-2" style="width: 30%">{{__('route.Capacities')}}</td>
                                            <td class="py-2 ps-3" style="width: 50%; opacity: 70%">
                                                {{$product->capacities}}
                                            </td>
                                        </tr>
                                    @endif
                                        

                                    @if ($product->weight == null)
                                       
                                    @else
                                        <tr>
                                            <td class="py-2" style="width: 30%">{{__('route.Weight')}}</td>
                                            <td class="py-2 ps-3" style="width: 50%; opacity: 70%">
                                                {{$product->weight}}
                                            </td>
                                        </tr>
                                    @endif

                                    @if ($product->terminals == null)
                                       
                                    @else
                                        <tr>
                                            <td class="py-2" style="width: 30%">{{__('route.Terminals')}}</td>
                                            <td class="py-2 ps-3" style="width: 50%; opacity: 70%">
                                                {{$product->terminals}}
                                            </td>
                                        </tr>
                                    @endif
                                   
                                    @if ($product->cycles == null)
                                       
                                    @else
                                        <tr>
                                            <td class="py-2" style="width: 30%">{{__('route.Cycles')}}</td>
                                            <td class="py-2 ps-3" style="width: 50%; opacity: 70%">
                                                {{$product->cycles}}
                                            </td>
                                        </tr>
                                    @endif

                                 
                                    @if ($product->made == null)
                                       
                                    @else
                                        <tr>
                                            <td class="py-2" style="width: 30%">{{__('route.made')}}</td>
                                            <td class="py-2 ps-3" style="width: 50%; opacity: 70%">
                                                {{$product->made}}
                                            </td>
                                        </tr>
                                    @endif
                                        
                                       
                                    
                                </tbody>
                            </table>
                            
                </div>
                <div class="">
                    <div class="row">
                        @if ($product->datasheet == null)

                        @else
                            <div class="col-md-3">
                                {{__('route.Datasheet')}}:
                            </div>
                            <div class="col-md-4">
                                <a class="product-btn bg-primary " href="{{ asset($product->datasheet) }}"  target="_blank">
                                    <i class="fa-solid fa-eye"></i> {{__('route.Preview')}}
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a class="product-btn bg-primary" href="{{ asset($product->datasheet) }}"  target="_blank" download="{{ $product->name_en }}.pdf">
                                    <i class="fa-solid fa-download"></i> {{__('route.Download')}}
                                </a>
                            </div>                             
                        @endif        
                    </div>
                    
                    <br>
                    
                    <div class="row">
                        @if ($product->user_manual == null)
                            
                        @else
                            <div class="col-md-3">
                                {{__('route.User manual')}}:
                            </div>
                            <div class="col-md-4">
                                <a class="product-btn bg-primary" href="{{ asset($product->user_manual) }}" target="_blank">
                                    <i class="fa-solid fa-eye"></i> {{__('route.Preview')}}
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a class="product-btn bg-primary" href="{{ asset($product->user_manual) }}" target="_blank" download="{{ $product->name_en }}.pdf">
                                    <i class="fa-solid fa-download"></i> {{__('route.Download')}}
                                </a>
                            </div>
                            
                            
                        @endif
                       
                    </div>

                    </div>
                </div>
            </div>
        </div>

</div>


@if ($similarProducts->count() == 0)
    
@else

<div class="container my-3" >
    <h3 style="letter-spacing: 1px;" class="text-9 text-primary after-title text-lg-5 text-xl-9 line-height-3 @if(app()->getLocale() == 'ar') text-end @else text-start @endif font-weight-semibold mb-4 mb-lg-3 mb-xl-4">
   
            {{__('route.Similar Products')}}
    </h3>

    <div class="row ">
    
        @foreach ($similarProducts as $item)
            <div class="col-12 col-sm-6 col-lg-3   appear-animation box-shadow-1 animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" style="animation-delay: 600ms; height: 96%;">
            
                <div class="card box-shadow-1 mb-5   appear-animation text-decoration-none" data-appear-animation="expandIn" data-appear-animation-delay="400" style="border-radius: 15px;">
                    <div class="portfolio-item" dir="ltr">
                        <div class="owl-carousel box-shadow-5 owl-theme nav-inside nav-inside-edge mb-0 nav-squared nav-with-transparency nav-dark mt-5" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
                            @foreach ($item->images as $image)
                                <div class="d-flex justify-content-center">
                                    <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                                        <img src="{{ asset('uploads/' . $image->filename) }}" style="width: 178px; height: 187px;" class="img-fluid border-radius-0" alt="Product Image">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('front.products.show', $item->slug_en) }}" class="card-body z-index-1 py-0 mt-0 ">
                        <p class="card-text text-black text-1 mb-3">{{ \Illuminate\Support\Str::limit($item->{'description_'.$lang}, 40, ' ... Read More') }}</p>
                        <h2 class="text-color-primary font-weight-bold text-2 mb-2">{{ $item->{'name_'.$lang} }}</h2>

                    </a>
                </div>
                </div>
            </div>
        @endforeach


        {{-- <div class="pagination d-flex justify-content-center">
            {{ $similarProducts->links('pagination::bootstrap-4') }}
        </div> --}}

      




     
    </div>
</div>

@endif


@endsection