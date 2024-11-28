<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0">
        <div class="header-container container-fluid px-lg-4">
            <div class="header-row">
                <div class="header-column  flex-grow-0">
                    <div class="header-row pe-4">
                        <div class="header-logo">
                            <a href="{{route('home')}}">
                                <img alt="Smart"  id="logo"  loading="lazy" width="160" height="60" src="{{asset('front/img_front/logo-sec-176x88.webp')}}">
                                {{-- <img id="logo" alt="Smart" loading="lazy" width="160" height="70" src="{{asset('front/img_front/logo white@300x.png')}}"> --}}
                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-nav header-nav-links justify-content-start">
                            <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse header-mobile-border-top">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="dropdown">
                                            <a class="{{ Route::currentRouteName() === 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                                                {{ __('route.Home') }}
                                            </a>
                                        </li>

                                        @php
                                        $isCategoriesActive = Route::is('categories') || 
                                                              Route::is('front.category.show') || 
                                                              Route::is('front.subcategory.show') || 
                                                              Route::is('front.products.show');
                                    @endphp
                                    
                                    <li class="dropdown">
                                        <a class="{{ $isCategoriesActive ? 'active' : '' }}" href="{{ route('categories') }}">
                                            {{ __('route.Categories') }}
                                        </a>
                                    </li>
                                    
                                        <li class="dropdown">
                                            <a class="{{ Route::currentRouteName() === 'about_us' ? 'active' : '' }}" href="{{ route('about_us') }}">
                                                {{ __('route.About Us') }}
                                            </a>
                                        </li>
                                        

                                        <?php
                                            $Catalogue = App\Models\Catalogue::get();
                                            $lang = app()->getLocale();
                                        ?>
                                        @if ($Catalogue->count() == 0)
                                         
                                        @else
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="#">
                                                    {{__('route.Catalogue')}}
                                                </a>
                                                <ul class="dropdown-menu">
                                                    @foreach ($Catalogue as $catalog)
                                                    <li><a class="dropdown-item"  href="{{ asset($catalog->file) }}"  download="{{ $catalog->name_en }}.pdf">{{$catalog->{'name_'.$lang} }}</a></li>

                                                    @endforeach
                                                    
                                                </ul>
                                            </li>
                                        @endif
                                     
                                        <li class="dropdown">
                                            <a class="{{ Route::currentRouteName() === 'contact-us' ? 'active' : '' }}"  href="{{route('contact-us')}}">
                                                {{__('route.Contact Us')}}
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" onclick="changeLanguage()">
                                                <img src="{{asset('front/img_front/translation.svg')}}" width="26" alt="">
                                            </a>
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                @if(App::getLocale() !== $localeCode)
                                                    <a id="lang-{{ $localeCode }}" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" style="display: none;">
                                                        {{ $properties['native'] }}
                                                    </a>
                                                @endif
                                            @endforeach
                                        </li>
                                        <li class="dropdown">
                                            <a onclick="toggleDarkMode()" id="toggle-dark-mode">
                                                <i class="fas fa-moon"></i>
                                            </a>
                                        </li>
                                        @if(app()->getLocale() == 'ar')
                                            <li class="dropdown mr-5" style="margin-right: 5rem;">
                                                <a class="active" href="{{route('user-warranty')}}">
                                                    {{__('route.Ewarranty')}}
                                                </a>
                                            </li>
                                        @else

                                            <li class="dropdown ms-5">
                                                <a class="active" href="{{route('user-warranty')}}">
                                                    {{__('route.Ewarranty')}}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-column  flex-grow-0 justify-content-center">
                    <div class="header-row ps-4 justify-content-end">
                

                        <div class="header-nav-feature header-nav-features-search d-inline-flex">
                           
                            @if (app()->getLocale() == 'ar')
                                <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
                                    <form role="search" action="{{ route('products.search') }}" method="GET">
                                        @csrf
                                        <div class="simple-search input-group">
                                                <button class="btn" type="submit">
                                                    <i class="fas fa-search header-nav-top-icon"></i>
                                                </button>
                                            <input class="form-control text-1" id="headerSearch" name="query" type="text" value="" placeholder="Search...">
                                          
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
                                    <form role="search" action="{{ route('products.search') }}" method="GET">
                                        @csrf
                                        <div class="simple-search input-group">
                                            <input class="form-control text-1" id="headerSearch" name="query" type="text" value="" placeholder="Search...">
                                            <button class="btn" type="submit">
                                                <i class="fas fa-search header-nav-top-icon"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        
                        </div>
                        
                        <button class="btn header-btn-collapse-nav ms-0 ms-sm-3" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>





