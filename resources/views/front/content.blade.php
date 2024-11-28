@extends('front.index')
@section('content')

<?php 
    $lang = app()->getLocale();

?>

<style>
    @media (max-width: 768px) {
    .owl-carousel-light {
        height: 100vh !important;
    }
}

@media (max-width: 480px) {
    .owl-carousel-light {
        height: 120vh !important;
    }
}

</style>


<div role="main" class="main ">

    

    
  
    <section>		
		<div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover show-dots-xs nav-style-1 nav-arrows-thin nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0" data-plugin-options="{'autoplay': true, 'autoplayTimeout': 7000}" data-dynamic-height="['calc(100vh - 104px)','calc(100vh - 104px)','calc(100vh - 61px)','calc(30vh - 61px)','calc(30vh - 61px)']" style="background-position: center center; height: calc(-104px + 100vh); opacity: 1;" dir="ltr">
            <div class="owl-stage-outer">
                
				<div class="owl-stage">

                    					<!-- Carousel Slide 1 -->
					<div class="owl-item position-relative overflow-hidden removing animated fadeOut">
						<div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0 appear-animation animated kenBurnsToLeft appear-animation-visible" data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="3s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show="" style="background-image: url({{asset('front/img_front/iStock-1423181660.jpg')}}); background-size: cover; background-position: center center; animation-duration: 3s; animation-delay: 100ms;"></div>
						<div class="container position-relative z-index-3 h-100">
							
						</div>
					</div>
										<!-- Carousel Slide 1 -->
					<div class="owl-item position-relative overflow-hidden animated removing fadeOut">
						<div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0 appear-animation animated kenBurnsToLeft appear-animation-visible" data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="3s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show="" style="background-image: url({{asset('front/img_front/iStock-1386956883.jpg')}}); background-size: cover; background-position: center center; animation-duration: 3s; animation-delay: 100ms;"></div>
						<div class="container position-relative z-index-3 h-100">
							
						</div>
					</div>
				
					
					

				</div>
			</div>
			<div class="owl-nav">
				<button type="button" role="presentation" class="owl-prev"></button>
				<button type="button" role="presentation" class="owl-next"></button>
			</div>
		</div>
	</section>
     

      
            <div class="container my-3" >
                <h3 style="letter-spacing: 1px;" class="text-9 text-primary after-title text-lg-5 text-xl-9 line-height-3 text-center text-transform-none font-weight-semibold mb-4 mb-lg-3 mb-xl-4">
                    {{__('route.Most Popular')}}
                </h3>

                <div class="row ">
                
                    @foreach ($products as $product)
                        <div class="col-12 col-sm-6 col-lg-3   appear-animation box-shadow-1 animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" style="animation-delay: 600ms; height: 96%;">
                        
                            <div class="card box-shadow-1 mb-5   appear-animation text-decoration-none" data-appear-animation="expandIn" data-appear-animation-delay="400" style="border-radius: 15px;">
                                <div class="portfolio-item" dir="ltr">
                                    <div class="owl-carousel box-shadow-5 owl-theme nav-inside nav-inside-edge mb-0 nav-squared nav-with-transparency nav-dark mt-5" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
                                        @foreach ($product->images as $image)
                                            <div class="d-flex justify-content-center">
                                                <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                                                    <img src="{{ asset('uploads/' . $image->filename) }}" style="width: 178px; height: 187px;" class="img-fluid border-radius-0" alt="Product Image">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('front.products.show', $product->slug_en) }}" class="card-body z-index-1 py-0 mt-0 ">
                                    <p class="card-text text-black text-1 mb-3">{{ \Illuminate\Support\Str::limit($product->{'description_'.$lang}, 40, ' ... ') }}</p>
                                    <h2 class="text-color-primary font-weight-bold text-2 mb-2">{{ $product->{'name_'.$lang} }}</h2>

                                </a>
                            </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="pagination d-flex justify-content-center">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>

                  




                 
                </div>
            </div>
       

  
    

        <div  class="container pb-xl-5 shadow-lg rounded" style="border-radius: 40px !important;">
            <div id="aboutus"  class="row align-items-center  ">
               
                <div class="col-lg-6"  >
                    <h1 class="text-7 " style="color: #626264">
                        {{__('route.SEALED MAINTENANCE FREE')}}
                    </h1>
                    <h1 class="text-primary text-9">
                        {{__('route.MOTORCYCLE BATTERY')}}
                    </h1>
                    <p class="custom-font-secondary custom-font-size-1 line-height-6 mb-4 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="800">
                        {{__('route.Our battery solutions are engineered to deliver reliable, high-capacity energy storage, keeping your home or business powered efficiently around the clock. Each battery is optimized for longevity and performance, giving you sustainable energy security you can depend on.')}}
                    </p>
                    <p class="custom-font-secondary custom-font-size-1 line-height-6 mb-4 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="900">
                        {{__('route.Our battery systems are designed to meet diverse energy needs, providing seamless energy storage with minimal environmental impact. We offer tailor-made solutions for residential and commercial applications, ensuring you always have energy when you need it most')}}
                    </p>
                  
                    <div class="text-center">
                        
                        <a href="{{route('about_us')}}" class="btn btn-primary appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="1100">
                            {{__('route.Learn More')}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                              </svg>
                        </a>
                    </div>
                </div>
    
                <div class="col-lg-6 d-flex justify-content-center"  >
                    <div class="image-container text-center">
                        <img src="{{asset('front/img_front/Back_03 copy.jpg')}}" class="img-fluid appear-animation" data-appear-animation="zoomIn" data-appear-animation-delay="300" alt="About Us" />
                    </div>
                </div>
                
                
            </div>
        </div>
@endsection