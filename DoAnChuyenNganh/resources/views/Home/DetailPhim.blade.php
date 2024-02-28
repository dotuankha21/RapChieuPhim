@extends('Home.Main')
@section('content')


<div class="hero mv-single-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h1> movie listing - list</h1>
                <ul class="breadcumb">
                    <li class="active"><a href="#">Home</a></li>
                    <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
<div class="page-single movie-single movie_single">

    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="movie-img sticky-sb">
                    <img src="{{ asset('assets/Content/Upload/Image/' .$phim[0]->ApPhich) }}" alt="">
                    <div class="movie-btn">
                        <div class="btn-transform transform-vertical red">
                            <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Xem Trailer</a></div>
                            <div><a href="{{ $phim[0]->Trailerr }}" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
                        </div>
                        <div class="btn-transform transform-vertical">
                            @if (Auth::user())
                                <div><a href="{{ route('datve',['id'=>$phim[0]->idPhim]) }}" class="item item-1 yellowbtn"> <i class="ion-card"></i>Đặt Vé</a></div>
                                <div><a href="{{ route('datve',['id'=>$phim[0]->idPhim]) }}" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
                            @else
                                <div><a href="{{ route('errorpage') }}" class="item item-1 yellowbtn"> <i class="ion-card"></i>Đặt Vé</a></div>
                                <div><a href="{{ route('errorpage') }}" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
                            @endif
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="movie-single-ct main-content">
                    <h1 class="bd-hd">{{ $phim[0]->TenPhim }} <br> <span>{{ $phim[0]->NamSX }}</span></h1>
                    <div class="social-btn">
                        <a href="#" class="parent-btn"><i class="ion-heart"></i>Thêm Vào Dành sách yêu thích</a>
                        <div class="hover-bnt">
                            <a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>Chịa sẻ</a>
                            <div class="hvr-item">
                                <a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
                                <a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
                                <a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
                                <a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="movie-rate">
                        <div class="rate">
                            <i class="ion-android-star"></i>
                            <p>
                                <span>8.1</span> /10<br>
                                <span class="rv">56 Reviews</span>
                            </p>
                        </div>
                        <div class="rate-star">
                            <p>Đánh Giá</p>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star-outline"></i>
                        </div>
                    </div>
                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv">
                                <li class="active"><a href="#overview">Mô Tả</a></li>
                                <li><a href="#reviews"> Đánh Giá</a></li>
                                <li><a href="#cast">  Cast & Crew </a></li>
                                <li><a href="#media"> Media</a></li>
                                <li><a href="#moviesrelated"> Related Movies</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="overview" class="tab active">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p>{{ $phim[0]->MoTa }}</p>
                                            
                                            <!-- movie user review -->
                                           
                                        </div>
                                       
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection