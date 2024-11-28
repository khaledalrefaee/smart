    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">	

    <title>Smart Energy | حلول الطاقة الشمسية والبطاريات</title>	

    <meta name="keywords" content="Smart Energy, طاقة شمسية, بطاريات, ألواح شمسية, طاقة مستدامة, حلول الطاقة, solar energy, solar panels, batteries, sustainable energy, renewable energy" />
    <meta name="description" content="Smart Energy - رائدة في تصنيع البطاريات والألواح الشمسية لتوفير حلول طاقة مستدامة وفعالة." lang="ar">
    <meta name="description" content="Smart Energy - Leading manufacturer of solar panels and batteries for sustainable and efficient energy solutions." lang="en">
    <meta name="author" content="Smart Energy">


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('front/img_front/logo-sec-176x88.webp')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('front/img_front/logo-sec-176x88.webp')}}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendor/animate/animate.compat.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendor/magnific-popup/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendor/bootstrap-star-rating/css/star-rating.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css')}}">

    <!-- owl CSS -->
    <link rel="stylesheet" href="{{asset('front/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('front/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('front/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/theme-elements.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/theme-blog.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/theme-shop.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}">
    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="{{asset('front/css/skins/default.css')}}">
    
    
    {{-- <!-- Demo CSS -->
	<link rel="stylesheet" href="{{asset('front/css/demos/demo-startup-agency.css')}}">

	<!-- Skin CSS -->
	<link id="skinCSS" rel="stylesheet" href="{{asset('front/css/skins/skin-startup-agency.css')}}"> --}}

    <!-- Theme Custom CSS -->
    

    <!-- Head Libs -->
    <script src="{{asset('front/vendor/modernizr/modernizr.min.js')}}"></script>


    <!--  libs CSS -->
    <link rel="stylesheet" href="{{asset('front/libs/aos.css')}}">

    <style>


@import url('https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap');
        h1,h2,h3,h4,h5,h6,a,p,li {
            clear: both;
            font-family: "Space Grotesk Bold", -apple-system, BlinkMacSystemFont, Roboto, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-weight: bold;
            text-align: inherit;
            position: relative;
            letter-spacing: 1px;
        }
        
.custom-input {
        color: #333;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 15px;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .custom-input:focus {
        border-color: #b2ee58;
        box-shadow: 0px 0px 10px rgba(40, 167, 69, 0.5);
        outline: none;
    }

 
    .custom-input::placeholder {
        color: #333; /* لون الـ placeholder الرمادي الداكن */
        opacity: 1;  /* اجعل الـ placeholder واضحًا بالكامل */
        font-size: 16px; /* حجم الخط */
    }

.contact-form2 {
  z-index: auto;
}
.contact-form, .contact-form2 {
  margin: 100px 0 10px 0;
  padding: 10px 12%;
  background-color: #fff;
  border-radius: 20px;
  display: flex;
  flex-direction: column;
  align-items: start;
  box-shadow: 5px 4px 10px #777;
  color: var(--main-text-color);
  position: relative;
}

.circle-left, .circle-right {
    position: absolute;
    width: 50px;
    height: 50px;
    background-color: #d7f0b1; /* لون أحمر شفاف */
    border: 2px solid #d7f0b1; /* حدود شفافة */
    background-color: #d7f0b1; /* لون أحمر شفاف */
    border-radius: 50%;
    opacity: 0;
    animation: pulse 3s infinite;
}

.circle-left {
    top: 41%;
    left: 40%;
    transform: translateY(-50%);
}

.circle-right {
    top: -17%;
    right: 38%;
    transform: translateY(-50%);
}

