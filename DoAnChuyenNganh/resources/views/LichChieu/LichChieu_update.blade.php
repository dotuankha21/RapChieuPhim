@extends('Admin.Home.index')
@section('content')

<style>
    td{
        color: black;
        font-weight: bold;
    }

</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <center><h4> Trang Sửa Lịch Chiếu</h4></center>
                  
                </div>
            </div>
            
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                   
                    <div class="card-body">
                        <div class="form-validation">
                            {{-- {{ dd($lichchieu->ThoiGianChieu ) }} --}}
                            <form id="create-phim-form" method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-2" for="">Ngày Chiếu </label>
                                    <div class="col-md-10">
                                        <div class="">
                                            <input type="hidden" id="idLichChieu" value="{{ $lichchieu->idLichChieu }}" name="idLichChieu" placeholder="Mã Lịch Chiếu">
                                            <input value="{{ $lichchieu->ThoiGianChieu }}" class="form-control text-box single-line" type="datetime-local" id="ThoiGianChieu" name="ThoiGianChieu" step="any">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2" for="">Chọn Phim</label>
                                    <div class="col-md-10">
                                        <span>{{ $phim->TenPhim }}</span>
                                        <input hidden id="idPhim" value="{{ $phim->idPhim }}">
                                        <input hidden id="idPhong" value="{{ $lichchieu->idPhong }}">
                                        <input hidden id="idLichChieu" value="{{ $lichchieu->idLichChieu }}">
                                        {{-- <select class="form-control text-box single-line" id="idPhim" name="idPhim">
                                            <option value="0">_____Chọn Phim_____</option>
                                            @foreach ($phim as $item)
                                                <option value="{{ $item->idPhim }}" @if($item->idPhim == $lichchieu->idPhim) selected @endif>{{ $item->TenPhim }}</option>
                                            @endforeach
                                        </select> --}}
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
                                    <label class="col-md-2" for="">Chọn Phòng Chiếu</label>
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
                                <button type="submit" class="add">Sửa</button>
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
    const danhmucList = $('#phim-list');
    //  let idphong; // Biến để lưu trữ id phòng đã chọn
     const idLichChieu = document.getElementById('idLichChieu').value;
     load();
        function load()
        {
            let idphim = document.getElementById('idPhim').value;
            const idPhong = document.getElementById('idPhong').value;           
            
            let thoigian = document.getElementById('ThoiGianChieu').value;
            $.ajax({
             url: '/api/getdanhsachphongtheokhoangtrong_update/' +idLichChieu+"/"+thoigian,
             type: 'GET',
             dataType: 'json',
             success: function(data) {
                danhmucList.html("")
                console.log(data)
                 let danhmucs = data.phongchieu;                
                
                 danhmucs.forEach(function(phim) {
                    danhmucList.append(`<tr>
                        <td>${phim.idPhongChieu}</td>
                        <td>${phim.TenPhong}</td>
                        <td><a href="" data-id="${phim.idPhongChieu}" data-toggle="modal" data-target="#updateModal"  data-ten="${phim.TenPhong}" class="chon ${phim.idPhongChieu == idPhong ? "chosen": ""}">Chọn</a></td>
                        </tr>`);
                 });
                 let phims=data.phim;
                 let phimlist=$('#phim');


             },error:(xhr)=>{
                console.log(xhr)
             }
         });

        }
     // Lắng nghe sự kiện khi click vào một thời gian chiếu khác
     document.getElementById('ThoiGianChieu').addEventListener('change', function() {
        load()
     });
 
     // Lắng nghe sự kiện khi chọn một phim khác
 
     // Lắng nghe sự kiện khi click vào một phòng chiếu
     $(document).on('click', 'a.chon', function(e) {
         e.preventDefault();
         $('a.chon').removeClass('chosen');
         $(this).addClass('chosen');
         idphong = $(this).attr('data-id');
     });
 
     // Lắng nghe sự kiện khi click vào nút "Thêm"
     $(document).on('click', '.add', function(event) {
         event.preventDefault();
         let thoiGianChieuValue = document.getElementById('ThoiGianChieu').value;
         let selectedPhimId = document.getElementById('idPhim').value;
        console.log(thoiGianChieuValue);
        console.log(selectedPhimId);
        console.log(idphong);
 
         // Sử dụng AJAX để gửi dữ liệu đến controller để tạo lịch chiếu mới
         $.ajax({
             url: "/api/update_lichchieu/"+idLichChieu,
             method: 'get',
             data: {
                 thoiGianChieuValue: thoiGianChieuValue,
                 selectedPhimId: selectedPhimId,
                 idphong: idphong,
              
             },
             success: function(res) {
                 alert(res.message);
                 window.location.href = document.referrer;
             },
             error:(error)=>{
                console.log(error)
             }
         });
     });
 });
 
 </script>
@endsection