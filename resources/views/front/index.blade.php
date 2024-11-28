<!DOCTYPE html>
<html>
	<head>

		@include('front.layout.css')

	</head>

<?php 
    $Category = App\Models\Category::where('active','1')->orderby('id','desc')->get();
    $lang = app()->getLocale();
?>
	<body  data-plugin-page-transition dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

        <div class="fab-wrapper">
            <input id="fabCheckbox" type="checkbox" class="fab-checkbox"/>
            <label class="fab" for="fabCheckbox">
                <span class="fab-dots fab-dots-1"></span>
                <span class="fab-dots fab-dots-2"></span>
                <span class="fab-dots fab-dots-3"></span>
            </label>
            <div class="fab-wheel">
                <a class="fab-action fab-action-2 text-decoration-none" target="_blank" href="{{route('home')}}">
                    <img src="{{ asset('images/qatar-flag.png') }}" width="25" heigh="25" alt="•••">
                </a>
                <a class="fab-action fab-action-3 text-decoration-none" target="_blank" href="tel:00963941112516">
                    <i class="fa-solid fa-phone"></i>
                </a>
                <a class="fab-action fab-action-4 text-decoration-none" target="_blank" href="https://api.whatsapp.com/send?phone=00963941112516">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                      <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                    </svg>
                </a>
            </div>
        </div>


		<div class="body main" >
            @include('front.layout.header')
            <div class="category-carousel-container" style="background-color: #626264; ">
                <div class="row">
                    <div dir="ltr" class="col">
                        <div class="owl-carousel owl-theme custom-carousel owl-carousel-init" 
                             data-plugin-options="{'responsive': {'0': {'items': 2}, '576': {'items': 3}, '768': {'items': 4}, '992': {'items': 5}}, 'autoplay': true, 'autoplayTimeout': 5000, 'dots': false, 'loop': true, 'margin': 0}" 
                             style=";">
                            @foreach ($Category as $cat)
                                <div class="item text-center" style="padding: 10px;">
                                    <a href="{{ route('front.category.show', $cat->slug_en) }}" style="text-decoration: none;">
                                        <div class="category-icon-container" style="">
                                            <img style="width: 50px; height: 50px;" class="d-inline-block img-fluid" loading="lazy" src="{{ asset($cat->icon) }}" alt="">
                                        </div>
                                        <h5 class="text-light mt-2">{{ $cat->{'name_'.$lang} }}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
           
            
			@yield('content')

            @include('front.layout.footer')
		</div>

        @include('front.layout.js')

       

	</body>
</html>
