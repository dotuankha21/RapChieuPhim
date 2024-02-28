@extends('Home.Main')
@section('content')
    @php
        function formatDate($name)
        {
            $nameFormat = '';
            switch ($name) {
                case 'Monday':
                    $nameFormat = 'Thứ 2';
                    break;
                case 'Tuesday':
                    $nameFormat = 'Thứ 3';
                    break;
                case 'Wednesday':
                    $nameFormat = 'Thứ 4';
                    break;
                case 'Thursday':
                    $nameFormat = 'Thứ 5';
                    break;
                case 'Friday':
                    $nameFormat = 'Thứ 6';
                    break;
                case 'Saturday':
                    $nameFormat = 'Thứ 7';
                    break;
                case 'Sunday':
                    $nameFormat = 'Chủ Nhật';
                    break;
            }
            return $nameFormat;
        }
    @endphp
    <style>
        .hang-ghe {
            list-style: none;
        }

        .ghe {
            margin: 4px;
        }

        input[type="radio"] {
            display: none;
        }

        .day-button {
            margin-right: 5px;
        }

        .btn-group {
            display: flex;
            flex-direction: row;

        }

        .button-day {
            width: 70px;
            height: 70px;
            background: #fff;
            border: 1px solid rgb(141, 137, 137);
            border-radius: 4px;
            margin: 0 10px;
            display: flex;
            justify-content: center;
        }

        .button-day.active {
            border-color: rgba(255, 0, 0, 0.849);
        }

        .button-day.active .date_number {
            color: #fff;
            background-color: rgba(255, 0, 0, 0.849);
            border-color: rgba(255, 0, 0, 0.849);
        }

        .button-day.active .date_text {
            color: rgba(255, 0, 0, 0.849);
        }

        .date_number {
            width: 70px;
            height: 45px;
            font-weight: 600;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid rgb(141, 137, 137);
            background-color: rgb(226, 222, 222);
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            color: #000;
        }

        .date_text {
            width: 70px;
            height: 25px;
            font-size: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .time-group {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .time {
            font-size: 14px;
            color: #3CA0D5;
            width: 155px;
            height: 40px;
            border: 1px solid #3CA0D5;
            background: #FDFEFF;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            margin: 10px;
        }

        .time.active {
            background: #1373d3;
            color: white;
        }

        .start-time {
            font-size: 16px;
            font-weight: 700;
            margin-right: 5px;
        }

        .end-time {
            margin-left: 5px;
        }
    </style>
    <div class="hero user-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>Trang Đặt Vé</h1>
                        <ul class="breadcumb" style="margin-left: 0px;">
                            <li class="active"><a href="#">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span>Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-single">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="user-information" style="margin-top: 0px;">
                        <div class="user-img">
                            <a href="#"> <img src="{{ asset('assets/Content/Upload/Image/' . $phim[0]->ApPhich) }}"
                                    alt=""></a>
                            <center>
                                <h3 style="color: white">{{ $phim[0]->TenPhim }}</h3>
                            </center>
                            <ul>
                                <input type="hidden" value="{{ $phim[0]->DonGia }}" id="GiaPhim">
                                <input type="hidden" value="{{ $phim[0]->idPhim }}" id="idPhim">
                                <li class="active"><a>Năm Sản Xuất :{{ $phim[0]->NamSX }}</a></li>
                                <li><a>Thể Loại: {{ $phim[0]->TenTheLoai }}</a></li>
                                <li><a>Thời Lượng: {{ $phim[0]->ThoiLuong }}(phút)</a></li>
                            </ul>
                        </div>
                        <div class="user-fav" style="color: aliceblue">
                            <label for="" style="padding: 5px">
                                <h4>Thông tin vé</h4>
                            </label> <br>
                            <label for="" style="padding: 5px">Tên Người Đặt :
                                {{ Auth::user()->TenDangNhap }}</label><br>
                            <label for="" style="padding: 5px">Danh Sách Ghế : <br>
                            </label>
                            <div class="font-weight-bold text-dark" style="word-wrap: break-word;padding:5px;"><span
                                    id="thongtinve"></span></div>
                            <label for="" style="padding: 5px">Danh Sách Thức Ăn : <br>
                                <span id="thucandachon" class="thucandachon">

                                </span>
                            </label>
                            <br>
                            <label for="" style="color: red; padding:5px;">Tông Tiền: <span class="tongtien"
                                    id="tongtien"></span></label>


                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12" style="padding: 15px;">
                    <div class="form-style-1">
                        <div class="btn-group">
                            @for ($i = 0; $i < 7; $i++)
                                <input type="radio" id="day_{{ $i }}" name="days"
                                    class="custom-radio-button"
                                    value="{{ now()->addDays($i)->setTimezone('Asia/Ho_Chi_Minh')->format('Y-m-d') }}" />
                                @if ($i == 0)
                                    <label class="button-day active" for="day_{{ $i }}">
                                        <div class="flex flex-column">
                                            <div class="date_number active">
                                                {{ now()->addDays($i)->setTimezone('Asia/Ho_Chi_Minh')->format('d') }}
                                            </div>
                                            <div class="date_text">Hôm nay</div>
                                        </div>
                                    </label>
                                @else
                                    <label class="button-day" for="day_{{ $i }}">
                                        <div>
                                            <div class="date_number">
                                                {{ now()->addDays($i)->setTimezone('Asia/Ho_Chi_Minh')->format('d') }}
                                            </div>
                                            <div class="date_text">
                                                {{ formatDate(now()->addDays($i)->setTimezone('Asia/Ho_Chi_Minh')->format('l')) }}
                                            </div>
                                        </div>
                                    </label>
                                @endif
                            @endfor
                        </div>
                        <div class="time-group" id="time-group">
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="form-style-1 user-pro" action="#">
                        <form action="/Ve/Create" class="user" method="get">
                            <h4>Đặt Vé Xem Phim</h4>
                            <div class="row">
                                {{-- chỗ này là xuất ghế --}}
                                <div class="col-md-12 form-it" id="danhsachghe">

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 form-it" id="danhsachthucan">
                                    @foreach ($thucan as $item)
                                        <div class="col-md-3 thucan" style="background-color: white;margin: 5px;">
                                            <input type="checkbox" class="chonThucAn" data-mathucan="{{ $item->MATHUCAN }}"
                                                data-gia="{{ $item->DONGIA }}">
                                            <h5 class="tenthucan">{{ $item->TENTHUCAN }}</h5>
                                            <p style="color: red">{{ $item->DONGIA }} VNĐ</p>
                                            <input type="number" class="soluong" value="1"><br>
                                            <input type="hidden" class="mathucan" value="{{ $item->MATHUCAN }}">
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="row">
                                {{-- <div class="col-md-7 form-it" id="hienthithucan">
                            <div class="col-md-6">
                                <label for="">Chọn Đồ Ăn</label>
                                <select id="selectDrink">
                                    <option value="1">Nước Ngọt</option>
                                    <option value="2">Cà Phê</option>
                                    <!-- Thêm các lựa chọn khác nếu cần -->
                                </select>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <br>
                                <button id="addButton">Thêm</button>
                            </div>
                        </div> --}}

                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <input class="submit datve" type="submit" value="Đặt vé">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let selectedSeats = [];
        let gia = 0;
        let firstNumber = 0;
        let secondNumber = 0;

        function clickTime(e) {
            $('.time').removeClass('active');
            $(e).addClass('active');
            firstNumber = parseInt($(e).attr('idPhong'));
            secondNumber = parseInt($(e).attr('idLich'));
            $.ajax({
                url: '/phim/danhsachghe/' + firstNumber + '/' + secondNumber,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var gheContainer = document.getElementById('danhsachghe');
                    var m = data.soHangGhe; // Số hàng
                    var n = data.soGheMotHang; // Số ghế mỗi hàng
                    var dsghedaco = data.magheArray;
                    var dem = 0;

                    $("#danhsachghe").empty();
                    for (var i = 1; i <= m; i++) {
                        var hangGhe = document.createElement('li');
                        hangGhe.classList.add('hang-ghe');

                        for (var j = 1; j <= n; j++) {
                            var ghe = document.createElement('li');
                            var gheValue = "P" + firstNumber + "V" +
                                dem; // Giá trị hiển thị
                            ghe.innerHTML = gheValue;
                            ghe.value = gheValue; // Giá trị value

                            ghe.classList.add('ghe');

                            // Kiểm tra xem phần tử có nằm trong mảng dsghedaco hay không
                            if (dsghedaco.indexOf(gheValue) !== -1) {
                                ghe.classList.add('ghe-da-co');
                                ghe.disabled = true;
                            } else {
                                ghe.addEventListener('click', function() {
                                    var isSelected = this.classList.toggle(
                                        'ghe-chon');
                                    var giaghe = parseInt(document.getElementById(
                                        'GiaPhim').value);
                                    if (isSelected) {
                                        selectedSeats.push(this.innerHTML);
                                        gia += giaghe;
                                    } else {
                                        var index = selectedSeats.indexOf(this
                                            .innerHTML);
                                        if (index !== -1) {
                                            selectedSeats.splice(index, 1);
                                            gia -= giaghe;
                                        }
                                    }
                                    $('#thongtinve').text("");
                                    $('#thongtinve').text(selectedSeats);
                                    $('#tongtien').text("");
                                    $('#tongtien').text(gia);

                                });
                            }

                            hangGhe.appendChild(ghe);
                            dem++;
                        }
                        gheContainer.appendChild(hangGhe);
                    }
                }
            });

        }

        let danhSachThucAnDaChon = [];
        const tongTienElement = document.querySelector('.tongtien');

        function updateUI() {
            const thucAnDaChonElement = document.querySelector('.thucandachon');
            let tongTien = 0;

            thucAnDaChonElement.innerHTML = danhSachThucAnDaChon.map(item => {
                const itemTongTien = item.soLuong * item.gia;
                tongTien += itemTongTien;

                return `
                    <div>
                        <p>Tên thức ăn: ${item.tenThucAn}  X  ${item.soLuong}</p>
                    </div>
                `;
            }).join('');

            tongTienElement.textContent = tongTien + gia;

            const lisstdataoElement = document.querySelector('.lisstdatao');
            lisstdataoElement.innerHTML = danhSachThucAnDaChon.map(item => {
                const itemTongTien = item.soLuong * item.gia;

                return `
                    <div>
                        <p>Tên thức ăn: ${item.tenThucAn}  X  ${item.soLuong}</p>
                    </div>
                `;
            }).join('');
        }

        document.addEventListener('change', function(event) {
            if (event.target.classList.contains('chonThucAn')) {
                const selectedThucAn = event.target.closest('.thucan');
                const maThucAn = selectedThucAn.querySelector('.mathucan').value;
                const soLuong = selectedThucAn.querySelector('.soluong').value;
                const gia = selectedThucAn.querySelector('.chonThucAn').getAttribute('data-gia');
                const tenThucAn = selectedThucAn.querySelector('.tenthucan').innerText;
                if (event.target.checked) {
                    danhSachThucAnDaChon.push({
                        maThucAn,
                        tenThucAn,
                        soLuong,
                        gia: parseInt(gia)
                    });
                } else {
                    danhSachThucAnDaChon = danhSachThucAnDaChon.filter(item => item.maThucAn !==
                        maThucAn);
                }

                updateUI();
            }
        });

        document.addEventListener('input', function(event) {
            if (event.target.classList.contains('soluong')) {
                const selectedThucAn = event.target.closest('.thucan');
                const maThucAn = selectedThucAn.querySelector('.mathucan').value;
                const soLuong = event.target.value;

                const existingItemIndex = danhSachThucAnDaChon.findIndex(item => item.maThucAn ===
                    maThucAn);
                if (existingItemIndex !== -1) {
                    danhSachThucAnDaChon[existingItemIndex].soLuong = soLuong;
                }

                updateUI();
            }
        });
        //         $('.datve').on('click', function(event) {
        //     event.preventDefault();
        //     let danhSachJSON = encodeURIComponent(JSON.stringify(danhSachThucAnDaChon));

        //     // Chuyển đến trang mới với tham số truyền dữ liệu
        //     window.location.href = '/new-page?danhSach=' + danhSachJSON;
        // });
        $('.datve').on('click', function(event) {
            event.preventDefault();
            let danhSachJSON = encodeURIComponent(JSON.stringify(danhSachThucAnDaChon));
            $.ajax({
                url: '/phim/taohoadon/' + selectedSeats + '/' + secondNumber +
                    '/new-page?danhSach=' + danhSachJSON,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var mahoadon = data.msg;
                    console.log(mahoadon);
                    window.location.href = '/chitietdatve/' + mahoadon;
                }
            });
        });
        $('.custom-radio-button').on('change', function() {
            var selectedValue = $('input[name="days"]:checked').val();
            $('.button-day').removeClass('active');
            $(`label[for=${$(this).attr('id')}]`).addClass('active');
            getTimeMovie(selectedValue)

        });

        function getTimeMovie(date) {
            let idPhim = $('#idPhim').val();
            $.ajax({
                url: '/phim/lichchieu/' + idPhim + '/' + date,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    let danhmucs = data.xuatchieu;
                    let danhmucList = $('#time-group');
                    danhmucList.html("");
                    danhmucs.forEach(function(phim) {
                        danhmucList.append(`<div class="time" idPhong="${phim.idPhong}" idLich="${phim.idLichChieu}" onclick="clickTime(this)">
                            <div class="start-time">${phim.ThoiGianChieu.substr(0, 5)}</div>
                            <div>~</div>
                            <div class="end-time">${phim.ThoiGianKetThuc.substr(0, 5)}</div>
                        </div>`);
                    });
                }
            });
        }
        getTimeMovie($('#day_0').val());
    </script>
@endsection
