@extends('Admin.Home.index')
@section('content')


<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <center><h4> Trang Sửa Khách Hàng</h4></center>
                  
                </div>
            </div>
            
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                   
                    <div class="card-body">
                        <div class="form-validation">
                            
                            <form id="create-phim-form" method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                
                                <input type="hidden" id="" value="{{ $kh[0]->idKH }}" name="idKH" placeholder="Mã Khách Hàng">
                                <div class="form-group">
                                    <label class="col-md-2" for="">Tên Khách Hàng </label>
                                    <div class="col-md-10">
                                        <div class="">
                                            <input required="required" class="form-control text-box single-line" type="text" id="HoTen" value="{{ $kh[0]->HoTen }}" name="HoTen" placeholder="Tên Khách Hàng">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2" for="TenTheLoai">Ngày Sinh</label>
                                    <div class="col-md-10">
                                        <div class="">
                                            <input required="required" class="form-control text-box single-line" type="date" id="NgaySinh" value="{{ $kh[0]->NgaySinh }}" name="NgaySinh" placeholder="Ngày Sinh">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2" for="TenTheLoai">Địa Chỉ</label>
                                    <div class="col-md-10">
                                        <div class="">
                                            <input required="required" class="form-control text-box single-line" type="text" id="DiaChi" value="{{ $kh[0]->DiaChi }}" name="DiaChi" placeholder="Địa Chỉ">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2" for="TenTheLoai">Số Điện Thoại</label>
                                    <div class="col-md-10">
                                        <div class="">
                                            <input required="required" class="form-control text-box single-line" type="text" id="SDT" value="{{ $kh[0]->SDT }}" name="SDT" placeholder="Số Điện Thoại">
                                        </div>
                                    </div>
                                    <div class="errorsdt"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2" for="TenTheLoai"> Email</label>
                                    <div class="col-md-10">
                                        <div class="">
                                            <input required="required" class="form-control text-box single-line" type="text" id="Email" value="{{ $kh[0]->Email }}" name="Email" placeholder="Chứng minh thư">
                                        </div>
                                    </div>
                                    <div class="erroremail"></div>
                                </div>
                                <button class="btn btn-primary" type="submit">Cập Nhật</button>
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
        $('#create-phim-form').on('submit', function(event) {
            event.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('update_khachhang') }}",
                type: 'POST',
                data: formData,
                processData: false, // Ngăn xử lý dữ liệu gửi đi
                contentType: false, // Không thiết lập kiểu dữ liệu
                success: function(res) {
                    console.log(res);
                    alert(res.message);
                    window.location.href = document.referrer;
                },error: function(er) {
    let err = er.responseJSON;
    if (err.errors && err.errors.SDT) {
        $('.errorsdt').html('<span class="text-danger">' + err.errors.SDT + '</span>');
    }
    if (err.errors && err.errors.Email) {
        $('.erroremail').html('<span class="text-danger">' + err.errors.Email + '</span>');
    }
}
            });
        });
    });
</script>
@endsection