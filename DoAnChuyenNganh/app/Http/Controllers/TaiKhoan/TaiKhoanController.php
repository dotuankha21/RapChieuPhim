<?php
namespace App\Http\Controllers\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\NguoiDung;
use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Session;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $tenDangNhap = $req->usernamelogin;
        $matKhau = $req->passwordlogin;
       
        // Tìm người dùng bằng tên đăng nhập
        $user = NguoiDung::where('TenDangNhap', $tenDangNhap)->where('TinhTrang','=',0)->first();
        
        if ($user!=null) {
           
            if (Hash::check($matKhau,$user->MatKhau)) {            
                Auth::guard("web")->login($user);
                $nhanvien=NhanVien::where('idTK',Auth::user()->id)->first();
                if($nhanvien!=null)
                {
                    return redirect('/phim');
                }
                else{
                    return redirect('/');
                }
                // return view("Home.TrangChu",["user"=>Auth::guard("web")->user()]);
            } else {
                session()->put("errorLogin","Mật khẩu không chính xác");  
            }                      
        } 
        else
            session()->put("errorLogin","Tài khoản không tồn tại");  
        return redirect('/');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $tendangky=$req->tendangnhap;
        $mk = bcrypt($req->matkhau);
     
       
        $taikhoan = NguoiDung::create([
            'TenDangNhap' => $tendangky,
            'MatKhau' => $mk,
            'TinhTrang'=>0
        ]);

            $phim = new KhachHang();
            $phim->HoTen=$req->hoten;
            $phim->SDT=$req->sdt;
            $phim->Email=$req->email;
            $phim->idTK=$taikhoan->id;
            $phim->save();

        return redirect('/');
    }
    public function lui()
    {
        return redirect('/phim');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dangxuat()
    {
        Auth::guard("web")->logout(); // Đăng xuất người dùng
      
        return redirect('/'); // Chuyển hướng về trang chính hoặc trang đăng nhập
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(Request $req)
    {
        $tenDangNhap = $req->UserName;
        $matKhau = $req->Pass;
        
        // Tìm người dùng bằng tên đăng nhập
        $user = NguoiDung::where('TenDangNhap', $tenDangNhap)->first();
        dd("óiad");
        if ($user!=null) {
            if (Hash::check($matKhau,$user->MatKhau)) {            

                Auth::guard("web")->login($user);
            
                dd(Auth::user()->TenDangNhap);
                return redirect('/');
            } else {
                
                return redirect('/');
            }
        } 
    }
    public function laythongtintaikhoan()
    {
        return response()->json(NguoiDung::where('TinhTrang','=',0)->get());
    }
    public function getDanhSachTaiKhoan()
    {
        return response()->json(NguoiDung::all());
    }
    public function kichhoat($id)
    {
        DB::table('taikhoan')
            ->where('id',$id )
            ->update([
            'TinhTrang' => 0,
     
        ]);
        return back();
    }
    public function vohieuhoa($id)
    {
        
        DB::table('taikhoan')
            ->where('id',$id )
            ->update([
            'TinhTrang' => 1,
     
        ]);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
