<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

		<!-- Title -->
		<title> Log in </title>

		<!-- Favicon -->
        @include('back.layout.css')

	</head>
	<body class="main-body ">

		

		<!-- Page -->
		<div class="page">

			<div class="container-fluid">
				<div class="row no-gutter">
					<!-- The image half -->
					<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
						<div class="row wd-100p mx-auto text-center">
							<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
								<img src="{{asset('front/img_front/Back_03 copy.jpg')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
							</div>
						</div>
					</div>
					<!-- The content half -->
					<div class="col-md-6 col-lg-6 col-xl-5 ">
						<div class="login d-flex align-items-center py-2">
							<!-- Demo content-->
							<div class="container p-0">
								<div class="row">
									<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
										<div class="card-sigin">
											<div class="mb-5 d-flex"> 
                                                <a href="javascript:void(0);">
                                                    <img src="{{asset('front/img_front/logo-sec-176x88.webp')}}" class="sign-favicon ht-70" alt="logo">
                                                </a>
                                                <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Smart<span>Ene</span>gy</h1>
                                        </div>
											<div class="card-sigin">
												<div class="main-signup-header">
													<h2>Welcome back!</h2>
													<h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>
                                                        @if ($errors->any())
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                         @endif
                                                    
                                                    <form action="{{route('login.form')}}" method="POST">
                                                        @csrf
														<div class="form-group">
															<label>email or phone</label>
                                                             <input class="form-control" value="{{old('email_or_phone')}}" name="email_or_phone" placeholder="Enter your email or phone" type="text">
														</div>
														<div class="form-group">
															<label>Password </label> 
                                                            <input class="form-control" name="password" placeholder="Enter your route.Password" type="password">
														</div>
                                                        <button class="btn btn-main-primary btn-block" type="submit">Sign In</button>
													
													</form>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- End -->
						</div>
					</div><!-- End -->
				</div>
			</div>

		</div>
		<!-- End Page -->

	
	

	</body>
</html>