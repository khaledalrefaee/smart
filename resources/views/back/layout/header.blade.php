

    <!-- main-header -->
    <div class="main-header sticky side-header nav nav-item">
        <div class="container-fluid">
            <div class="main-header-left ">
                <div class="responsive-logo">
                    {{-- <a class="desktop-logo logo-light active" href="{{route('admin.index')}}"><img style="" src="{{asset('back/assets/images/logo_2.png')}}" class="main-logo" alt="logo"></a>
					<a class="logo-icon mobile-logo icon-light active" href="{{route('admin.index')}}"><img style="" src="{{asset('back/assets/images/logo_2.png')}}" class="logo-icon" alt="logo"></a> --}}
                    {{-- <a href="{{route('admin.index')}}"><img src="{{asset('back/assets/images/logo_2.png')}}" class="dark-logo-1"  style="width: 20%;height: 20%; "  alt="logo"></a>
                    <a href="{{route('admin.index')}}"><img src="{{asset('back/assets/images/logo_2.png')}}" class="dark-logo-2" style="width: 20%;height: 20%; " alt="logo"></a> --}}

                    
                    {{-- <a class="desktop-logo logo-light active" href="{{route('admin.index')}}"><img src="{{asset('front/img_front/logo-sec-176x88.webp')}}}" class="main-logo" alt="logo"></a> --}}
					<a class="logo-icon mobile-logo icon-light active" href="{{route('admin.index')}}"><img src="{{asset('front/img_front/logo-sec-176x88.webp')}}" class="logo-icon" alt="logo"></a>
                </div>
              
                <div class="app-sidebar__toggle" data-toggle="sidebar">
                    <a class="open-toggle" href="javascript:void(0)">
                        <i class="header-icon fe fe-align-left" ></i>
                    </a>
                    <a class="close-toggle" href="javascript:void(0)">
                        <i class="header-icons fe fe-x"></i>
                    </a>
                </div>
                {{-- <div class="main-header-center ml-3 d-sm-none d-md-none d-lg-block">
                    <input class="form-control" placeholder="Search for anything..." type="search"> 
                    
                    <button class="btn">
                        <i class="fas fa-search d-none d-md-block"></i>
                    </button>

                </div> --}}
            </div>

            <div class="main-header-left">
               
      
                <div class="nav nav-item  navbar-nav-right ml-auto">
               
                    {{-- <div class="dropdown nav-item main-header-message ">
                        <a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span class=" pulse-danger"></span></a>
                        <div class="dropdown-menu">
                            <div class="menu-header-content bg-primary text-left">
                                <div class="d-flex">
                                    <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Messages</h6>
                                    <span class="badge badge-pill badge-warning ml-auto my-auto float-right">Mark All Read</span>
                                </div>
                                <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread messages</p>
                            </div>
                            <div class="main-message-list chat-scroll">
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="  drop-img  cover-image  " data-image-src="{{asset('back/assets/img/faces/3.jpg')}}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">Petey Cruiser</h5>
                                        </div>
                                        <p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......</p>
                                        <p class="time mb-0 text-left float-left ml-2 mt-2">Mar 15 3:55 PM</p>
                                    </div>
                                </a>
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="drop-img cover-image" data-image-src="{{asset('back/assets/img/faces/2.jpg')}}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">Jimmy Changa</h5>
                                        </div>
                                        <p class="mb-0 desc">All set ! Now, time to get to you now......</p>
                                        <p class="time mb-0 text-left float-left ml-2 mt-2">Mar 06 01:12 AM</p>
                                    </div>
                                </a>
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="drop-img cover-image" data-image-src="{{asset('back/assets/img/faces/9.jpg')}}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">Graham Cracker</h5>
                                        </div>
                                        <p class="mb-0 desc">Are you ready to pickup your Delivery...</p>
                                        <p class="time mb-0 text-left float-left ml-2 mt-2">Feb 25 10:35 AM</p>
                                    </div>
                                </a>
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="drop-img cover-image" data-image-src="{{asset('back/assets/img/faces/12.jpg')}}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">Donatella Nobatti</h5>
                                        </div>
                                        <p class="mb-0 desc">Here are some products ...</p>
                                        <p class="time mb-0 text-left float-left ml-2 mt-2">Feb 12 05:12 PM</p>
                                    </div>
                                </a>
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="drop-img cover-image" data-image-src="{{asset('back/assets/img/faces/5.jpg')}}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">Anne Fibbiyon</h5>
                                        </div>
                                        <p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
                                        <p class="time mb-0 text-left float-left ml-2 mt-2">Jan 29 03:16 PM</p>
                                    </div>
                                </a>
                            </div>
                            <div class="text-center dropdown-footer">
                                <a href="text-center">VIEW ALL</a>
                            </div>
                        </div>
                    </div> --}}

                  
                    
                    <div class="nav-item full-screen fullscreen-button">
                        <a class="new nav-link full-screen-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize">
                            <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <div class="dropdown main-profile-menu nav nav-item nav-link">
                        <a class="profile-user d-flex" href="">
                      
                                <img alt="" src="{{asset('back/assets/img/faces/6.jpg')}}">
                        
                           
                        </a>
                        <div class="dropdown-menu" >
                            <div class="main-header-profile bg-primary p-3">
                                <div class="d-flex wd-100p">
                                    <div class="main-img-user">
                                      
                                        <img alt="" src="{{asset('back/assets/img/faces/6.jpg')}}" class="">
                                    
                                    </div>
                                    <div class="ml-3 my-auto">
                                        <h6>{{ auth()->user()->name }} </h6><span>Smart</span>
                                    </div>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{route('editProfile')}}"><i class="bx bx-user-circle"></i>Profile</a>
                            {{-- <a class="dropdown-item" href=""><i class="bx bx-cog"></i> {{__('route.Edit_Profile')}}</a> --}}
                            {{-- <a class="dropdown-item" href=""><i class="bx bxs-inbox"></i>Inbox</a>
                            <a class="dropdown-item" href=""><i class="bx bx-envelope"></i>Messages</a> --}}
                           
                            <a class="dropdown-item" href="{{route('logout')}}"><i class="bx bx-log-out"></i> Sign Out</a>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <!-- /main-header -->