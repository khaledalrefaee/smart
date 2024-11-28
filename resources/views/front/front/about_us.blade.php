@extends('front.index')
@section('content')
<style>
    .custom-btn-style {
    background-color: #bff076; /* اللون الأساسي للزر */
    color: #fff; /* لون النص */
    padding: 10px 20px; /* مساحة داخل الزر */
    border-radius: 5px; /* زوايا مدورة */
    transition: background-color 0.3s ease; /* تأثير تغيير اللون عند التمرير */
}

.custom-btn-style:hover {
    background-color: #bff076; /* لون الزر عند التمرير */
}
.image-container {
        position: relative;
        overflow: hidden;
        border-radius: 10px; /* زوايا مدورة للصورة */
    }

    .image-container img {
        transition: transform 0.5s ease; /* تأثير تحريك الصورة */
    }

   

    .custom-btn-style {
        background-color: #4F4BFC; /* اللون الأساسي للزر */
        color: #fff; /* لون النص */
        padding: 10px 20px; /* مساحة داخل الزر */
        border-radius: 5px; /* زوايا مدورة */
        transition: background-color 0.3s ease; /* تأثير تغيير اللون عند التمرير */
    }

    .custom-btn-style:hover {
        background-color: #3e3bc1; /* لون الزر عند التمرير */
    }

</style>
<div class="main">
    <div class="container">
        <div class="row py-5 position-relative">
            <div class="col text-center position-relative">
                <h1 class="text-8 font-weight-bold title">{{__('route.About Us')}}</h1>
                <div class="circle-left"></div>
                <div class="circle-right"></div>
              </div>
              
        </div>
        
    </div>
    
    <div class="container pb-xl-5">
        <div id="aboutus" class="row align-items-center pt-4 pb-lg-5 my-5">
           
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1500">

                <p class="custom-font-secondary custom-font-size-1 line-height-6 mb-4 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="800">
                    {{__('route.Smart Energy brings together expertise in electrical engineering, skilled system design, and dedicated installation to deliver cutting-edge energy solutions.')}}
                </p>
                <p class="custom-font-secondary custom-font-size-1 line-height-6 mb-4 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="900">
                  {{__('route.Our team of certified engineers and passionate designers is committed to advancing alternative power options worldwide.')}}
                    
                </p>
                <p class="custom-font-secondary custom-font-size-1 line-height-6 mb-4 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="1000">
                    {{__('route.With operations spanning multiple countries, Smart Energy manufactures its products in premier facilities, offering a comprehensive range of lithium, gel, and lead-acid batteries, solar panels, and high-performance inverters. Each solution is developed with a focus on efficiency, reliability, and environmental sustainability, making Smart Energy a trusted name')}}
                </p>
                {{-- <a href="#" class="btn btn-primary custom-btn-style appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="1100">Learn More</a> --}}
            </div>

            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1500">
                <div class="image-container">
                    <img src="{{asset('front/img_front/about_2.webp')}}" class="img-fluid appear-animation" data-appear-animation="zoomIn" data-appear-animation-delay="300" alt="About Us" />
                </div>
            </div>
            
        </div>
    </div>

    
    <div class="container pb-xl-5">
        <div id="aboutus" class="row align-items-center pt-4 pb-lg-5 my-5" data-spy-offset="15">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-duration="1500">
                <div class="custom-svg-wrapper-1 px-5">
                    
                    <div data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.1, 'isInsideSVG': true, 'transition': true, 'transitionDuration': 2000}">
                        <img src="{{asset('front/img_front/environmental.avif')}}" class="img-fluid position-relative z-index-1 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="700" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1500">
                {{-- <h2 class="custom-font-secondary custom-font-size-2 mb-4 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="600">About Us</h2> --}}
                <p class="custom-font-secondary custom-font-size-1 line-height-6 mb-4 pb-2 pe-lg-5 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="800">
                    {{__('route.Our products are crafted in top-tier factories across China, Vietnam, Korea, and India,')}}
                </p>
                <p class="custom-font-secondary custom-font-size-1 line-height-6 mb-4 pb-2 pe-lg-5 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="800">
                    {{__('route.meeting rigorous global standards and certified for exceptional quality. What sets Smart Energy apart is our commitment to compatibility with international benchmarks,')}}
                </p>
                <p class="custom-font-secondary custom-font-size-1 line-height-6 mb-4 pb-2 pe-lg-5 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="800">
                    {{__('route.ensuring reliable, high-performance solutions. At Smart Energy, customer satisfaction is our priority, creating a seamless and rewarding experience for both clients and representatives. Together, let is build a safer, cleaner future for all.')}}
                </p>
                {{-- <a href="#" class="btn btn-primary custom-btn-style appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="1000">Learn More</a> --}}
            </div>
        </div>
    </div>
    
    
    

</div>

@endsection