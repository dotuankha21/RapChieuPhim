<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Quản lý Rạp Chiếu Phim </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/Content/admin/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/Content/admin/vendor/pg-calendar/css/pignose.calendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Content/admin/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Content/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-free-6.4.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Content/admin/vendor/datatables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- datetime picker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js">
    </script>
    <style>
        label {
            font-weight: bold;
            color: black;
            font-size: 16px
        }
    </style>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">


            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="~/Content/admin/app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">{{ Auth::user()->TenDangNhap }} </span>
                                    </a>
                                    <a href="{{ route('dangxuat') }}" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Đăng Xuất </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->


                    <li class="nav-label">Quản Lý hệ thống</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-ticket"></i><span class="nav-text">Quản Lý Bán Vé </span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/admin/dat-ve">Bán vé tại quầy</a></li>
                            <li><a href="/hoadon">Quản lý hóa đơn</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-video"></i><span class="nav-text">Quản Lý Phim </span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/phim">Phim</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-clapperboard"></i><span class="nav-text"> Quản Lý Lịch Chiếu </span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/lichchieu">Lịch chiếu</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-house"></i><span class="nav-text"> Quản Lý Phòng </span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/phongchieu">Phòng</a></li>

                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-chart-line"></i><span class="nav-text">Thống Kê </span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/thongke">Quản Lý Thống Kê</a></li>

                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-world-2"></i><span class="nav-text">Quản Lý Thông Tin</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/nhanvien">Quản lý Nhân Viên</a></li>
                            <li><a href="/khachhang">Quản lý Khách hàng</a></li>
                            <li><a href="/taikhoan">Quản lý tài khoản</a></li>

                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-app-store"></i><span class="nav-text">Quản Lý Danh Mục</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('home_chucvu') }}">Quản lý chức vụ</a></li>
                            <li><a href="/theloai">Quản lý thể loại</a></li>
                            <li><a href="{{ route('home_manhinh') }}">Quản lý màn hình</a></li>
                            <li><a href="/thucan">Quản lý thức ăn</a></li>
                            <li><a href="/dienvien">Quản lý diễn viên</a></li>
                        </ul>
                    </li>



                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->
        <!--**********************************
            Footer end
        ***********************************-->
        <!--**********************************
           Support ticket button start
        ***********************************-->
        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets/Content/admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/Content/admin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('assets/Content/admin/js/custom.min.js') }}"></script>

    <script src="{{ asset('assets/Content/admin/vendor/chartist/js/chartist.min.js') }}"></script>

    <script src="{{ asset('assets/Content/admin/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/Content/admin/vendor/pg-calendar/js/pignose.calendar.min.js') }}"></script>


    <script src="{{ asset('assets/Content/admin/js/dashboard/dashboard-2.js') }}"></script>
    <script src="{{ asset('assets/Content/admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/Content/admin/js/plugins-init/datatables.init.js') }}"></script>
    <!-- Circle progress -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-phim').dataTable({
                "processing": true,
                "serverSide": false,

                "ajax": {
                    "url": '/api/',
                    "type": 'get',
                    "datatype": 'json',

                    "dataSrc": ""
                },

                "columns": [{
                        "data": "idPhim"
                    }, {
                        "data": "TenPhim"
                    },
                    {
                        "data": "ApPhich",
                        render: function(data) {
                            return "<img src='/assets/Content/Upload/Image/" + data +
                                "'   height='150'>";

                        }
                    },
                    {
                        "data": "MoTa"
                    }, {
                        "data": "TenTheLoai"
                    }, {
                        "data": "ThoiLuong"
                    },
                    {
                        "data": "NgayKhoiChieu",

                    },

                    {
                        "data": "NamSX"
                    },
                    {
                        "data": "DaoDien"
                    },
                    {
                        "data": "HangSanXuat"
                    },
                    {
                        "data": "TenMH"
                    },
                    {
                        "data": "idPhim",
                        render: function(data, type, row) {
                            return "<a href='/api/get_update_phim/" + data +
                                "'  class='btn btn-primary'>Sửa</a>";
                        }
                    },
                    {
                        "data": "idPhim",
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-primary'  onclick='xoaPhim(" +
                                data + ")'>Xóa</button>";
                        }
                    },
                ],
            })
        });

        function xoaPhim(data) {
            if (confirm("Bạn muốn xóa phim này")) {
                $.ajax({
                    url: '/api/delete_phim/' + data,
                    type: "GET",

                    success: function(response) {

                        alert(response.message);
                        $('#dataTables-phim').DataTable().ajax.reload();

                    }
                })

            }
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-chucvu').dataTable({
                "processing": true,
                "serverSide": false,

                "ajax": {
                    "url": '/api/chucvu',
                    "type": 'get',
                    "datatype": 'json',

                    "dataSrc": ""
                },

                "columns": [{
                        "data": "idCV"
                    }, {
                        "data": "TenChucVu"
                    },


                    {
                        "data": "idCV",
                        render: function(data, type, row) {
                            return "<a href='/api/get_update_chucvu/" + data +
                                "'  class='btn btn-primary'>Sửa</a>";
                        }
                    },
                    {
                        "data": "idCV",
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-primary'  onclick='xoaChucVu(" +
                                data + ")'>Xóa</button>";
                        }
                    },
                ],
            });


        });

        function xoaChucVu(data) {
            if (confirm("Bạn muốn xóa chức vụ này")) {
                $.ajax({
                    url: '/api/delete_chucvu/' + data,
                    type: "GET",

                    success: function(response) {
                        if (response) {
                            alert("Bạn đã xóa thành công");
                            $('#dataTables-chucvu').DataTable().ajax.reload();
                        } else {
                            alert("xảy ra quá trình xử lý");
                        }
                    }
                })

            }
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-theloai').dataTable({
                "processing": true,
                "serverSide": false,

                "ajax": {
                    "url": '/api/theloai',
                    "type": 'get',
                    "datatype": 'json',

                    "dataSrc": ""
                },

                "columns": [{
                        "data": "idTheLoai"
                    }, {
                        "data": "TenTheLoai"
                    },


                    {
                        "data": "idTheLoai",
                        render: function(data, type, row) {
                            return "<a href='/api/get_update_theloai/" + data +
                                "'  class='btn btn-primary'>Sửa</a>";
                        }
                    },
                    {
                        "data": "idTheLoai",
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-primary'  onclick='xoaTheLoai(" +
                                data + ")'>Xóa</button>";
                        }
                    },
                ],
            });


        });

        function xoaTheLoai(data) {
            if (confirm("Bạn muốn xóa thể loại này")) {
                $.ajax({
                    url: '/api/delete_theloai/' + data,
                    type: "GET",

                    success: function(response) {
                        if (response) {
                            alert("Bạn đã xóa thành công");
                            $('#dataTables-theloai').DataTable().ajax.reload();
                        } else {
                            alert("xảy ra quá trình xử lý");
                        }
                    }
                })

            }
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-manhinh').dataTable({
                "processing": true,
                "serverSide": false,

                "ajax": {
                    "url": '/api/manhinh',
                    "type": 'get',
                    "datatype": 'json',

                    "dataSrc": ""
                },

                "columns": [{
                        "data": "idMH"
                    }, {
                        "data": "TenMH"
                    },


                    {
                        "data": "idMH",
                        render: function(data, type, row) {
                            return "<a href='/api/get_update_manhinh/" + data +
                                "'  class='btn btn-primary'>Sửa</a>";
                        }
                    },
                    {
                        "data": "idMH",
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-primary'  onclick='xoaManHinh(" +
                                data + ")'>Xóa</button>";
                        }
                    },
                ],
            });


        });

        function xoaManHinh(data) {
            if (confirm("Bạn muốn xóa thể loại này")) {
                $.ajax({
                    url: '/api/delete_manhinh/' + data,
                    type: "GET",

                    success: function(response) {
                        if (response) {
                            alert("Bạn đã xóa thành công");
                            $('#dataTables-theloai').DataTable().ajax.reload();
                        } else {
                            alert("xảy ra quá trình xử lý");
                        }
                    }
                })

            }
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-thucan').dataTable({
                "processing": true,
                "serverSide": false,

                "ajax": {
                    "url": '/api/thucan',
                    "type": 'get',
                    "datatype": 'json',

                    "dataSrc": ""
                },

                "columns": [{
                        "data": "MATHUCAN"
                    }, {
                        "data": "TENTHUCAN"
                    }, {
                        "data": "DONGIA"
                    },


                    {
                        "data": "MATHUCAN",
                        render: function(data, type, row) {
                            return "<a href='/api/get_update_thucan/" + data +
                                "'  class='btn btn-primary'>Sửa</a>";
                        }
                    },
                    {
                        "data": "MATHUCAN",
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-primary'  onclick='xoaThucAn(" +
                                data + ")'>Xóa</button>";
                        }
                    },
                ],
            });


        });

        function xoaThucAn(data) {
            if (confirm("Bạn muốn xóa thức  này")) {
                $.ajax({
                    url: '/api/delete_thucan/' + data,
                    type: "GET",

                    success: function(response) {
                        if (response) {
                            alert("Bạn đã xóa thành công");
                            $('#dataTables-thucan').DataTable().ajax.reload();
                        } else {
                            alert("xảy ra quá trình xử lý");
                        }
                    }
                })

            }
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-dienvien').dataTable({
                "processing": true,
                "serverSide": false,

                "ajax": {
                    "url": '/api/dienvien',
                    "type": 'get',
                    "datatype": 'json',

                    "dataSrc": ""
                },

                "columns": [{
                        "data": "MADV"
                    }, {
                        "data": "TENDV"
                    }, {
                        "data": "MOTA"
                    },
                    {
                        "data": "TenPhim"
                    },

                    {
                        "data": "MADV",
                        render: function(data, type, row) {
                            return "<a href='/api/get_update_dienvien/" + data +
                                "'  class='btn btn-primary'>Sửa</a>";
                        }
                    },
                    {
                        "data": "MADV",
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-primary'  onclick='xoaDienVien(" +
                                data + ")'>Xóa</button>";
                        }
                    },
                ],
            });


        });

        function xoaDienVien(data) {
            if (confirm("Bạn muốn xóa diễn viên  này")) {
                $.ajax({
                    url: '/api/delete_dienvien/' + data,
                    type: "GET",

                    success: function(response) {
                        if (response) {
                            alert("Bạn đã xóa thành công");
                            $('#dataTables-dienvien').DataTable().ajax.reload();
                        } else {
                            alert("xảy ra quá trình xử lý");
                        }
                    }
                })

            }
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-khachhang').dataTable({
                "processing": true,
                "serverSide": false,

                "ajax": {
                    "url": '/api/khachhang',
                    "type": 'get',
                    "datatype": 'json',

                    "dataSrc": ""
                },

                "columns": [{
                        "data": "idKH"
                    }, {
                        "data": "HoTen"
                    }, {
                        "data": "NgaySinh"
                    },
                    {
                        "data": "DiaChi"
                    },
                    {
                        "data": "SDT"
                    },
                    {
                        "data": "Email"
                    },
                    {
                        "data": "idKH",
                        render: function(data, type, row) {
                            return "<a href='/api/get_update_khachhang/" + data +
                                "'  class='btn btn-primary'>Sửa</a>";
                        }
                    },
                    {
                        "data": "idKH",
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-primary'  onclick='xoaKhachHang(" +
                                data + ")'>Xóa</button>";
                        }
                    },
                ],
            });


        });

        function xoaKhachHang(data) {
            if (confirm("Bạn muốn xóa khách hàng  này")) {
                $.ajax({
                    url: '/api/delete_khachhang/' + data,
                    type: "GET",

                    success: function(response) {
                        if (response) {
                            alert(response.message);
                            $('#dataTables-khachhang').DataTable().ajax.reload();
                        } else {
                            alert("xảy ra quá trình xử lý");
                        }
                    }
                })

            }
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-phong').dataTable({
                "processing": true,
                "serverSide": false,

                "ajax": {
                    "url": '/api/phongchieu',
                    "type": 'get',
                    "datatype": 'json',

                    "dataSrc": ""
                },

                "columns": [{
                        "data": "idPhongChieu"
                    }, {
                        "data": "TenPhong"
                    }, {
                        "data": "TenMH"
                    },
                    {
                        "data": "SoChoNgoi"
                    },
                    {
                        "data": "SoHangGhe"
                    },
                    {
                        "data": "SoGheMotHang"
                    },
                    {
                        "data": "TinhTrang"
                    },
                    {
                        "data": "idPhongChieu",
                        render: function(data, type, row) {
                            return "<a href='/api/get_update_phongchieu/" + data +
                                "'  class='btn btn-primary'>Sửa</a>";
                        }
                    },
                    {
                        "data": "idPhongChieu",
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-primary'  onclick='xoaPhong(" +
                                data + ")'>Xóa</button>";
                        }
                    },
                ],
            });


        });

        function xoaPhong(data) {
            if (confirm("Bạn muốn xóa phòng này")) {
                $.ajax({
                    url: '/api/delete_phongchieu/' + data,
                    type: "GET",

                    success: function(response) {
                        if (response) {
                            alert(response.message);
                            $('#dataTables-phong').DataTable().ajax.reload();
                        } else {
                            alert("xảy ra quá trình xử lý");
                        }
                    }
                })

            }
        };
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-lichchieu').dataTable({
                "processing": true,
                "serverSide": false,

                "ajax": {
                    "url": '/api/lichchieu',
                    "type": 'get',
                    "datatype": 'json',

                    "dataSrc": ""
                },

                "columns": [{
                        "data": "idLichChieu"
                    }, {
                        "data": "ThoiGianChieu"
                    }, {
                        "data": "ThoiGianKetThuc"
                    },
                    {
                        "data": "TenPhong"
                    },
                    {
                        "data": "TenPhim"
                    },
                    {
                        "data": "idLichChieu",
                        render: function(data, type, row) {
                            return "<a href='/api/get_update_lichchieu/" + data +
                                "'  class='btn btn-primary'>Sửa</a>";
                        }
                    },
                    {
                        "data": "idLichChieu",
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-primary'  onclick='xoaLichChieu(" +
                                data + ")'>Xóa</button>";
                        }
                    },
                ],
            });


        });

        function xoaLichChieu(data) {
            if (confirm("Bạn muốn xóa lịch chiếu này")) {
                $.ajax({
                    url: '/api/delete_lichchieu/' + data,
                    type: "GET",

                    success: function(response) {
                        if (response) {
                            alert(response.message);
                            $('#dataTables-lichchieu').DataTable().ajax.reload();
                        } else {
                            alert("xảy ra quá trình xử lý");
                        }
                    }
                })

            }
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-nhanvien').dataTable({
                "processing": true,
                "serverSide": false,

                "ajax": {
                    "url": '/api/nhanvien',
                    "type": 'get',
                    "datatype": 'json',

                    "dataSrc": ""
                },

                "columns": [{
                        "data": "idNhanVien"
                    }, {
                        "data": "HoTen"
                    }, {
                        "data": "NgaySinh"
                    },
                    {
                        "data": "SDT"
                    },
                    {
                        "data": "DiaChi"
                    },
                    {
                        "data": "Email"
                    },
                    {
                        "data": "GioiTinh"
                    },
                    {
                        "data": "idChucVu"
                    }

                    ,
                    {
                        "data": "idNhanVien",
                        render: function(data, type, row) {
                            return "<a href='/api/get_update_nhanvien/" + data +
                                "'  class='btn btn-primary'>Sửa</a>";
                        }
                    },
                    {
                        "data": "idNhanVien",
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-primary'  onclick='xoaNhanVien(" +
                                data + ")'>Xóa</button>";
                        }
                    },
                ],
            });
        });

        function xoaNhanVien(data) {
            if (confirm("Bạn muốn xóa nhân viên  này")) {
                $.ajax({
                    url: '/api/delete_nhanvien/' + data,
                    type: "GET",

                    success: function(response) {
                        if (response) {
                            alert(response.message);
                            $('#dataTables-nhanvien').DataTable().ajax.reload();
                        } else {
                            alert("xảy ra quá trình xử lý");
                        }
                    }
                })

            }
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-hoadon').dataTable({
                "processing": true,
                "serverSide": false,

                "ajax": {
                    "url": '/api/hoadon',
                    "type": 'get',
                    "datatype": 'json',

                    "dataSrc": ""
                },

                "columns": [{
                        "data": "HoTen"
                    }, {
                        "data": "SDT"
                    }, {
                        "data": "NGAYTAO"
                    },
                    {
                        "data": "TONGSL"
                    },
                    {
                        "data": "TONGTIEN"
                    },
                    {
                        "data": "TinhTrang",
                        render: function(data, type, row) {
                            console.log(data);
                            if (data == 0) {
                                $('#dataTables-hoadon').DataTable().ajax.reload();
                                return "<a href='/api/nhanve/" + row.MAHOADON +
                                    "'  class='btn btn-primary'>Chưa Nhận</a>";
                            } else {
                                $('#dataTables-hoadon').DataTable().ajax.reload();
                                return "<button class='btn btn-primary'>Đã Nhận</button>";

                            }
                        }
                    },
                    {
                        "data": "TRANGTHAI",
                        render: function(data) {
                            console.log(data);
                            if (data == 0) {
                                return "<a " + data +
                                    "'  class='btn btn-primary'>Chưa Thanh Toán</a>";
                            } else {
                                return "<a " + data +
                                    "'  class='btn btn-primary'>Đã Thanh Toán</a>";

                            }
                        }
                    }

                ],
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=datetime-local]", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-taikhoan').dataTable({
                "processing": true,
                "serverSide": false,

                "ajax": {
                    "url": '/api/taikhoan',
                    "type": 'get',
                    "datatype": 'json',

                    "dataSrc": ""
                },

                "columns": [{
                        "data": "id"
                    }, {
                        "data": "TenDangNhap"
                    }, {
                        "data": "MatKhau"
                    },

                    {
                        "data": "TinhTrang",
                        render: function(data, type, row) {
                            console.log(data);
                            if (data == 0) {
                                return "<a href='/api/taikhoan/vohieuhoa/" + row.id +
                                    "'  class='btn btn-primary'>Hoạt Động</a>";
                            } else {
                                return "<a href='/api/taikhoan/kichhoat/" + row.id +
                                    "'  class='btn btn-primary'>Ngưng Hoạt Động</a>";

                            }
                        }
                    }


                ],
            });
        });
    </script>
</body>

</html>
