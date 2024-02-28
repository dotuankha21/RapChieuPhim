@extends('Admin.Home.index')
@section('content')
    <style>
        td {
            color: black;
            font-weight: bold;
        }
    </style>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0">
                    <div class="welcome-text">
                        <center>
                            <h4> Trang Thêm Lịch Chiếu</h4>
                        </center>

                    </div>
                </div>

            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="form-validation">
                                <form id="create-phim-form" method="GET" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-6" for="">Chọn phim</label>
                                        <div class="col-md-6">
                                            <select class="form-control text-box single-line" id="idPhim" name="idPhim">
                                                <option value="0">Chọn phim</option>
                                                @foreach ($phim as $item)
                                                    <option value="{{ $item->idPhim }}">{{ $item->TenPhim }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-12 row">
                                            <div class="col-6">
                                                <label>Ngày bắt đầu </label>
                                                <input class="form-control text-box single-line" type="datetime-local"
                                                    id="startDate" name="startDate">
                                            </div>
                                            <div class="col-6">
                                                <label>Giờ bắt đầu </label>
                                                <input class="form-control text-box single-line" type="text"
                                                    id="startTime" name="startTime">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                    <label class="col-md-2" for="TenTheLoai">Thông Tin Bộ Phim</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="" width="162" height="240" alt="">
                                            </div>
                                            <div class="col-md-3" >
                                                <label for="">Tên Phim</label><br>
                                                <label for="">Thời Lượng</label><br>
                                                <label for="">Ngày khởi Chiếu</label><br>
                                                <label for="">Thể Loại Phim</label><br>
                                                <label for="">Định Dạng Phim</label>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="container">
                                                    <center><h3>Danh Sách Lịch Chiếu Phim : <span style="color: red">Bảy Viên Ngọc Rồng</span> </h3></center> <br>
                                                    <label for="">Ngày Chiếu : 2023-12-22  Giờ Chiếu : 12:00->14:00 Phòng Chiếu : PC01</label>
                                                    <label for="">Ngày Chiếu : 2023-12-22  Giờ Chiếu : 12:00->14:00 Phòng Chiếu : PC01</label>
                                                    <label for="">Ngày Chiếu : 2023-12-22  Giờ Chiếu : 12:00->14:00 Phòng Chiếu : PC01</label>
                                                    <label for="">Ngày Chiếu : 2023-12-22  Giờ Chiếu : 12:00->14:00 Phòng Chiếu : PC01</label>
                                                    <label for="">Ngày Chiếu : 2023-12-22  Giờ Chiếu : 12:00->14:00 Phòng Chiếu : PC01</label>
                                                    <label for="">Ngày Chiếu : 2023-12-22  Giờ Chiếu : 12:00->14:00 Phòng Chiếu : PC01</label>
                                                    <label for="">Ngày Chiếu : 2023-12-22  Giờ Chiếu : 12:00->14:00 Phòng Chiếu : PC01</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> --}}

                                    <div class="form-group">
                                        <label class="col-md-6" for="">Chọn phòng chiếu</label>
                                        <div class="col-md-10">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Mã Phòng </th>
                                                        <th scope="col">Tên Phòng</th>
                                                        <th scope="col">Chọn</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="phim-list">
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6" for="">Lịch đã chọn</label>
                                        <div class="col-md-10">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Tên phim </th>
                                                        <th scope="col">Tên phòng </th>
                                                        <th scope="col">Thời gian</th>
                                                        <th scope="col">Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="lich-chon">
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="d-flex mt-3 justify-content-center">
                                        <button class="btn btn-primary add" id="save-lich" type="button">Lưu lịch
                                            chiếu</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let idphong; // Biến để lưu trữ id phòng đã chọn
            let dataMovieMaster = [];
            let dataLichSave = [];
            // Lắng nghe sự kiện khi click vào một thời gian chiếu khác
            $("#startDate").flatpickr({
                dateFormat: "Y-m-d",
                minDate: "today",
                defaultDate: "today",
                onChange: function(selectedDates, dateStr, instance) {
                    changeTime();

                },
            });

            // Initialize Flatpickr for time input
            $("#startTime").flatpickr({
                enableTime: true,
                noCalendar: true,
                altInput: true,
                altFormat: "H:i",
                dateFormat: "H:i",
                time_24hr: true,
                defaultDate: "today",
                onChange: function(selectedDates, dateStr, instance) {
                    changeTime();
                },
            });
            // Lắng nghe sự kiện khi chọn một phim khác
            document.getElementById('idPhim').addEventListener('change', function() {
                changeTime();
            });

            function changeTime() {
                let ngayBatDau = $('#startDate').val();
                let gioBatDau = $('#startTime').val();
                let selectedPhimId = $('#idPhim').val();
                // Sử dụng AJAX để lấy danh sách phòng chiếu theo thời gian và phim đã chọn
                if (ngayBatDau && gioBatDau && selectedPhimId) {
                    $.ajax({
                        url: '/api/getdanhsachphongtheokhoangtrong/' + `${ngayBatDau} ${gioBatDau}` + '/' +
                            selectedPhimId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            dataMovieMaster = data.phims
                            let danhmucs = data.phongchieu;
                            let danhmucList = $('#phim-list');
                            danhmucList.empty();
                            danhmucs.forEach(function(phim) {
                                danhmucList.append(`<tr>
                                            <td>${phim.idPhongChieu}</td>
                                            <td>${phim.TenPhong}</td>
                                            <td><a href="" data-id="${phim.idPhongChieu}" data-toggle="modal" data-target="#updateModal"
                                                    data-ten="${phim.TenPhong}" class="chon">Chọn</a></td>
                                        </tr>`);
                            });
                        },
                        error: (r) => {
                            console.log(r)
                        }
                    });
                }

            }
            // Lắng nghe sự kiện khi click vào một phòng chiếu
            $(document).on('click', 'a.chon', function(e) {
                e.preventDefault();
                $('a.chon').removeClass('chosen');
                $(this).addClass('chosen');
                idphong = $(this).attr('data-id');
                let ngayBatDau = $('#startDate').val();
                let gioBatDau = $('#startTime').val();
                checkLichDuplicate($(this).attr('data-ten'), {
                    'idPhim': dataMovieMaster.idPhim,
                    'idPhong': idphong,
                    'ngayBatDau': ngayBatDau,
                    'gioBatDau': gioBatDau,
                });
            });
            $(document).on('click', 'a.xoa-lich', function(e) {
                e.preventDefault();
                data = {
                    'idPhim': $(this).attr('data-phim'),
                    'idPhong': $(this).attr('data-phong'),
                    'ngayBatDau': $(this).attr('data-ngayBatDau'),
                    'gioBatDau': $(this).attr('data-gioBatDau'),
                }
                let indexOfObject = dataLichSave.findIndex(item => JSON.stringify(item) === JSON.stringify(
                    data));
                dataLichSave.splice(indexOfObject, 1);
                $(this).closest('tr').remove();
            });

            function checkLichDuplicate(tenPhong, data) {
                let indexOfObject = dataLichSave.findIndex(item => JSON.stringify(item) === JSON.stringify(
                    data));
                let flagExits = indexOfObject === -1;
                if (flagExits) {
                    dataLichSave.push(data);
                    let danhmucList = $('#lich-chon');
                    danhmucList.append(`<tr>
                    <td>${dataMovieMaster?.TenPhim}</td>
                    <td>${tenPhong}</td>
                    <td>${data.ngayBatDau} ${data.gioBatDau}</td>
                    <td><a href=""data-toggle="modal" data-target="#updateModal"
                        data-phim="${data?.idPhim}"  data-phong=${data.idphong}
                        data-ngayBatDau=${data.ngayBatDau} data-gioBatDau=${data.gioBatDau}
                        class="xoa-lich btn btn-danger">Xóa</a></td>
                    </tr>`);
                }
            }

            // Lắng nghe sự kiện khi click vào nút "Thêm"
            $(document).on('click', '#save-lich', function(event) {
                if (dataLichSave.length > 0) {
                    let formData = new FormData();
                    formData.append('data', JSON.stringify(dataLichSave));
                    $.ajax({
                        url: "{{ route('create_lichchieu') }}",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        processData: false, // Ngăn xử lý dữ liệu gửi đi
                        contentType: false, // Không thiết lập kiểu dữ liệu
                        success: function(res) {
                            alert(res.message);
                            window.location.href = '/lichchieu';
                            location.replace('/lichchieu');
                        },
                    });
                }
            });
        });
    </script>
@endsection
