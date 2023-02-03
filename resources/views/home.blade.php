@extends('layout.index')


@section('content')
<link href="{{asset('css/Home/plugins.min.css')}}" rel="stylesheet">
<link href="{{asset('css/Home/template.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="{{asset('css/Home/images/favicon.png')}}">
<link rel="apple-touch-icon" href="{{asset('css/Home/images/apple-touch-icon.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('css/Home/images/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('css/Home/images/apple-touch-icon-114x114.png')}}">

 <section class="module divider-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto text-center">
                <h1>Your Site, Your Way.</h1>
                <p class="lead">See how your users experience your website in realtime or view trends to see any changes in performance over time.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="space" data-MY="60px"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p><img src="{{asset('css/Home/images/main/mega-mockup.png')}}" alt=""></p>
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
                    <div class="icon-box-icon"><span class="bi-p-circle"></span></div>
                    <div class="icon-box-title">
                        <h6>Visual Composer</h6>
                    </div>
                    <div class="icon-box-content">
                        <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet.</p>
                    </div>
                    <div class="icon-box-link"><a href="#">Read more</a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="icon-box text-center">
                    <div class="icon-box-icon"><span class="bi-calendar-check-fill"></span></div>
                    <div class="icon-box-title">
                        <h6>Revolution Slider</h6>
                    </div>
                    <div class="icon-box-content">
                        <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet.</p>
                    </div>
                    <div class="icon-box-link"><a href="#">Read more</a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="icon-box text-center">
                    <div class="icon-box-icon"><span class="bi-hourglass-split"></span></div>
                    <div class="icon-box-title">
                        <h6>User Experience</h6>
                    </div>
                    <div class="icon-box-content">
                        <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet.</p>
                    </div>
                    <div class="icon-box-link"><a href="#">Read more</a></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="icon-box text-center">
                    <div class="icon-box-icon"><span class="bi-check2"></span></div>
                    <div class="icon-box-title">
                        <h6>Fully Responsive</h6>
                    </div>
                    <div class="icon-box-content">
                        <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet.</p>
                    </div>
                    <div class="icon-box-link"><a href="#">Read more</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About end-->

<section class="module divider-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="review-slides owl-carousel">
                    <div class="review">
                        <div class="review-icons">
                            <h2 class="ti-comment-alt"></h2>
                        </div>
                        <div>
                            <blockquote>
                                <p>I don't work from drawings. I don't make sketches and drawings <br/> and color sketches into a final painting.</p>
                                <footer class="blockquote-footer">Albert Einstein</footer>
                            </blockquote>
                        </div>
                    </div>
                    <div class="review">
                        <div class="review-icons">
                            <h2 class="ti-comment-alt"></h2>
                        </div>
                        <div class="review-content">
                            <blockquote>
                                <p>To be yourself in a world that is constantly trying to make you <br/> something else is the greatest accomplishment.</p>
                                <footer class="blockquote-footer">Ralph Waldo Emerson</footer>
                            </blockquote>
                        </div>
                    </div>
                    <div class="review">
                        <div class="review-icons">
                            <h2 class="ti-comment-alt"></h2>
                        </div>
                        <div >
                            <blockquote>
                                <p>Imperfection is beauty, madness is genius and it's better to be <br/> absolutely ridiculous than absolutely boring.</p>
                                <footer class="blockquote-footer">Marilyn Monroe</footer>
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
