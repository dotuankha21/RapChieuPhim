@extends('Home.Main')
@section('content')
{{-- {{ dd(auth()->user()) }} --}}
{{-- {{ dd($user) }} --}}
<div class="slider movie-items">
    <div class="container">
        <div class="row">
            <div class="social-link">
                <p>Follow us: </p>
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-googleplus"></i></a>
                <a href="#"><i class="ion-social-youtube"></i></a>
            </div>
            <div class="slick-multiItemSlider" id="phims">
                
              
                @foreach ($phims as $item)
                    <div class="movie-item">
                        <div class="mv-img">
                            <a href=""><img src="{{ asset('assets/Content/Upload/Image/' .$item->ApPhich) }}" alt="" width="285px" height="437px"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="blue"><a href="">Thời Lượng: {{ $item->ThoiLuong }} Phút</a></span>
                            </div>
                            <h6><a href="{{ route('detailphim',['id'=>$item->idPhim]) }}">{{ $item->TenPhim }}</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="buster-light">
    <div class="movie-items">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-12">
                    <div class="title-hd">
                        <h2>Phim  Đang Chiếu</h2>
                        <a href="{{ route('phimdangchieu') }}" class="viewall">Xem Tất Cả<i class="ion-ios-arrow-right"></i></a>
                    </div>

                    <div class="tabs">
                        <ul class="tab-links theloai">
                            @foreach ($theloai as $item)
                                @if ($item->idTheLoai===3)
                                    <li class="active"><a href="#tab{{ $item->idTheLoai }}">{{ $item->TenTheLoai }}</a></li>
                                @else
                                    <li class=""><a href="#tab{{ $item->idTheLoai }}">{{ $item->TenTheLoai }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                        <br>
                        <div class="tab-content noidung">
                            @foreach ($theloai as $item)
                                @if ($item->idTheLoai===3)
                                    <div id="tab{{$item->idTheLoai}}" class="tab active">
                                        <div class="row">
                                            <div class="slick-multiItem">
                                                        @foreach ($phimdangchieu as $p)
                                                            @if ($p->idTheLoai==$item->idTheLoai)
                                                                <div class="slide-it">
                                                                    <div class="movie-item">
                                                                        <div class="mv-img">
                                                                            <img src="{{ asset('assets/Content/Upload/Image/' .$p->ApPhich) }}" alt="" width="185" height="250">
                                                                        </div>
                                                                        <div class="hvr-inner">
                                                                            <a href="{{ route('detailphim',['id'=>$p->idPhim]) }}">Chi Tiết<i class="ion-android-arrow-dropright"></i> </a>
                                                                        </div>
                                                                        <div class="title-in">
                                                                            <h6><a href="">lego</a></h6>
                                                                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @else
                                <div id="tab{{$item->idTheLoai}}" class="tab">
                                    <div class="row">
                                        <div class="slick-multiItem">
                                                    @foreach ($phimdangchieu as $p)
                                                        @if ($p->idTheLoai==$item->idTheLoai)
                                                            <div class="slide-it">
                                                                <div class="movie-item">
                                                                    <div class="mv-img">
                                                                        <img src="{{ asset('assets/Content/Upload/Image/' .$p->ApPhich) }}" alt="" width="185" height="250">
                                                                    </div>
                                                                    <div class="hvr-inner">
                                                                        <a href="{{ route('detailphim',['id'=>$p->idPhim]) }}">Chi Tiết<i class="ion-android-arrow-dropright"></i> </a>
                                                                    </div>
                                                                    <div class="title-in">
                                                                        <h6><a href="">lego</a></h6>
                                                                        <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                    <div class="title-hd">
                        <h2>PHIM SẮP CHIẾU</h2>
                        <a href="{{ route('phimsapchieu') }}" class="viewall">Xem Tất Cả <i class="ion-ios-arrow-right"></i></a>
                    </div>
                    <div class="tabs">
                        <ul class="tab-links-2">
                            @foreach ($theloai as $item)
                                @if ($item->idTheLoai===3)
                                    <li class="active"><a href="#tabsc{{ $item->idTheLoai }}">{{ $item->TenTheLoai }}</a></li>
                                @else
                                    <li class=""><a href="#tabsc{{ $item->idTheLoai }}">{{ $item->TenTheLoai }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                        <br>
                        <div class="tab-content">
                            @foreach ($theloai as $item)
                                @if ($item->idTheLoai===3)
                                    <div id="tabsc{{$item->idTheLoai}}" class="tab active">
                                        <div class="row">
                                            <div class="slick-multiItem">
                                                        @foreach ($phimsapchieu as $p)
                                                            @if ($p->idTheLoai==$item->idTheLoai)
                                                                <div class="slide-it">
                                                                    <div class="movie-item">
                                                                        <div class="mv-img">
                                                                            <img src="{{ asset('assets/Content/Upload/Image/' .$p->ApPhich) }}" alt="" width="185" height="250">
                                                                        </div>
                                                                        <div class="hvr-inner">
                                                                            <a href="{{ route('detailphim',['id'=>$p->idPhim]) }}">Chi Tiết<i class="ion-android-arrow-dropright"></i> </a>
                                                                        </div>
                                                                        <div class="title-in">
                                                                            <h6><a href="">lego</a></h6>
                                                                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div id="tabsc{{$item->idTheLoai}}" class="tab">
                                        <div class="row">
                                            <div class="slick-multiItem">
                                                        @foreach ($phimsapchieu as $p)
                                                            @if ($p->idTheLoai==$item->idTheLoai)
                                                                <div class="slide-it">
                                                                    <div class="movie-item">
                                                                        <div class="mv-img">
                                                                            <img src="{{ asset('assets/Content/Upload/Image/' .$p->ApPhich) }}" alt="" width="185" height="250">
                                                                        </div>
                                                                        <div class="hvr-inner">
                                                                            <a href="{{ route('detailphim',['id'=>$p->idPhim]) }}">Chi Tiết<i class="ion-android-arrow-dropright"></i> </a>
                                                                        </div>
                                                                        <div class="title-in">
                                                                            <h6><a href="">lego</a></h6>
                                                                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>


@endsection
