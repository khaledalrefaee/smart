

<?php 
$count_catgoey = App\Models\Category::count();
$count_subcatgoey = App\Models\SubCatygory::count();
?>
<aside class="app-sidebar sidebar-scroll" >
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" style="height: 3rem !important; " href="{{route('admin.index')}}"><img style="width:137px  !important; height: 50px !important;" src="{{asset('front/img_front/logo-sec-176x88.webp')}}" class="main-logo" alt="logo"></a>
        {{-- <a class="desktop-logo logo-dark active" href="{{route('admin.index')}}"><img src="{{asset('front/img_front/logo-sec-176x88.webp')}}" class="main-logo dark-theme" alt="logo"></a> --}}
        <a class="logo-icon mobile-logo icon-light active" href="{{route('admin.index')}}"><img src="{{asset('front/img_front/logo-sec-176x88.webp')}}" class="logo-icon" alt="logo"></a>
        {{-- <a class="logo-icon mobile-logo icon-dark active" href="{{route('admin.index')}}"><img src="{{asset('front/img_front/logo-sec-176x88.webp')}}" class="logo-icon dark-theme" alt="logo"></a> --}}
    </div>
    
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">

                
        <div class="app-sidebar__user clearfix active">
            <div class="dropdown user-pro-body">
                    <div class="">
                        <img alt="user-img" class="avatar avatar-xl brround mCS_img_loaded" src="{{asset('back/assets/img/faces/6.jpg')}}">
                        <span class="avatar-status profile-status bg-green"></span>
                    </div>
               
                  
             
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ auth()->user()->name }}</h4>
                    
                </div>
            </div>
        </div>
       

            <ul class="side-menu">
                <li class="side-item side-item-category">Main</li>

                @if (auth()->user()->type == 'owner')
                    


             
                <li class="slide">
                    <a class="side-menu__item " href="{{route('Catalogue')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-text-indent-left" viewBox="0 0 16 16">
                            <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708M7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                          </svg>
                        <span class="side-menu__label">Catalogue</span>
                       
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item " href="{{route('Categories')}}">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                          </svg>
                        <span class="side-menu__label">Categories</span>
                        <span class="badge badge-success side-badge">
                            {{$count_catgoey}}
                        </span>
                    </a>
                </li>


                <li class="slide">
                    <a class="side-menu__item " href="{{route('sub.Categories')}}">
                        <svg   xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                            <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5z"/>
                            <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1z"/>
                          </svg>
                        <span class="side-menu__label">Sub Categories</span>
                        <span class="badge badge-success side-badge">
                           {{$count_subcatgoey}}
                        </span>
                    </a>
                </li>


            

                
            
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                          </svg>
                        
                        <span class="side-menu__label">Productes</span>
                        <i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{route('product')}}">product</a></li>
                        <li><a class="slide-item" href="{{route('product.create')}}">product create</a></li>
                        
                    </ul>
                </li>



                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                          </svg>
                        
                        
                        <span class="side-menu__label">Sub Productes</span>
                        <i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{route('sub.product')}}">sub product</a></li>
                        <li><a class="slide-item" href="{{route('sub.product.create')}}">sub product create</a></li>
                        
                    </ul>
                </li>





                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708"/>
                          </svg>
                        
                        
                        <span class="side-menu__label">Customers</span>
                        <i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{route('customers')}}">Customers</a></li>
                        <li><a class="slide-item" href="{{route('create.customers')}}">Customers create</a></li>
                        
                    </ul>
                </li>

          


                <li class="slide">
                    <a class="side-menu__item " href="{{route('Notes')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                          </svg>
                        <span class="side-menu__label">Notes</span>
                   
                    </a>
                </li>



                @else


                    <li class="slide">
                        <a class="side-menu__item " href="{{route('Notes')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                            </svg>
                            <span class="side-menu__label">Notes</span>
                    
                        </a>
                    </li>
                @endif
            </ul>
    </div>
</div>
   
</aside>

</aside>