<footer class=" home-footer" id=""  style="background-color: #626264 ;position: relative;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; ); z-index: 1;"></div>
    <div class="container" style="position: relative; z-index: 2;">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3 d-flex flex-column mt-4 menu">
                    <h4 class="text-light">{{__('route.Menu')}}</h4>
                    <a class="text-light" href="{{route('home')}}">{{__('route.Home')}}</a>
                    <a class="text-light" href="{{route('categories')}}">{{__('route.Categories')}}</a>
                    <a class="text-light" href="{{route('about_us')}}">{{__('route.About Us')}}</a>
               
                    <a class="text-light" href="{{route('contact-us')}}">{{__('route.Contact Us')}}</a>
                    <a class="text-light" href="{{route('ewarranty')}}">{{__('route.Ewarranty')}}</a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 d-flex flex-column mt-4 menu">
                    <div>
                        <h4 class="text-light">{{__('route.why Smart Energy')}}</h4>
                        @if (app()->getLocale() == 'en')

                            <p style="color: white" class="bg-primary  text-2 main-color fw-semibold bg-primary w-100 text-start  compare-title_footer ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855A8 8 0 0 0 5.145 4H7.5zM4.09 4a9.3 9.3 0 0 1 .64-1.539 7 7 0 0 1 .597-.933A7.03 7.03 0 0 0 2.255 4zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a7 7 0 0 0-.656 2.5zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5zM8.5 5v2.5h2.99a12.5 12.5 0 0 0-.337-2.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5zM5.145 12q.208.58.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12zm.182 2.472a7 7 0 0 1-.597-.933A9.3 9.3 0 0 1 4.09 12H2.255a7 7 0 0 0 3.072 2.472M3.82 11a13.7 13.7 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm6.853 3.472A7 7 0 0 0 13.745 12H11.91a9.3 9.3 0 0 1-.64 1.539 7 7 0 0 1-.597.933M8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855q.26-.487.468-1.068zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.7 13.7 0 0 1-.312 2.5m2.802-3.5a7 7 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7 7 0 0 0-3.072-2.472c.218.284.418.598.597.933M10.855 4a8 8 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4z"/>
                                </svg>
                                {{__('route.Lifetime Customer Support')}}
                            </p>
                            <p style="color: white" class="bg-primary  text-2 main-color fw-semibold bg-primary w-100 text-start  compare-title_footer ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sign-turn-slight-right" viewBox="0 0 16 16">
                                    <path d="m8.335 6.982.8 1.386a.25.25 0 0 0 .451-.039l1.06-2.882a.25.25 0 0 0-.192-.333l-3.026-.523a.25.25 0 0 0-.26.371l.667 1.154-.621.373A2.5 2.5 0 0 0 6 8.632V11h1V8.632a1.5 1.5 0 0 1 .728-1.286z"/>
                                        <path fill-rule="evenodd" d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.48 1.48 0 0 1 0-2.098zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134Z"/>
                                    </svg>
                                {{__('route.30-Day Money-Back Guarantee')}}
                            </p>

                            <p style="color: white" class="bg-primary  text-2 main-color fw-semibold bg-primary w-100 text-start  compare-title_footer ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                        <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                    </svg>
                                {{__('route.High Quality Products')}}
                            </p>
                        @else
                            <p style="color: white" class="bg-primary  text-2 main-color fw-semibold bg-primary w-100 text-end  compare-title_footer ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855A8 8 0 0 0 5.145 4H7.5zM4.09 4a9.3 9.3 0 0 1 .64-1.539 7 7 0 0 1 .597-.933A7.03 7.03 0 0 0 2.255 4zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a7 7 0 0 0-.656 2.5zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5zM8.5 5v2.5h2.99a12.5 12.5 0 0 0-.337-2.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5zM5.145 12q.208.58.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12zm.182 2.472a7 7 0 0 1-.597-.933A9.3 9.3 0 0 1 4.09 12H2.255a7 7 0 0 0 3.072 2.472M3.82 11a13.7 13.7 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm6.853 3.472A7 7 0 0 0 13.745 12H11.91a9.3 9.3 0 0 1-.64 1.539 7 7 0 0 1-.597.933M8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855q.26-.487.468-1.068zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.7 13.7 0 0 1-.312 2.5m2.802-3.5a7 7 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7 7 0 0 0-3.072-2.472c.218.284.418.598.597.933M10.855 4a8 8 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4z"/>
                                </svg>
                                {{__('route.Lifetime Customer Support')}}
                            </p>
                            <p style="color: white" class="bg-primary text-2 main-color fw-semibold bg-primary w-100 text-end  compare-title_footer ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sign-turn-slight-right" viewBox="0 0 16 16">
                                    <path d="m8.335 6.982.8 1.386a.25.25 0 0 0 .451-.039l1.06-2.882a.25.25 0 0 0-.192-.333l-3.026-.523a.25.25 0 0 0-.26.371l.667 1.154-.621.373A2.5 2.5 0 0 0 6 8.632V11h1V8.632a1.5 1.5 0 0 1 .728-1.286z"/>
                                        <path fill-rule="evenodd" d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.48 1.48 0 0 1 0-2.098zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134Z"/>
                                    </svg>
                                {{__('route.30-Day Money-Back Guarantee')}}
                            </p>

                            <p style="color: white" class="bg-primary  text-2 main-color fw-semibold bg-primary w-100 text-end  compare-title_footer ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                        <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                    </svg>
                                {{__('route.High Quality Products')}}
                            </p>
                        @endif
                    </div>
                    {{-- <div class="mt-5">
                        <h3 class="text-light">Mobile Application</h3>
                        <div style="width: 70%" class="d-flex justify-content-between align-items-center mt-3">
                            <a href="https://apps.apple.com/cl/app/marvels-e-warranty/id1594889128" class=""><i class="fa-brands fa-apple fs-1"></i></a>
                            <a href="https://play.google.com/store/apps/details?id=com.marveltech.ewarrenty&amp;pli=1" class="">
                                <img class="img-fluid" src="/assets/images/google-play 2.png" alt=""></a>
                            <a href="http://e-warranty.marvel-battery.com/APK/E-warranty_1_3_1.apk" class=""><i class="fa-solid fa-download fs-2"></i></a>
                        </div>
                    </div> --}}
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 d-flex flex-column mt-4 text-center">
                    <h4 class="text-light">{{__('route.Categories')}}</h4>
                    <?php
                        $lang=app()->getLocale();
                    ?>
                   @php
                    $categories = App\Models\Category::select('name_en', 'name_ar', 'slug_en')->get();
                    @endphp
                    
                    @foreach ($categories as $category)
                        <a class="text-light text-4" href="{{ route('front.category.show', $category->slug_en) }}">
                            {{ $category->{'name_'.$lang} }}
                        </a>
                    @endforeach
                    

                
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 d-flex flex-column mt-4 text-center">
                    <h4 class="text-light text-light-heading">{{ __('route.Information') }}</h4>
                        <a href="mailto:info@smartenergy-co.com" class="text-light ">info@smartenergy-co.com</a>

        
                    <p class="text-light">
                        <a href="https://www.facebook.com/smartergycompany" class="p-2 text-light"><i class="fa-brands fa-facebook-f fs-5"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=+963930000660" class="p-2 text-light"><i class="fa-brands fa-whatsapp fs-5"></i></a>
                    </p>
                </div>
                <div class="col-12 mt-5 hr" style="border-bottom: 2px solid #FFFFFF;"></div>
                <div class="col-12 d-flex align-items-center justify-content-center flex-wrap-reverse">
                    <div style="color: #f5eeee" class="my-4">
                        Copyright @2024 SMART. All rights reserved
                    </div>
                    
                </div>
            </div>
    </div>
</footer>