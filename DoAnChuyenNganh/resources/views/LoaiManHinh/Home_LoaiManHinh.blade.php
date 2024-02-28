@extends('Admin.Home.index')
@section('content')
    
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0">
                    <div class="welcome-text">
                        <center><h4>Quản Lý Màn Hình</h4></center>
                        
                    </div>
                </div>
               
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-primary" href="{{ route('get_create_manhinh') }}">Thêm Màn Hình </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTables-manhinh" class="display" style="width: 1360px;color:black;">
                                    <thead>
                                        <tr>
                                            <th>Mã Màn Hình</th>
                                            <th>Tên Màn Hình</th>                                         
                                            <th>#</th>
                                            <th>#</th>
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
    
    
    
    
@endsection