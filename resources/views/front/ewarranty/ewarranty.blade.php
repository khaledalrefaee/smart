@extends('front.index')
@section('content')

<style>
    .ew-pop-1 {
  position: absolute;
  z-index: auto;
  height: 100px;
  width: 100px;
  top: 40%;
  left: 20%;
  background-color: #FA9E19;
  border-radius: 50%;
  opacity: 0;
  animation: poples-2 infinite 5s linear 2s;
}
.ew-pop-2 {
  position: absolute;
  z-index: auto;
  height: 80px;
  width: 80px;
  top: 60%;
  left: 60%;
  background-color: #36306e;
  border-radius: 50%;
  opacity: 0;
  animation: poples-2 infinite 5s linear 1s;
}

.ew-pop-3 {
  position: absolute;
  z-index: auto;
  height: 100px;
  width: 100px;
  top: 70%;
  left: 50%;
  background-color: #FA9E19;;
  border-radius: 50%;
  opacity: 0;
  animation: poples-2 infinite 5s linear 3s;
}


.warrenty-btn {
  display: block;
  width: 100%;
  padding: 10px;
  text-align: center;
  font-size: 23px;
  font-weight: 600;
  letter-spacing: 0.5px;
  color: #2d2c2c;
  background-color: #fffefe;
  margin-top: 20px;
  border-radius: 16px;
  transition: all 300ms;
  box-shadow: 2px 2px 7px #444;
}

    .ew-pop-4 {
  background-image: url("{{asset('front/img_front/sparkling (1) 1.png')}}");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  position: absolute;
  z-index: 1;
  height: 100px;
  width: 100px;
  top: 0;
  left: 20%;
  animation: flash alternate infinite 3s 2s;
  opacity: 0;
}

.ew-pop-5 {
  background-image: url("{{asset('front/img_front/sparkling (1) 1.png')}}");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  position: absolute;
  z-index: 1;
  height: 70px;
  width: 70px;
  top: 10%;
  right: 20%;
  animation: flash alternate infinite 3s;
  transform: rotate(45deg);
}
</style>
<div class="container">
    <div class="row py-5 position-relative">
        <div class="col text-center position-relative">
            <h1 class="text-8 font-weight-bold title">E - 
                <span class="text-primary">Warranty </span>
                <br>
                <span class="text-2 font-weight-bold title">Application</span>
            </h1> 
            
     
            <div class="circle-left"></div>
            <div class="circle-right"></div>
          </div>
          
    </div>
    
</div>



<div class="container">
    <div class="row ">
        <div class="col-sm-12 col-md-12 col-lg-6 ">
            <div class="d-flex justify-content-center align-items-center ew-img-content position-relative">
                <img class="img-fluid ew-img mt-5 " src="{{asset('front/img_front/e-warrenty.png')}}" alt="">
                <div class="ew-pop-1"></div>
                <div class="ew-pop-2"></div>
                <div class="ew-pop-3"></div>
                <div class="ew-pop-4 flash"></div>
                <div class="ew-pop-5 flash"></div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="d-flex justify-content-start align-items-center mt-5">
                <div class="col-5 col-md-3">
                    <img class="img-fluid" style="border-radius: 20px;" src="https://www.marvel-battery.com/assest1/ewarranty-imgs/icon.png" alt="">
                </div>
                <div class="ms-5">
                    <h1 class="text-8 font-weight-bold title text-primary">E - 
                        <span class="text-primary">Warranty </span>
                        <p class="hover-color fs-6 ">Your Warranty Is Safe</p>

                    </h1>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center flex-wrap mt-5">
                <div style="width: 30%;" class="d-flex flex-column">
                    <a href="https://apps.apple.com/cl/app/marvels-e-warranty/id1594889128"><img class="img-fluid rounded-4" src="{{asset('front/img_front/Rectangle 32.png')}}" alt=""></a>
                    <img class="img-fluid mt-4" src="http://chart.apis.google.com/chart?cht=qr&amp;chs=300x300&amp;chl=https://apps.apple.com/cl/app/marvels-e-warranty/id1594889128" alt="">
                </div>
                <div style="width: 30%;" class="d-flex flex-column">
                    <a href="https://play.google.com/store/apps/details?id=com.marveltech.ewarrenty&amp;pli=1"><img class="img-fluid rounded-4" src="{{asset('front/img_front/Rectangle 32.png')}}" alt=""></a>
                    <img class="img-fluid mt-4" src="http://chart.apis.google.com/chart?cht=qr&amp;chs=300x300&amp;chl=https://play.google.com/store/apps/details?id=com.marveltech.ewarrenty&amp;pli=1" alt="">
                </div>
                <div style="width: 30%;" class="d-flex flex-column">
                    <a href="http://e-warranty.marvel-battery.com/APK/E-warranty_1_3_1.apk"><img class="img-fluid rounded-4" src="{{asset('front/img_front/Rectangle 32.png')}}" alt=""></a>
                    <img class="img-fluid mt-4" src="http://chart.apis.google.com/chart?cht=qr&amp;chs=300x300&amp;chl=http://e-warranty.marvel-battery.com/APK/E-warranty_1_3_1.apk" alt="">
                </div>
            </div>
            <div class="w-100">
                <a target="_blank" class="warrenty-btn" href="{{route('user-warranty')}}"><i class=" mx-4 fs-3 fa-solid fa-globe"></i>E-Warrenty website</a>
            </div>
        </div>
    </div>


    <div class="row my-5">
        <div class="col-sm-12 col-md-6 d-flex align-items-start justify-content-evenly flex-column" style="padding-left: 5%;">
            <h1 class="text-9 font-weight-bold title ">E-Warranty App Guide</h1>
            <p style="margin-left: 6%; margin-top:6%; font-size: 18px;">
                    Need help to get started?
                </p>
                <p style="margin-left: 6%; font-size: 18px;">
                    Watch this tutorial for detailed information.
                </p>
                <p style="margin-left: 6%; font-size: 14px;">
                    For arabic version follow the link 
                    <a target="_blank" href="https://youtu.be/rbxWMaJvlgE" style="color: #0d5a96">Arabic tutorial <i class="fa fa-external-link" aria-hidden="true"></i>
                    </a>
                </p>
        </div>
        <div  class="col-md-6 d-flex justify-content-center">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/gyrBvJYugk8?si=EiYPGs_qnvck_Pv2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
</div>
@endsection