/* عند تصغير الشاشة */
@media (max-width: 768px) {
    .circle-left {
        top: 30%;
        left: 26%;
    }

    .circle-right {
        top: -14%;
        right: 21%;
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


.header-section {
    background-image: url("{{asset('front/img_front/solar-power-plant.jpg')}}");
    background-size: cover;
    background-position: center;
    height: 500px; /* ارتفاع القسم */
    position: relative;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* طبقة شفافة فوق الصورة */
    display: flex;
    justify-content: center;
    align-items: center;
}

.menu-icons {
 
    display: flex;
    justify-content: space-around;
    width: 100%;
    max-width: 1200px; /* الحد الأقصى للعرض */
    padding: 20px;
}

.icon-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    color: #fff;
}

.icon-item img {
    width: 60px;
    margin-bottom: 10px;
}

.icon-item p {
    font-size: 14px;
    margin: 0;
}


.fab-wrapper {
            position: fixed;
            bottom: 5rem;
            right: 3rem;
            z-index: 9999;
        }
        .fab-checkbox {
            display: none;
        }
        .fab {
            position: absolute;
            bottom: -1rem;
            right: -1rem;
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            background: #626264;
            box-shadow: 0px 5px 20px #8b8b8f;
            transition: all 0.3s ease;
            z-index: 1;
            border-bottom-right-radius: 6px;
            border: 1px solid grey;
        }

        .fab:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .fab-checkbox:checked ~ .fab:before {
            width: 90%;
            height: 90%;
            left: 5%;
            top: 5%;
            background-color: rgba(255, 255, 255, 0.2);
        }
        .fab:hover {
            background: #626264;
            box-shadow: 0px 5px 20px 5px #626264;
        }

        .fab-dots {
            position: absolute;
            height: 8px;
            width: 8px;
            background-color: white;
            border-radius: 50%;
            top: 50%;
            transform: translateX(0%) translateY(-50%) rotate(0deg);
            opacity: 1;
            animation: blink 3s ease infinite;
            transition: all 0.3s ease;
        }

        .fab-dots-1 {
            left: 15px;
            animation-delay: 0s;
        }
        .fab-dots-2 {
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            animation-delay: 0.4s;
        }
        .fab-dots-3 {
            right: 15px;
            animation-delay: 0.8s;
        }

        .fab-checkbox:checked ~ .fab .fab-dots {
            height: 6px;
        }

        .fab .fab-dots-2 {
            transform: translateX(-50%) translateY(-50%) rotate(0deg);
        }

        .fab-checkbox:checked ~ .fab .fab-dots-1 {
            width: 32px;
            border-radius: 10px;
            left: 50%;
            transform: translateX(-50%) translateY(-50%) rotate(45deg);
        }
        .fab-checkbox:checked ~ .fab .fab-dots-3 {
            width: 32px;
            border-radius: 10px;
            right: 50%;
            transform: translateX(50%) translateY(-50%) rotate(-45deg);
        }

        @keyframes blink {
            50% {
                opacity: 0.25;
            }
        }

        .fab-checkbox:checked ~ .fab .fab-dots {
            animation: none;
        }

        .fab-wheel {
            position: absolute;
            bottom: 0;
            right: 0;
            border: 1px solid transparent;
            width: 10rem;
            height: 10rem;
            transition: all 0.3s ease;
            transform-origin: bottom right;
            transform: scale(0);
        }

        .fab-checkbox:checked ~ .fab-wheel {
            transform: scale(1);
        }
        .fab-action {
            position: absolute;
            background: #626264;
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: White;
            box-shadow: 0 0.1rem 1rem #949497;
            transition: all 1s ease;

            opacity: 0;
        }

        .fab-checkbox:checked ~ .fab-wheel .fab-action {
            opacity: 1;
        }

        .fab-action:hover {
            background-color: #626264;
        }

        .fab-wheel .fab-action-1 {
            right: -1rem;
            top: 0;
        }

        .fab-wheel .fab-action-2 {
            right: 3.4rem;
            top: 0.5rem;
        }
        .fab-wheel .fab-action-3 {
            left: 0.5rem;
            bottom: 3.4rem;
        }
        .fab-wheel .fab-action-4 {
            left: 0;
            bottom: -1rem;
        }

       .footer-form button {
        position: absolute;
        background-color: #60F81B;
        padding: 9px 20px !important;
        top: 0;
        right: 13%;
        box-shadow: 0 0 7px #777;
        transition: all 200ms;
        }
        .footer-form input {
        width: 80%;
        }
        .footer-form input, .footer-form button {
        outline: none;
        border: none;
        border-radius: 30px;
        }
        .footer-form button:hover {
        filter: brightness(0.8);
        }
        
        .marvel-line {
        background-image: url("{{asset('front/img_front/why-marvel-bg.png')}}");
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: contain;
        display: flex;
        flex-direction: row;
        align-items: start;
        justify-content: space-around;
        flex-wrap: nowrap;
        }

        .lamp-content {
            width: 20%;
            position: relative;
            display: flex;
            justify-content: center;
        }
        .compare-title_footer {
            padding: 6px;
            z-index: 3;
            border-radius: 13px;
            height: 39px;
            
        }

        .text-light-heading {
    position: relative;
    display: inline-block;
    padding-bottom: 5px; /* المسافة بين النص والخط */
}

.text-light-heading::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    width: 50%; /* عرض الخط */
    height: 1px; /* سماكة الخط */
    background-color: #FFFFFF;
}


        .InputContainer {
        width: 281px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to bottom,rgb(110, 105, 105),rgb(199, 192, 192));
        border-radius: 11px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.075);
        /* margin-top: 13%; */
        }
        
        .input {
        width: 275px;
        height: 40px;
        border: none;
        outline: none;
        caret-color: rgb(251, 184, 153);
        background-color: rgb(255, 255, 255);
        border-radius: 9px;
        padding-left: 15px;
        letter-spacing: 0.8px;
        color: rgb(19, 19, 19);
        font-size: 13.4px;
        }


    


        /* تنسيق الأيقونة داخل حقل الإدخال */
        .search-icon {
            position: absolute;
            left: 10px; /* موقع الأيقونة داخل الحقل */
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 16px;
            pointer-events: none;
        }

        /* إخفاء الأيقونة عند الكتابة في حقل الإدخال */
        .search-input:not(:placeholder-shown) + .search-icon {
            display: none;
        }



        
        /* .after-title {
        position: relative;
        }

        .after-title::after {
            content: "";
            position: absolute;
            width: 4%;
            height: 117%;
            right: 39%;
            top: -28%;
            background-image: url("{{asset('front/img_front/after-title.png')}}");
            background-size: contain;
            background-repeat: no-repeat; 
            background-position: right 0 top 0; 
        }

@media (max-width: 1200px) {
    .after-title::after {
        right: 41%;; 
        top: -25%;
        width: 5%; 
    }
}

@media (max-width: 992px) {
    .after-title::after {
        right: 32%; 
        top: -20%; 
        width: 6%;
    }
}

@media (max-width: 768px) {
    .after-title::after {
        right: 25%;
        top: -15%; 
        width: 8%; 
    }
}

@media (max-width: 576px) {
    .after-title::after {
        right: 19%;
        top: -28%; 
        width: 10%; 
    }
}

@media (max-width: 400px) {
    .after-title::after {
        right: 10%;
        top: -21%;
        width: 12%;
    }
} */

