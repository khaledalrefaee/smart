		<!-- Vendor -->
		<script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
		<script src="{{asset('front/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
		<script src="{{asset('front/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
		<script src="{{asset('front/vendor/jquery.cookie/jquery.cookie.min.js')}}"></script>
		<script src="{{asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('front/vendor/jquery.validation/jquery.validate.min.js')}}"></script>
		<script src="{{asset('front/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
		<script src="{{asset('front/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
		<script src="{{asset('front/vendor/lazysizes/lazysizes.min.js')}}"></script>
		<script src="{{asset('front/vendor/isotope/jquery.isotope.min.js')}}"></script>
		<script src="{{asset('front/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
		<script src="{{asset('front/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('front/vendor/vide/jquery.vide.min.js')}}"></script>
		<script src="{{asset('front/vendor/vivus/vivus.min.js')}}"></script>

        <script src="{{asset('front/vendor/bootstrap-star-rating/js/star-rating.min.js')}}"></script>
		<script src="{{asset('front/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js')}}"></script>
		<script src="{{asset('front/vendor/elevatezoom/jquery.elevatezoom.min.js')}}"></script>

        <script src="{{asset('front/vendor/owl.carousel/owl.carousel.min.js')}}"></script>


		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('front/js/theme.js')}}"></script>

		<!-- Theme Custom -->
		<script src="{{asset('front/js/custom.js')}}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{asset('front/js/theme.init.js')}}"></script>

     

	    <!-- Examples -->
		<script src="{{asset('front/js/examples/examples.gallery.js')}}"></script>

        <!-- Current Page Vendor and Views -->
        <script src="{{asset('front/js/views/view.shop.js')}}"></script>
        <!--  libs js -->
        <script src="{{asset('front/libs/aos.js')}}"></script>

        <script>
            AOS.init();
        </script>

<script>
    function toggleDarkMode() {
        var element = document.body;
        var currentTheme = element.dataset.bsTheme === "light" ? "dark" : "light";
        element.dataset.bsTheme = currentTheme;

        localStorage.setItem('theme', currentTheme);

        var icon = document.getElementById('toggle-dark-mode').querySelector('i');
        var logo = document.getElementById('logo');
        
        if (currentTheme === "dark") {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            document.getElementById('toggle-dark-mode').innerHTML = '<i class="fas fa-sun"></i>';
            logo.src = "{{asset('front/img_front/logo white@300x.png')}}"; // شعار الوضع الداكن
            logo.width = 140; // العرض للوضع الداكن
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            document.getElementById('toggle-dark-mode').innerHTML = '<i class="fas fa-moon"></i>';
            logo.src = "{{asset('front/img_front/logo-sec-176x88.webp')}}"; // شعار الوضع الفاتح
            logo.width = 180; // العرض للوضع الفاتح
        }
    }

    window.onload = function() {
        var savedTheme = localStorage.getItem('theme');
        var logo = document.getElementById('logo');
        
        if (savedTheme) {
            document.body.dataset.bsTheme = savedTheme;

            var icon = document.getElementById('toggle-dark-mode').querySelector('i');
            if (savedTheme === "dark") {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                document.getElementById('toggle-dark-mode').innerHTML = '<i class="fas fa-sun"></i>';
                logo.src = "{{asset('front/img_front/logo white@300x.png')}}"; // شعار الوضع الداكن
                logo.width = 140; // العرض للوضع الداكن
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                document.getElementById('toggle-dark-mode').innerHTML = '<i class="fas fa-moon"></i>';
                logo.src = "{{asset('front/img_front/logo-sec-176x88.webp')}}"; // شعار الوضع الفاتح
                logo.width = 180; // العرض للوضع الفاتح
            }
        }
    }
</script>

<script>
    function changeLanguage() {
    var currentLang = "{{ App::getLocale() }}";
    var newLang = currentLang === 'en' ? 'ar' : 'en';  
    document.getElementById('lang-' + newLang).click();
}

</script>
        
        <script>
        const lamps = [
            {
                lightOn: "{{asset('front/img_front/lamp-1 light.png')}}",
                lightOff: "{{asset('front/img_front/lamp-1.png')}}",
                text: "Marvel Products are manufactured in the best international factories."
            },
            {
                lightOn: "{{asset('front/img_front/lamp-2 light.png')}}",
                lightOff: "{{asset('front/img_front/lamp-2.png')}}",
                text: "Marvel is a great competitor in energy systems and alternative power solutions."
            },
            {
                lightOn: "{{asset('front/img_front/lamp-3 light.png')}}",
                lightOff: "{{asset('front/img_front/lamp-3.png')}}",
                text: "Innovative designs that stand out in the market."
            },
            {
                lightOn: "{{asset('front/img_front/lamp-4 light.png')}}",
                lightOff: "{{asset('front/img_front/lamp-4.png')}}",
                text: "Commitment to sustainability and eco-friendly solutions."
            },
            {
                lightOn: "{{asset('front/img_front/lamp-5 light.png')}}",
                lightOff: "{{asset('front/img_front/lamp-5.png')}}",
                text: "Providing quality products for a brighter future."
            }
        ];

        let currentIndex = 0;

        function updateLampAndText() {
            const lamp = lamps[currentIndex];
            const lampImage = document.getElementById(`lamp${currentIndex + 1}`);
            const lampText = document.getElementById('lamp-text');

            lampImage.src = lamp.lightOn;

            lampText.textContent = lamp.text;
            lampText.style.opacity = 1;

            setTimeout(() => {
                lampImage.src = lamp.lightOff;
                lampText.style.opacity = 0; 

                currentIndex = (currentIndex + 1) % lamps.length;

                setTimeout(updateLampAndText, 1000); 
            }, 5000); 
        }

       
        updateLampAndText();

        </script>