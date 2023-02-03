@extends('layout.index')


@section('content')
<link href="{{asset('css/Home/plugins.min.css')}}" rel="stylesheet">
<link href="{{asset('css/Home/template.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="{{asset('css/Home/images/favicon.png')}}">
<link rel="apple-touch-icon" href="{{asset('css/Home/images/apple-touch-icon.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('css/Home/images/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('css/Home/images/apple-touch-icon-114x114.png')}}">
<style>
    .text-black{
        color: #ff7241 !important
    }
</style>
 <section class="module divider-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto text-center">
                <h1>Your Site, Your Way.</h1>
                <p class="lead">See how your users experience your website in realtime or view trends to see any changes in performance over time.</p>
               <a href="" > <h1 style="background-color: #ff7241"  class="btn text-light ">Book now </h1></a>
                <img style="filter: invert(57%) sepia(62%) saturate(2372%) hue-rotate(332deg) brightness(101%) contrast(101%);"  src="{{asset('css/Home/images/kisspng-paris-vector-graphics-illustration-skyline-clip-ar-2-paris-skyline-silhouette-png-for-free-download-5c7f3a57b61a24.6167363215518418797459.png')}}" alt="">
           
            </div>
          
            </div>
          
    
        
         
        <div class="row">
            <div class="col-md-12">
                <div class="space" data-mY="30px"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="icon-box text-center">
                    <div class="icon-box-icon"><span class=" text-black bi-p-circle"></span></div>
                    <div class="icon-box-title">
                        <h6>Visual Composer</h6>
                    </div>
                    <div class="icon-box-content">
                        <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="icon-box text-center">
                    <div class="icon-box-icon"><span  class="text-black bi-calendar-check-fill"></span></div>
                    <div class="icon-box-title">
                        <h6>Revolution Slider</h6>
                    </div>
                    <div class="icon-box-content">
                        <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet.</p>
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="icon-box text-center">
                    <div class="icon-box-icon"><span class=" text-black bi-hourglass-split"></span></div>
                    <div class="icon-box-title">
                        <h6>User Experience</h6>
                    </div>
                    <div class="icon-box-content">
                        <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet.</p>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="icon-box text-center">
                    <div class="icon-box-icon"><span class=" text-black bi-check2"></span></div>
                    <div class="icon-box-title">
                        <h6>Fully Responsive</h6>
                    </div>
                    <div class="icon-box-content">
                        <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet.</p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About end-->

<div class="col-12"></div>

<section class="module p-t-0 p-b-40">
    <div class="container">
        <div class="space" data-MY="-60px"></div>
        <div class="row">
            <div class="col-md-4 pricing-wrapper">
                <div class="pricing-header">
                    <div class="pricing-icon"><i class="bi bi-person text-black"></i></div>
                    <div class="pricing-title">Starter</div>
                </div>
                <div class="pricing-price">Free
                </div>
                <div class="pricing-body">
                    <p>Map where your photos<br>were taken and discover local<br>points of interest.</p>
                </div>
                <div class="pricing-footer">
                  
                </div>
            </div>
            <div class="col-md-4 pricing-wrapper pricing-popular">
                <div class="pricing-header">
                    <div class="pricing-icon"><i class="bi bi-emoji-laughing-fill text-black"></i></div>
                    <div class="pricing-title">Standard</div>
                </div>
                <div class="pricing-price"><span>$</span>45
                </div>
                <div class="pricing-body">
                    <p>Map where your photos<br>were taken and discover local<br>points of interest.</p>
                </div>
                <div class="pricing-footer">
                
                </div>
            </div>
            <div class="col-md-4 pricing-wrapper pricing-popular">
                <div class="pricing-header">
                    <div class="pricing-icon"><i class="bi bi-building-fill-check text-black"></i></div>
                    <div class="pricing-title">Professional</div>
                </div>
                <div class="pricing-price"><span>$</span>69
                </div>
                <div class="pricing-body">
                    <p>Map where your photos<br>were taken and discover local<br>points of interest.</p>
                </div>
                <div class="pricing-footer">
                   
                </div>
            </div>
        </div>
</section>


<div class="col-12"></div>
<section class="module divider-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="review-slides owl-carousel">
                    <div class="review">
                        <div class="review-icons">
                            <h2 class="bi-chat-heart text-danger"></h2>
                        </div>
                        <div>
                            <blockquote>
                                <p>I don't work from drawings. I don't make sketches and drawings <br/> and color sketches into a final painting.</p>
                                <footer class="blockquote-footer">Albert Einstein</footer>
                            </blockquote>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
        
</section>
<script src="{{asset('css/Home/js/custom/jquery.min.js')}}"></script>
<script src="{{asset('css/Home/js/custom/popper.min.js')}}"></script>
<script src="{{asset('css/Home/js/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('css/Home/js/custom/plugins.min.js')}}"></script>
<script src="{{asset('css/Home/js/custom/custom.min.js')}}"></script>
@endsection