@media (max-width: 768px) {
    .test {
        display: none;
    }
}
      









        
        body[data-bs-theme="light"] {
            background-color: white;
            color: black;
        }

        body[data-bs-theme="light"] .main {
            background-color: white;
            fill: white;
            color: black;
        }

        body[data-bs-theme="dark"] {
            background-color: black;
            color: white;
        }

        body[data-bs-theme="dark"] .main {
            background-color: #333;
            fill: #333;
            color: white;
        }


        

        body[data-bs-theme="light"] {
            background-color: white;
            color: black;
        }

        body[data-bs-theme="light"] .main {
            background-color: white;
            color: black;
        }

        body[data-bs-theme="dark"] {
            background-color: black;
            color: white;
        }

        body[data-bs-theme="dark"] .main {
            background-color: #333;
            color: white;
        }

      


         /* الوضع الافتراضي (Light Mode) */
    [data-bs-theme="light"] .dropdown-menu {
        background-color: #fff; /* خلفية بيضاء للوضع الفاتح */
        color: #333; /* لون النص داكن للوضع الفاتح */
        border: 1px solid #ddd; /* حدود خفيفة */
    }
    
    [data-bs-theme="light"] .dropdown-item {
        color: #333; /* لون النص في Light Mode */
    }

    [data-bs-theme="light"] .dropdown-item:hover {
        background-color: #f0f0f0; /* تغيير الخلفية عند التحويم في الوضع الفاتح */
    }

    /* الوضع الليلي (Dark Mode) */
    [data-bs-theme="dark"] .dropdown-menu {
        background-color: #333; /* خلفية داكنة للوضع الليلي */
        color: #fff; /* لون النص فاتح للوضع الليلي */
        border: 1px solid #555; /* حدود داكنة للوضع الليلي */
    }
    
    [data-bs-theme="dark"] .dropdown-item {
        color: #fff; /* لون النص في Dark Mode */
    }

    [data-bs-theme="dark"] .dropdown-item:hover {
        background-color: #444; /* تغيير الخلفية عند التحويم في الوضع الليلي */
    }

    /* الوضع الداكن - Dark Mode عند الشاشات الصغيرة */
