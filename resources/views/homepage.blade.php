@extends('layouts.app')

@section('title', 'NgaoDuVietNam')

@section('logo')
    <img src="{{ asset('assets/images/logo-3.png') }}" alt="">
@endsection

{{-- import css --}}
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('xtreme/assets/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owlcarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owlcarousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/client/homepage/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/client/homepage/responsive.css') }}">
@endsection

{{-- header-content --}}
@section('header-content')
    <div class="row">
        <div class="content-header width-default">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-7">
                    <p>Welcome to NgaoduVietnam</p>
                    <strong>Perfect place for your stories</strong>
                </div>
                <div class="col-12 col-sm-12 col-lg-5">
                    <form action="{{ route('home.search') }}" class="form-search">
                        
                        <div class="form-search-item">
                            <h4>Discover beautiful Vietnam</h4>
                        </div>
                        <div class="form-search-item wrap-input">
                            <img src="{{ asset('assets/icons/outline/search.png') }}">
                            <input type="text" name="title" placeholder="Tour name">
                        </div>
                        <div class="form-search-item wrap-input">
                            <img src="{{ asset('assets/icons/outline/shape.png') }}">
                            <input type="text" name="destination" placeholder="Destination">
                        </div>
                        <div class="form-search-item wrap-input">
                            <img src="{{ asset('assets/icons/outline/flag.png') }}">
                            <select name="type_tour" class="select2">
                                
                                @foreach ($typeTours as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-search-item wrap-input">
                            <img src="{{ asset('assets/icons/outline/date.png') }}">
                            <input type="number" name="duration" placeholder="Duration" min="1">
                        </div>
                        <button class="form-search-item wrap-submit border" type="submit">
                            <img src="{{ asset('assets/icons/outline/search-2.png') }}">
                            <span>Search</span>
                        </button>
                    </form>
                </div>
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="wrap-features-1">
                        <div class="wrap-ft-1-top">
                            <img src="assets/images/Ellipse-13.png">
                            <span>Features</span>
                        </div>
                        <div class="wrap-ft-1-bot">
                            <span>200+ <p>tour</p></span>
                            <span>100+ <p>destination</p></span>
                            <span>8+ <p>type of tour</p></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- main-content --}}
