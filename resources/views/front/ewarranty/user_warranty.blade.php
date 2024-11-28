@extends('front.index')
@section('content')

<style>
    .fixed-image{
        position: absolute;
        width: 600px;
        right: 0;
        top:0;
        z-index:-1;
    }
    html[lang="ar"] .fixed-image{
        right: inherit;
        left: 0;
    }
    
    .pmsg:lang('ar'){
        text-align:right;
    }
</style>



 
<div class=""  style="min-height: calc(100vh - 189px); background-image: url('{{ asset('front/img_front/Background.png') }}'); background-size: cover; background-position: center;">
            
 
         
    {{-- @if (app()->getLocale() == 'ar')

        <img class="fixed-image" style="position: absolute; width: 500px; right: 0; top: 50px; z-index: auto; right: inherit; left: 0;"
        src="{{asset('front/img_front/bg-warrenty.png')}}">

    @else

        <img class="fixed-image" style="position: absolute; width: 500px; right: 0; top: 50px; z-index: auto;"
        src="{{asset('front/img_front/bg-warrenty.png')}}">
        
    @endif --}}

        <div class="container" style="">
            <div class="d-flex flex-column-start row">
                @if (app()->getLocale() == 'ar')
                    <div class="col-12">
                        <h1 style="color: #b4b4b8; margin-bottom: 20px;" class="display-4 text-9 font-weight-bold mx-auto text-end">
                            {{ __('route.Ewarranty') }}
                        </h1>
                    </div>
                
                    <div class="col-12">
                        <h1 style="color: #b4b4b8; margin-bottom: 20px;" class="display-4 text-7 font-weight-bold mx-auto text-end">
                            {{ __('route.E-warranty application Always Keeps you Safe') }}
                        </h1>
                    </div>
                @else
                    <div class="col-12">
                        <h1 style="color: #b4b4b8; margin-bottom: 20px;" class="display-4 text-9 font-weight-bold mx-auto text-start">
                            {{ __('route.Ewarranty') }}
                        </h1>
                    </div>
                
                    <div class="col-12">
                        <h1 style="color: #b4b4b8; margin-bottom: 20px;" class="display-4 text-7 font-weight-bold mx-auto text-start">
                            {{ __('route.E-warranty application Always Keeps you Safe') }}
                        </h1>
                    </div>
                @endif
            
                
              
            </div>
            

            <div class="row mt-5 ">
                <div class="col-lg-6 col-md-6 col-12 mb-5 mb-lg-0">
                    <div class="custom-svg-wrapper-1 px-5 d-flex justify-content-between">
                        
                       
                        @if (app()->getLocale() == 'ar')
                            <div>
                                <img src="{{asset('front/img_front/Asset 2@300x.png')}}" class="img-fluid position-relative z-index-1" style="max-width: 117%; margin-right: -49%; transform: rotate(-13deg);" alt="" />
                            </div>
                            <div>
                                <img src="{{asset('front/img_front/Vector Smart Object.png')}}" class=" position-relative larger-image z-index-1" style="max-width: 213%; margin-right: -59%; height: 129%;" alt="" />
                            </div>
                        @else
                            <div>
                                <img src="{{asset('front/img_front/Vector Smart Object.png')}}" class=" position-relative larger-image z-index-1" style="max-width: 213%; height: 129%; margin-left: -43%;" alt="" />
                            </div>
                            <div>
                                <img src="{{asset('front/img_front/Asset 2@300x.png')}}" class="img-fluid position-relative z-index-1" style="max-width: 119%; margin-left: 29%; transform: rotate(-13deg);" alt="" />
                            </div>
                        @endif
                        
                
                     
                        
                    </div>
                </div>
                


                <div class="col-lg-6 col-md-6 col-12 mb-1  mb-lg-0 text-center d-flex flex-column align-items-center" >
                    <div class="custom-svg-wrapper-1 px-5 my-1 box-shadow-1 rounded" style="max-width: 400px;"> <!-- تحديد الحد الأقصى للعرض للبطاقة -->
                        <div class="card">
                            <div class="card-body text-center d-flex flex-column align-items-center">
                                <img src="{{ asset('front/img_front/001-add-post.png') }}" style="max-width: 30%;" class="position-relative z-index-1 mb-3" alt="" /> <!-- تصغير الصورة وتوسيطها -->
                    
                                <a href="{{ route('guest-add') }}" class="text-center">
                                    <h3 style="color: #b4b4b8; font-size: 1rem;" class="mx-auto text-5">{{ __('route.Add a new warranty') }}</h3> <!-- تصغير حجم النص -->
                                </a>
                            </div>
                        </div>
                    </div>

              
                    


                    <div class="custom-svg-wrapper-1 px-5 box-shadow-1 rounded my-3" style="max-width: 400px;">
                        
                        <div class="card ">
                            <div class="card-body text-center d-flex flex-column align-items-center ">
                                
                                    <img src="{{asset('front/img_front/002-exam-results.png')}}" style="max-width: 30%;" class=" position-relative z-index-1 mb-3"  alt="" />
                               
                                <a href="{{route('guest-check')}}" class="text-center">
                                    <h3 style="color: #b4b4b8" class="mx-auto text-5 ">{{__('route.Verification of sponsorship')}}</h3>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>

             

            </div>
      
        </div>


</div>
@endsection