@media (max-width: 767px) {
    body[data-bs-theme="dark"] #header .header-body nav {
        background-color: #333 !important; /* لون خلفية داكن */
        color: #fff !important; /* لون النص أبيض */
    }
}

/* الوضع الفاتح - Light Mode عند الشاشات الصغيرة */
@media (max-width: 767px) {
    body[data-bs-theme="light"] #header .header-body nav {
        background-color: white !important; /* لون خلفية فاتح */
        color: #000 !important; /* لون النص أسود */
    }
}


            /* الوضع الداكن - Dark Mode */
            body[data-bs-theme="dark"] #header .header-body  {
                background-color: #333 !important; /* لون خلفية داكن */
                color: #fff; /* لون النص أبيض */
            }

            /* الوضع الفاتح - Light Mode */
            body[data-bs-theme="light"] #header .header-body  {
                background-color: white !important; /* لون خلفية فاتح */
                color: #000; /* لون النص أسود */
            }


            /* الوضع الداكن - Dark Mode */
            body[data-bs-theme="dark"] header  ul li a {
                color: #fff !important; 
            }

            body[data-bs-theme="dark"] header  ul li a:hover {
                color: #8fc340  !important; 
            }

            body[data-bs-theme="dark"] header  ul li a.active {
                color: #8fc340  !important; 
            }

            /* الوضع الفاتح - Light Mode */
            body[data-bs-theme="light"] header  ul li a {
                color: #000 !important; 
            }

            body[data-bs-theme="light"] header  ul li a:hover {
                color: #8fc340 !important;
            }

            body[data-bs-theme="light"] header  ul li a.active {
                color: #8fc340 !important; 
            }



        /* الوضع الافتراضي - Light Mode */
        body[data-bs-theme="light"] {
            background-color: #fff;
            color: #000;
        }

      
        body[data-bs-theme="light"] p, 
        body[data-bs-theme="light"] h1, h2, h3, h4, h5, h6 {
            color: #000; /* الكتابة سوداء */
        }

        /* الوضع الداكن - Dark Mode */
        body[data-bs-theme="dark"] {
            background-color: #000;
            color: #fff;
        }

        
        body[data-bs-theme="dark"] p, 
        body[data-bs-theme="dark"] h1, h2, h3, h4, h5, h6 {
            color: #fff; /* الكتابة بيضاء */
        }

        /* عناصر خاصة - الأزرار، الروابط */
        button, a {
            transition: background-color 0.3s, color 0.3s;
        }

    

      

      


    </style>