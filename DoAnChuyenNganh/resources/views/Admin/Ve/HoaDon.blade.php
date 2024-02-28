@extends('Admin.Home.index')
@section('content')
    <style type="text/css">
        table tr td {
            font-size: 14px;
            color: #0f6ab4;
        }
        table tr th {
            font-size: 16px;
        }
    </style>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0">
                    <div class="welcome-text">
                        <center>
                            <h4> Thêm Hóa Đơn Thành Công</h4>
                        </center>

                    </div>
                </div>

            </div>
            <div class="errorMessage">
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation flex flex-column align-items-center"
                                style="display:flex !important;">
                                <table class="table text-dark border" style="width:800px">
                                    <thead>
                                        <tr class="text-center">
                                            <th colspan="2" class="text-white" style="background-color: gray;">Chi Tiết
                                                Hóa Đơn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Mã hóa đơn</th>
                                            <td>{{ $hoaDon->MAHOADON }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Người tạo</th>
                                            <td>{{ $hoaDon->nhanVien->HoTen }}</td>
                                        </tr>
                                        @foreach ($hoaDon->chiTietVe ?? [] as $ctve)
                                            @if ($loop->first)
                                                <tr>
                                                    <th scope="row">Tên phim</th>
                                                    <td>{{ $ctve->ve->lichChieu->phim->TenPhim }}</td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">Tên phòng</th>
                                                    <td>{{ $ctve->ve->lichChieu->phong->TenPhong }}</td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">Thời gian chiếu</th>
                                                    <td>{{ date_format(date_create($ctve->ve->lichChieu->ThoiGianChieu), 'H:i d-m-Y') }}
                                                        ->
                                                        {{ date_format(date_create($ctve->ve->lichChieu->ThoiGianKetThuc), 'H:i d-m-Y') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Giá vé</th>
                                                    <td>{{ number_format($ctve->GiaVe, 0, '', '.') }} VND</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <th scope="row">Mã ghê</th>

                                            <td>
                                                @foreach ($hoaDon->chiTietVe ?? [] as $ctve)
                                                    {{ $ctve->ve->MaGheNgoi }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>

                                        @foreach ($hoaDon->chiTietThucAn ?? [] as $ctta)
                                            <tr>
                                                <th scope="row">Đồ ăn</th>
                                                <td>{{ $ctta->thucAn->TENTHUCAN }} - ({{ $ctta->SOLUONG }} x
                                                    {{ number_format($ctta->thucAn->DONGIA, 0, '', '.') }} VND) </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th scope="row">Tổng số lượng</th>
                                            <td>{{ $hoaDon->TONGSL }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Thời gian tạo</th>
                                            <td>{{ date_format(date_create($hoaDon->NGAYTAO), 'H:i d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ghi chú</th>
                                            <td>{{ $hoaDon->GHICHU }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tổng tiền</th>
                                            <td class="text-danger font-weight-bold">
                                                {{ number_format($hoaDon->TONGTIEN, 0, '', '.') }} VND</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <a href="/admin/dat-ve" class="btn btn-primary mt-4">Trở về trang chủ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
