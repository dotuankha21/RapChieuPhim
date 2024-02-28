@extends('Admin.Home.index')
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
            margin-top: 20px;
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

        .ghe {
            min-width: 100px;
        }
    </style>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0">
                    <div class="welcome-text">
                        <center>
                            <h4> Trang Thêm Vé</h4>
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
                            <div class="form-validation">
                                <form id="create-ve-form" method="POST" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-9">
                                        <label class="col-md-6" for="idPhim">Chọn Phim</label>
                                        <div class="col-md-10">
                                            <select class="form-control" id="idPhim" name="idPhim">
                                                <option value="">---Chọn Phim---</option>
                                                @foreach ($phim as $item)
                                                    <option value="{{ $item->idPhim }}">{{ $item->TenPhim }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group col-9">
                                        <label class="col-md-3" for="idPhong">Chọn Phòng</label>
                                        <div class="col-md-10">
                                            <select class="form-control" id="idPhong" name="idPhong">
                                                <option value="">---Chọn Phòng---</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="d-flex flex-column col-12">
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
                                        <div class="time-group col-8 p-0" id="time-group">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group col-12 p-4">
                                        <label for="">Chọn Ghế</label>
                                        {{-- chỗ này là xuất ghế --}}
                                        <div class="col-md-8 form-it" id="danhsachghe"></div>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="">Ghế Đã Chọn</label>
                                        <div class="font-weight-bold text-dark">Ghế : <span id="thongtinve"></span></div>
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="col-md-6 p-0" for="thucAn">Đồ Ăn</label>
                                        <div class="d-flex flex-row p-0">
                                            <select class="form-control col-8" id="thucAn" name="thucAn">
                                                <option value="">---Chọn Đồ Ăn---</option>
                                                @foreach ($thucAn as $item)
                                                    <option value="{{ $item->MATHUCAN }}">{{ $item->TENTHUCAN }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary ml-4"
                                                onclick="addThucAn()">Thêm</button>
                                        </div>
                                        <div class="d-flex flex-row justify-content-between p-0 col-8">
                                            <table class="table text-dark">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Tên món</th>
                                                        <th scope="col">Giá</th>
                                                        <th scope="col">Số lượng</th>
                                                        <th scope="col">Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bodyTable">
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="col-12 bg-light p-2">
                                        <div class="col-12 row">
                                            <div class="col-10"><label>Tổng tiền</label></div>
                                            <div class="col-2"><label id="tongTien"></label></div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-4 mr-4">
                                            <button type="submit" class="btn btn-primary">Tạo hóa đơn</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const doAn = {!! json_encode($thucAn) !!};
    </script>
    <script src="{{ asset('assets/js/adminVe.js') }}"></script>
@endsection
