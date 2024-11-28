<!DOCTYPE html>
<html lang="en">
	<head>

		
		@include('back.layout.css')

	</head>

	<body class="main-body app sidebar-mini " >

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{asset('back/assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Page -->
		<div class="page" >
            <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

				@include('back.layout.sidbar')

				<!-- main-content -->
				<div class="main-content app-content">

					@include('back.layout.header')

					<!-- container -->
					@yield('content')
					<!-- /Container -->
				</div>
				
				<!-- /main-content -->
				<!-- /Container -->
			</div>
			<!-- /main-content -->

			<!-- Sidebar-right-->

                {{-- @include('layout.sidebar_2') --}}
				
			<!--/Sidebar-right-->

		

			<!-- Footer opened -->
                @include('back.layout.footer')
			<!-- Footer closed -->

		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
		
        @include('back.layout.js')

	</body>
</html>