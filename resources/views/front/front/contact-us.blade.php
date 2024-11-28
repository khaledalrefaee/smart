@extends('front.index')
@section('content')
<style>

.circle-left-contact-us, .circle-right-contact-us {
    position: absolute;
    width: 80px;
    height: 80px;
    background-color: #d7f0b1; 
    border: 2px solid #d7f0b1;   
    background-color: #d7f0b1; 
    border-radius: 50%;
    opacity: 0;
    animation: pulse 3s infinite;
}

.circle-left-contact-us {
    top: 32%;
    left: 2%;
    transform: translateY(-50%);
}

.circle-right-contact-us {
    top: 61%;
    right: 40%;
    transform: translateY(-50%);
}

/* عند تصغير الشاشة */
@media (max-width: 768px) {
    .circle-left-contact-us {
        /* top: 48%;
        left: 5%;
        width: 10%;
        height: 10%; */
        display: none;
    }

    .circle-right-contact-us {
        display: none;
        /* top: 63%;
        left: 49%;
        width: 10%;
        height: 10%; */
    }
}

/* تأثيرات الظهور والاختفاء */
@keyframes pulse {
    0%, 100% {
        opacity: 0;
        transform: scale(0.5);
    }
    50% {
        opacity: 1;
        transform: scale(1);
    }
}


/* تأثيرات الظهور والاختفاء */
@keyframes pulse {
    0%, 100% {
        opacity: 0;
        transform: scale(0.5);
    }
    50% {
        opacity: 3;
        transform: scale(1);
    }
}
</style>
<section class="contact-container2 my-5">
    <div class="container">
        <div class="row">
            <div class="circle-left-contact-us"></div>
            <div class="circle-right-contact-us"></div>
           
                <div class="col-sm-12 col-md-12 col-lg-7">
                 
                    <h1 class="title2 text-primary">{{__('route.Contact Us')}}</h1>
                    <div class="w-50 ps-3">
                        <p class="main-color">
                           {{__('route.Feel like')}}
                        </p>
                    </div>
                    <div class="appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" style="animation-delay: 800ms;">

                            <div class="contact-content2">
                                <div class="d-flex mt-3">
                                    <i class="fa-solid fa-house mx-3 fs-4" style="color: #b2ee58;"></i>
                                    <h4 class="text-primary ">{{__('route.Smart Tech')}}</h4>
                                </div>
                                <div class="d-flex mt-2">
                                    <i class="fa-solid fa-phone mx-3 fs-4" style="color: #b2ee58;"></i>
                                <div>
                                    <b class="text-primary">{{__('route.Main office')}}:</b><br>
                                    {{__('route.phone')}}: <a class="text-black" href="tel:00963941112516"> +9 (639)411-125-16 </a> <br>
                                    {{__('route.Address')}}: <span> {{__('route.Syria Damascus Al-Suwaiqa next to Hamman Agha Mosque')}}</span>
                                    <br>
                                    <br>{{__('route.email')}}
                                   
                                    </div>
                                </div>
                                <div class="d-flex mt-2 mb-3">
                                    <i class="fa-solid fa-envelope  mx-3 fs-4" style="color: #b2ee58;"></i>
                                    <a href="mailto:info@smart-battery.com">info@smart-battery.com</a>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5 d-flex justify-content-center overflow-hidden">
                        <form class="d-flex flex-column justify-content-center contact-form form-style-4  form-errors-light mb-lg-0 p-4 shadow-lg rounded" action="{{route('contactus_Send')}}" method="POST" style="background-color: #f9f9f9;">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 mb-3">
                                    <input type="text" class="form-control text-black custom-input" placeholder="Full Name" name="name" required="">
                                </div>
                                
                                <div class="form-group col-12 mb-3">
                                    <input type="email" class="form-control text-black custom-input" placeholder="Email" name="email" required="">
                                </div>
                                <div class="form-group col-12 mb-3">
                                    <input type="text" class="form-control text-black custom-input" placeholder="Phone" name="phone" required="">
                                </div>
                                <div class="form-group col-12 mb-3">
                                    <input type="text" class="form-control text-black custom-input" placeholder="Message" name="message" required="">
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="form-group col-12 d-flex justify-content-center">

                                        <button type="submit" class="btn btn-outline btn-rounded btn-success mb-2">{{__('route.Send Message')}}</button>

                                </div>
                            </div>
                        </form>
                    </div>
                    
          
                </div>
    </div>


</section>


<div id="googlemapsFullWidth" class="google-map mt-0 mb-0">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d294.06256155487415!2d36.30135915151235!3d33.50298930882396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1518e1870fe5c5c7%3A0x150e70ac5b8d7a77!2z2LTYsdmD2Kkg2YXZiNi12YTZhNmKINmE2YTYqtis2KfYsdipIFNNQVJURVIgUE9XRVI!5e0!3m2!1sar!2snl!4v1728932644812!5m2!1sar!2snl" width="600" height="450" style="border:0;z-index: 3;
    height: 100%;
    width: 100%;
    touch-action: pan-x pan-y;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>



@endsection