@section('content')
    <div class="container wrap-content width-default">
        <div class="description">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="dcr-image">
                        <img src="assets/images/Rectangle-18.png" id="dcr-img-1">
                        <img src="assets/images/Rectangle-19.png" id="dcr-img-2">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="wrap-dcr-content">
                        <div class="dcr-title">
                            <p>With <span>NgaoduVietnam</span>, immerses you in majestic space and unique cultural
                                features</p>
                        </div>
                        <div class="dcr-content">
                            <img src="assets/icons/outline/water.png" alt="">
                            <div class="dst-ct-detail">
                                <div class="ct-detail-top">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Purus viverra nuQlla eget
                                    sed odio.
                                    Vulputate risus faucibus sem non, feugiat nec consequat, montes. Elementum
                                    scelerisque
                                    phasellus donec lectus ullamcorper faucibus. Malesuada et adipiscing molestie
                                    egestas leo
                                    ut.
                                </div>
                                <br>
                                <div class="ct-detail-bottom">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Purus viverra nuQlla eget
                                    sed odio.
                                    Vulputate risus faucibus sem non, feugiat nec consequat, montes.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-type-1">
            <div class="slide-header">
                <div class="sl-hd-title">
                    Discover fascinating destinations
                </div>
                <button>View all</button>
            </div>

            <div class="sl-content">
                <div class="owl-carousel owl-theme owl-loaded " id="slide-1">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            @foreach ($destinations as $destination)
                                @if($destination->status == 1)
                                    <div class="owl-item sl1-item">
                                        <img src="{{ asset('storage/upload/'.$destination->image) }}" alt="">
                                        <a class="location" href="#">{{ $destination->title }}</a>
                                        <p class="experience">24 experience</p>
                                    </div>
                                @endif
                            @endforeach                           
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="slide-type-2">
            <div class="slide-header">
                <div class="sl-hd-title">
                    Attractive tour and interesting experiences
                </div>
                <button>View all</button>
            </div>

            <div class="sl2-content">
                <div class="owl-carousel owl-theme owl-loaded sl-t2">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            @foreach ($tours->get() as $tour)
                                @if ($tour->trending == 1)
                                <div class="owl-item sl2-item">
                                    <div class="sl2-item-img">
                                        <img src="{{ asset('storage/upload/'.$tour->image) }}" alt="">
                                        <div class="rating">
                                            <img src="assets/icons/outline/star.png" alt="">
                                            <span>{{ $review->getInfoRating($tour->id)['avg'] }}</span>
                                        </div>
                                        <div class="flag">
                                            <img src="assets/icons/outline/tamgiac2.png" alt="">
                                        </div>
                                    </div>
                                    <div class="sl2-item-location">
                                        <img src="assets/icons/outline/shape.png" alt="">
                                        <span>{{ $tour->destination->title }}</span>
                                    </div>
                                    <div class="sl2-item-title">
                                        <a href="{{ route('tour_detail', $tour->slug) }}">{{ $tour->title }}</a>
                                    </div>
    
                                    <div class="sl2-item-info">
                                        <div class="sl2-if-time">
                                            <img src="assets/icons/outline/time.png" alt="">
                                            <span>{{ $tour->convertDuration($tour->duration) }}</span>
                                        </div>
                                        <div class="sl2-if-cost">from <strong>${{ $tour->price }}</strong></div>
                                    </div>
                                </div>
                                @endif
                            @endforeach     
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end slide 2 -->

        <div class="slide-type-2">
            <div class="slide-header">
                <div class="sl-hd-title">
                    Attractive tour and interesting experiences
                </div>
                <button>View all</button>
            </div>

            <div class="sl2-content">
                <div class="owl-carousel owl-theme owl-loaded sl-t2">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            @foreach ($tours->latest()->take(10)->get() as $tour)
                            <div class="owl-item sl2-item">
                                <div class="sl2-item-img">
                                    <img src="{{ asset('storage/upload/'.$tour->image) }}" alt="">
                                    <div class="rating">
                                        <img src="assets/icons/outline/star.png" alt="">
                                        <span>{{ $review->getInfoRating($tour->id)['avg'] }}</span>
                                    </div>
                                    <div class="flag">
                                        <img src="assets/icons/outline/tamgiac.png" alt="">
                                    </div>
                                </div>
                                <div class="sl2-item-location">
                                    <img src="assets/icons/outline/shape.png" alt="">
                                    <span>{{ $tour->destination->title }}</span>
                                </div>
                                <div class="sl2-item-title">
                                    <a href="{{ route('tour_detail', $tour->slug) }}">{{ $tour->title }}</a>
                                </div>

                                <div class="sl2-item-info">
                                    <div class="sl2-if-time">
                                        <img src="assets/icons/outline/time.png" alt="">
                                        <span>{{ $tour->convertDuration($tour->duration) }}</span>
                                    </div>
                                    <div class="sl2-if-cost">from <strong>${{ $tour->price }}</strong></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end slide 2 -->

        <!-- send email form -->
        <div class="row send-mail">
            
                <div class="col-12 col-sm-12 col-lg-8">
                    <div class="se-ct">Leave us an email, <br>to get <span>the latest deals</span></div>
                </div>
                <div class="col-12 col-sm-12 col-lg-4">
                    <form action="" method="post">
                        <div class="se-ct-input">
                            <div class="st-ct-ip-text">
                                <img src="assets/icons/outline/email.png" alt="">
                                <input type="text" placeholder="example@gmail.com">
                            </div>
                            <input type="button" value="Send">
                        </div>
                    </form>
                </div>
            
        </div>
    </div>
@endsection

{{-- import js --}}
@section('script')
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.js') }}"></script>
    <script src="{{ asset('vendor/owlcarousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/client/index.js') }}"></script>
    <script src="{{ asset('xtreme/assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('xtreme/dist/js/pages/forms/select2/select2.init.js') }}"></script>
@endsection