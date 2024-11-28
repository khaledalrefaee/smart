<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<meta name="Description" content="SmartAdmin">
		<meta name="Author" content="Smart">
		<meta name="Keywords" content="Admin Dashboard,smart"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

   
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
		<!-- Title -->
		<title>  Dashboard Smart Energy </title>

		<!-- Favicon -->
		<link rel="icon" href="{{asset('front/img_front/logo-sec-176x88.webp')}}" type="image/x-icon"/>

		<!-- Icons css -->
		<link href="{{asset('back/assets/css/icons.css')}}" rel="stylesheet">

		<!--  Owl-carousel css-->
		<link href="{{asset('back/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

		<!--  Custom Scroll bar-->
		<link href="{{asset('back/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

		<!--  Right-sidemenu css -->
		<link href="{{asset('back/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

		<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css " rel="stylesheet">
		<!-- Maps css -->
		<link href="{{asset('back/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

		
		

		
		<!-- Internal Data table css -->
		<link href="{{asset('back/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('back/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
		<link href="{{asset('back/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('back/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
		<link href="{{asset('back/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
		<link href="{{asset('back/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

		<!--- Animations css-->
		<link href="{{asset('back/assets/css/animate.css')}}" rel="stylesheet">
		<!-- ********************************************************************-->

		<!--Internal  Datetimepicker-slider css -->
		<link href="{{asset('back/assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
		<link href="{{asset('back/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
		<link href="{{asset('back/assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">


		{{-- @if (App::getLocale() == 'ar')
		
			<!-- Sidemenu css -->
			<link rel="stylesheet" href="{{asset('back/assets/css-rtl/sidemenu.css')}}">
			<!--- Style css --->
			<link href="{{asset('back/assets/css-rtl/style.css')}}" rel="stylesheet">
			<!--- Dark-mode css --->
		  <link href="{{asset('back/assets/css-rtl/style-dark.css')}}" rel="stylesheet">
			
		

		@else --}}


			<!-- Sidemenu css -->
			<link rel="stylesheet" href="{{asset('back/assets/css/sidemenu.css')}}">

			<!-- style css -->
			<link href="{{asset('back/assets/css/style.css')}}" rel="stylesheet">
			
			<link href="{{asset('back/assets/css/style-dark.css')}}" rel="stylesheet">

		{{-- @endif --}}
		


		<style>
  .notification-badge {
      position: absolute;
      top: 2px;
      right: 0px;
      background-color: #dc3545;
      color: white; 
      padding: 2px 6px; 
      border-radius: 50%; 
      font-size: 12px; 
  }

.checkbox-wrapper-8 .tgl {
  display: none;
}

.checkbox-wrapper-8 .tgl,
  .checkbox-wrapper-8 .tgl:after,
  .checkbox-wrapper-8 .tgl:before,
  .checkbox-wrapper-8 .tgl *,
  .checkbox-wrapper-8 .tgl *:after,
  .checkbox-wrapper-8 .tgl *:before,
  .checkbox-wrapper-8 .tgl + .tgl-btn {
  box-sizing: border-box;
}

.checkbox-wrapper-8 .tgl::-moz-selection,
  .checkbox-wrapper-8 .tgl:after::-moz-selection,
  .checkbox-wrapper-8 .tgl:before::-moz-selection,
  .checkbox-wrapper-8 .tgl *::-moz-selection,
  .checkbox-wrapper-8 .tgl *:after::-moz-selection,
  .checkbox-wrapper-8 .tgl *:before::-moz-selection,
  .checkbox-wrapper-8 .tgl + .tgl-btn::-moz-selection,
  .checkbox-wrapper-8 .tgl::selection,
  .checkbox-wrapper-8 .tgl:after::selection,
  .checkbox-wrapper-8 .tgl:before::selection,
  .checkbox-wrapper-8 .tgl *::selection,
  .checkbox-wrapper-8 .tgl *:after::selection,
  .checkbox-wrapper-8 .tgl *:before::selection,
  .checkbox-wrapper-8 .tgl + .tgl-btn::selection {
  background: none;
}

.checkbox-wrapper-8 .tgl + .tgl-btn {
  outline: 0;
  display: block;
  width: 3em;
  height: 2em;
  position: relative;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.checkbox-wrapper-8 .tgl + .tgl-btn:after,
  .checkbox-wrapper-8 .tgl + .tgl-btn:before {
  position: relative;
  display: block;
  content: "";
  width: 50%;
  height: 100%;
}

.checkbox-wrapper-8 .tgl + .tgl-btn:after {
  left: 0;
}

.checkbox-wrapper-8 .tgl + .tgl-btn:before {
  display: none;
}

.checkbox-wrapper-8 .tgl:checked + .tgl-btn:after {
  left: 50%;
}

.checkbox-wrapper-8 .tgl-skewed + .tgl-btn {
  overflow: hidden;
  transform: skew(-10deg);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transition: all 0.2s ease;
  font-family: sans-serif;
  background: #888;
}

.checkbox-wrapper-8 .tgl-skewed + .tgl-btn:after,
  .checkbox-wrapper-8 .tgl-skewed + .tgl-btn:before {
  transform: skew(10deg);
  display: inline-block;
  transition: all 0.2s ease;
  width: 100%;
  text-align: center;
  position: absolute;
  line-height: 2em;
  font-weight: bold;
  color: #fff;
  text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
}

.checkbox-wrapper-8 .tgl-skewed + .tgl-btn:after {
  left: 100%;
  content: attr(data-tg-on);
}

.checkbox-wrapper-8 .tgl-skewed + .tgl-btn:before {
  left: 0;
  content: attr(data-tg-off);
}

.checkbox-wrapper-8 .tgl-skewed + .tgl-btn:active {
  background: #888;
}

.checkbox-wrapper-8 .tgl-skewed + .tgl-btn:active:before {
  left: -10%;
}

.checkbox-wrapper-8 .tgl-skewed:checked + .tgl-btn {
  background: #86d993;
}

.checkbox-wrapper-8 .tgl-skewed:checked + .tgl-btn:before {
  left: -100%;
}

.checkbox-wrapper-8 .tgl-skewed:checked + .tgl-btn:after {
  left: 0;
}

.checkbox-wrapper-8 .tgl-skewed:checked + .tgl-btn:active:after {
  left: 10%;
}



/* .select2-container--default .select2-selection--single .select2-selection__rendered {
  
  padding-left: 16.4rem !important;

} */
		</style>
	<style>
          /* تحسينات عامة لعناصر الإدخال */
      .form-control {
          border: 1px solid #ddd;
          border-radius: 8px;
          padding: 10px;
          font-size: 16px;
          transition: border-color 0.3s, box-shadow 0.3s;
      }

      .form-control:focus {
          border-color: #007bff;
          box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
      }

      label.form-label {
          font-weight: bold;
          color: #555;
          margin-bottom: 5px;
      }

      /* تحسين المظهر لأزرار التحديد */
      select.form-control {
          background-color: #f9f9f9;
          cursor: pointer;
      }

    
      /* مساحة بين الحقول */
      .form-group, .parsley-select {
          margin-bottom: 20px;
      }

      /* جعل حواف الحقول ناعمة */
      input[type="file"] {
          border: 1px solid #ddd;
          padding: 5px;
          border-radius: 8px;
          font-size: 14px;
      }

</style>