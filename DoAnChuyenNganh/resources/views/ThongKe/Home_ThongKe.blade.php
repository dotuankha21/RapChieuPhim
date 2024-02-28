@extends('Admin.Home.index')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0">
                    <div class="welcome-text">
                        <center>
                            <h4>Trang Thống Kê</h4>
                        </center>

                    </div>
                </div>

            </div>
            <!-- row -->
            <div class="row col-12 mt-3 mb-3">
                <div class="card p-0 d-flex flex-row m-2" style="width:270px; border-radius: 10px;">
                    <div style="padding:15px;" class="col-8">
                        <div class="text-dark text-uppercase" style="font-size: 12px;">Doanh thu trong ngày</div>
                        <div class="text-dark font-weight-bold" style="font-size: 16px;">
                            {{ number_format($doanhThuTrongNgay, 0, '', '.') }} Vnđ
                        </div>
                        <div style="color:rgb(6, 200, 190);">{{ now()->format('d-m-Y') }}</div>
                    </div>
                    <div class="d-flex justify-content-end pt-2 col-4">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                <title>cash-check</title>
                                <path
                                    d="M3 6V18H13.32C13.1 17.33 13 16.66 13 16H7C7 14.9 6.11 14 5 14V10C6.11 10 7 9.11 7 8H17C17 9.11 17.9 10 19 10V10.06C19.67 10.06 20.34 10.18 21 10.4V6H3M12 9C10.3 9.03 9 10.3 9 12C9 13.7 10.3 14.94 12 15C12.38 15 12.77 14.92 13.14 14.77C13.41 13.67 13.86 12.63 14.97 11.61C14.85 10.28 13.59 8.97 12 9M21.63 12.27L17.76 16.17L16.41 14.8L15 16.22L17.75 19L23.03 13.68L21.63 12.27Z" />
                            </svg></i>

                    </div>
                </div>
                <div class="card p-0 d-flex flex-row m-2" style="width:270px; border-radius: 10px;">
                    <div style="padding:15px;" class="col-8">
                        <div class="text-dark text-uppercase" style="font-size: 12px;">Tổng số nhân viên</div>
                        <div class="text-dark font-weight-bold" style="font-size: 16px;">
                            {{ count($nhanvien) }}
                        </div>
                        <div style="color:rgb(6, 200, 190);">{{ now()->format('d-m-Y') }}</div>
                    </div>
                    <div class="d-flex justify-content-end pt-2 col-4">
                        <i class="mdi mdi-account text-dark" style="font-size:25px;"></i>
                    </div>
                </div>
                <div class="card p-0 d-flex flex-row m-2" style="width:270px; border-radius: 10px;">
                    <div style="padding:15px;" class="col-8">
                        <div class="text-dark text-uppercase" style="font-size: 12px;">Tổng số phim</div>
                        <div class="text-dark font-weight-bold" style="font-size: 16px;">
                            {{ count($phim) }}
                        </div>
                        <div style="color:rgb(6, 200, 190);">{{ now()->format('d-m-Y') }}</div>
                    </div>
                    <div class="d-flex justify-content-end pt-2 col-4">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30">
                                <title>movie-check</title>
                                <path
                                    d="M13 19C13 19.34 13.04 19.67 13.09 20H4C2.9 20 2 19.11 2 18V6C2 4.89 2.9 4 4 4H5L7 8H10L8 4H10L12 8H15L13 4H15L17 8H20L18 4H22V13.81C21.12 13.3 20.1 13 19 13C15.69 13 13 15.69 13 19M21.34 15.84L17.75 19.43L16.16 17.84L15 19L17.75 22L22.5 17.25L21.34 15.84Z" />
                            </svg>
                        </i>

                    </div>
                </div>
                <div class="card p-0 d-flex flex-row m-2" style="width:270px; border-radius: 10px;">
                    <div style="padding:15px;" class="col-9">
                        <div class="text-dark text-uppercase" style="font-size: 12px;">Tổng doanh thu</div>
                        <div class="text-dark font-weight-bold" style="font-size: 16px;">
                            {{ number_format($doanhThuTong, 0, '', '.') }} Vnđ
                        </div>
                        <div style="color:red;">{{ date('d-m-Y', strtotime($ngayBatDau)) }} | {{ now()->format('d-m-Y') }}
                        </div>
                    </div>
                    <div class="d-flex justify-content-end pt-2 col-3">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                <title>cash-check</title>
                                <path
                                    d="M3 6V18H13.32C13.1 17.33 13 16.66 13 16H7C7 14.9 6.11 14 5 14V10C6.11 10 7 9.11 7 8H17C17 9.11 17.9 10 19 10V10.06C19.67 10.06 20.34 10.18 21 10.4V6H3M12 9C10.3 9.03 9 10.3 9 12C9 13.7 10.3 14.94 12 15C12.38 15 12.77 14.92 13.14 14.77C13.41 13.67 13.86 12.63 14.97 11.61C14.85 10.28 13.59 8.97 12 9M21.63 12.27L17.76 16.17L16.41 14.8L15 16.22L17.75 19L23.03 13.68L21.63 12.27Z" />
                            </svg></i>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h3>Top doanh thu</h3>
                    <div class="d-flex justify-content-between">
                        @foreach ($phimhot as $item)
                            <div class="form-group m-2" style="background-color: cadetblue">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="{{ asset('assets/Image/' . $item->ApPhich) }}" width="220"
                                                height="300" alt="">
                                            <br>
                                            <div class="text-center p-1">
                                                <label for="">{{ $item->TenPhim }}</label>
                                            </div>
                                            <label for="">Số Vé Đã Bán: {{ $item->SoLuongVeBan }}</label>
                                            <br>
                                            <label for="">Tổng Doanh Thu:
                                                {{ number_format($item->TongTienBanDuoc, 0, '', '.') }} đ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="row col-12">
                            <div class="form-group col-3">
                                <label class="" for="TenPhim">Chọn Phim</label>
                                <div class="">
                                    <select class="form-control" id="idPhim" name="idPhim">
                                        <option value="0">______Chọn Phim______</option>
                                        @foreach ($phim as $item)
                                            <option value="{{ $item->idPhim }}">{{ $item->TenPhim }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label class="" for="TenPhim">Chọn Nhân Viên</label>
                                <div class="">
                                    <select class="form-control" id="idNhanVien" name="idNhanVien">
                                        <option value="0">___Chọn Nhân Viên___</option>
                                        @foreach ($nhanvien as $item)
                                            <option value="{{ $item->idNhanVien }}">{{ $item->HoTen }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label class="" for="TenPhim">Ngày Bắt Đầu</label>
                                <div class="">
                                    <input class="form-control text-box single-line" type="date" id="NgayBatDau"
                                        value="" name="NgayBatDau" placeholder="Ngày Bắt Đầu">

                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label class="" for="TenPhim">Ngày Kết Thúc</label>
                                <div class="">
                                    <input class="form-control text-box single-line" type="date" id="NgayKetThuc"
                                        value="" name="NgayKetThuc" placeholder="Ngày Kết Thúc">

                                </div>
                            </div>
                        </div>
                        <hr style="color: black;">
                        <h3 style="color: red">Tổng Doanh Thu: <span id="tongtien"></span></h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTables-thongke" class="table" style="width: 1360px;color:black;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Mã Hóa Đơn</th>
                                            <th>Mã Khách Hàng</th>
                                            <th>Mã Nhân Viên</th>
                                            <th>Ngày Tạo</th>
                                            <th>Tổng Số Lượng</th>
                                            <th>Tổng Tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            function clearTableData() {
                $('#dataTables-thongke tbody').empty();
            }

            function clearTongtien() {
                $('#tongtien').empty();
            }
            document.getElementById('idPhim').addEventListener('change', function() {
                let maphim = this.value;
                clearTableData();
                clearTongtien();
                $.ajax({
                    url: 'api/phim/layhoadontheophim/' + maphim,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var table = $('#dataTables-thongke tbody');
                        data.hoadon.forEach(function(item) {

                            table.append('<tr><td>' + item.MAHOADON + '</td><td>' + item
                                .MAKHACHHANG + '</td><td>' + item.MANHANVIEN +
                                '</td><td>' + item.NGAYTAO + '</td><td>' + item
                                .TONGSL + '</td><td>' + item.TONGTIEN + '</td></tr>'
                            );
                            // Thêm các cột dữ liệu khác tương tự như trên (tùy thuộc vào cấu trúc dữ liệu trả về)
                        });
                        var tongtien = $('#tongtien');
                        tongtien.append(data.tongtien);
                    }
                });
            });
            document.getElementById('idNhanVien').addEventListener('change', function() {
                let maphim = this.value;
                clearTableData();
                clearTongtien();
                $.ajax({
                    url: 'api/phim/layhoadontheonhanvien/' + maphim,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var table = $('#dataTables-thongke tbody');
                        data.hoadon.forEach(function(item) {

                            table.append('<tr><td>' + item.MAHOADON + '</td><td>' + item
                                .MAKHACHHANG + '</td><td>' + item.MANHANVIEN +
                                '</td><td>' + item.NGAYTAO + '</td><td>' + item
                                .TONGSL + '</td><td>' + item.TONGTIEN + '</td></tr>'
                            );
                            // Thêm các cột dữ liệu khác tương tự như trên (tùy thuộc vào cấu trúc dữ liệu trả về)
                        });
                        var tongtien = $('#tongtien');
                        console.log(data.tongtien);
                        tongtien.append(data.tongtien.TotalAmount);
                    }
                });
            });




            var currentDate = new Date();

            var firstDayOfMonth = new Date('2023-12-01');
            var formattedFirstDay = firstDayOfMonth.toISOString().slice(0, 10);

            // Lấy ngày hiện tại
            var formattedCurrentDate = currentDate.toISOString().slice(0, 10);

            // Gán giá trị cho các thẻ input
            document.getElementById('NgayBatDau').value = formattedFirstDay;
            document.getElementById('NgayKetThuc').value = formattedCurrentDate;

            getdata();

            document.getElementById('NgayKetThuc').addEventListener('change', function() {
                let tgbd = document.getElementById('NgayBatDau').value;
                let tkt = this.value;
                clearTableData();
                clearTongtien();
                $.ajax({
                    url: 'api/phim/layhoadontheokhoangthoigian/' + tgbd + '/' + tkt,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var table = $('#dataTables-thongke tbody');
                        data.hoadon.forEach(function(item) {

                            table.append('<tr><td>' + item.MAHOADON + '</td><td>' + item
                                .MAKHACHHANG + '</td><td>' + item.MANHANVIEN +
                                '</td><td>' + item.NGAYTAO + '</td><td>' + item
                                .TONGSL + '</td><td>' + item.TONGTIEN + '</td></tr>'
                            );
                            // Thêm các cột dữ liệu khác tương tự như trên (tùy thuộc vào cấu trúc dữ liệu trả về)
                        });
                        var tongtien = $('#tongtien');
                        console.log(data.tongtien);
                        tongtien.append(data.tongtien);
                    }
                });
            });
            document.getElementById('NgayBatDau').addEventListener('change', function() {
                let tkt = document.getElementById('NgayKetThuc').value;
                let tgbd = this.value;
                clearTableData();
                clearTongtien();
                $.ajax({
                    url: 'api/phim/layhoadontheokhoangthoigian/' + tgbd + '/' + tkt,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var table = $('#dataTables-thongke tbody');
                        data.hoadon.forEach(function(item) {

                            table.append('<tr><td>' + item.MAHOADON + '</td><td>' + item
                                .MAKHACHHANG + '</td><td>' + item.MANHANVIEN +
                                '</td><td>' + item.NGAYTAO + '</td><td>' + item
                                .TONGSL + '</td><td>' + item.TONGTIEN + '</td></tr>'
                            );
                            // Thêm các cột dữ liệu khác tương tự như trên (tùy thuộc vào cấu trúc dữ liệu trả về)
                        });
                        var tongtien = $('#tongtien');
                        console.log(data.tongtien);
                        tongtien.append(data.tongtien);
                    }
                });
            });

            function getdata() {
                clearTableData();
                clearTongtien();
                let tgbd = document.getElementById('NgayBatDau').value;
                let tkt = document.getElementById('NgayKetThuc').value;
                $.ajax({
                    url: 'api/phim/layhoadontheokhoangthoigian/' + tgbd + '/' + tkt,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var table = $('#dataTables-thongke tbody');
                        data.hoadon.forEach(function(item) {

                            table.append('<tr><td>' + item.MAHOADON + '</td><td>' + item
                                .MAKHACHHANG + '</td><td>' + item.MANHANVIEN + '</td><td>' +
                                item.NGAYTAO + '</td><td>' + item.TONGSL + '</td><td>' +
                                item.TONGTIEN + '</td></tr>');
                            // Thêm các cột dữ liệu khác tương tự như trên (tùy thuộc vào cấu trúc dữ liệu trả về)
                        });
                        var tongtien = $('#tongtien');
                        console.log(data.tongtien);
                        tongtien.append(data.tongtien);
                    }
                });
            }

        });
    </script>
@endsection
