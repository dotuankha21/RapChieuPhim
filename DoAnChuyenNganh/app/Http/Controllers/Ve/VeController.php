<?php

namespace App\Http\Controllers\Ve;

use App\Http\Controllers\Controller;
use App\Models\ChiTietThucAn;
use App\Models\ChiTietVe;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\LichChieu;
use App\Models\NhanVien;
use App\Models\Phim;
use App\Models\PhongChieu;
use App\Models\ThucAn;
use App\Models\Ve;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class VeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tt()
    {
        $k=NhanVien::join('ChucVu', 'ChucVu.idCV', '=', 'NhanVien.idChucVu')
        ->select('NhanVien.*','ChucVu.TenChucVu')
        ->get();
        return $k;
    }
    function taoHoaDon( $maGheNgOi, $maLichChieu,Request $request) {
        $makh=KhachHang::where('idTK',Auth::user()->id)->first();
        $maKhachHang=$makh->idKH;
        $maNhanVien=Auth::user()->id;
        $arrayMaGhe = explode(',', $maGheNgOi); // Chuyển chuỗi mã ghế ngồi thành mảng
        $createdVeIds = [];
        // Tạo vé dựa trên mã ghế ngồi và mã lịch chiếu
        foreach ($arrayMaGhe as $maGhe) {
            $ve=Ve::create([
                'idLichChieu' => $maLichChieu,
                'MaGheNgoi' => $maGhe,
            ]);
            $createdVeIds[] = $ve->idVe;
        }
    
        // Tính tổng số lượng vé và tổng tiền từ chi tiết vé
        $tongSoLuong = count($arrayMaGhe);
        $tongTien = 0;
       
        // Tạo hóa đơn
        $hoaDon = HoaDon::create([
            'TONGSL' => $tongSoLuong,
            'MAKHACHHANG' => $maKhachHang,
            
            // Ngày tạo hóa đơn, sử dụng Carbon để lấy ngày hiện tại
            // Các trường thông tin khác của hóa đơn
        ]);
    
        // Tạo chi tiết vé và tính tổng tiền
        foreach ($createdVeIds as $idVe) {
            $chiTietVe = ChiTietVe::create([
                'idVe' => $idVe,
                'MAHOADON' => $hoaDon->MAHOADON, // Mã hóa đơn được tạo trước đó
                // Các trường thông tin khác của chi tiết vé
            ]);
    
            // Tính tổng tiền từ giá vé của bảng Phim
            $idPhim = LichChieu::find($maLichChieu)->idPhim; // Lấy idPhim từ mã lịch chiếu
            $giaVe = Phim::find($idPhim)->DonGia; // Lấy giá vé từ bảng Phim
            $tongTien += $giaVe;
    
            // Cập nhật giá vé vào chi tiết vé
            $chiTietVe->update(['GiaVe' => $giaVe]);
        }
    
        // Cập nhật thông tin tổng số lượng và tổng tiền vào hóa đơn
        $hoaDon->update([
            'TONGTIEN' => $tongTien,
            'TinhTrang' => 0,
            'TRANGTHAI'=>0, 
            'NGAYTAO'=>now()
            // Giả sử TinhTrang là một trường để xác định hóa đơn đã thanh toán hay chưa
        ]);
        $idd=$hoaDon->MAHOADON;
        $danhSachThucAnDaChon = json_decode(urldecode($request->query('danhSach')), true);
        $tong=0;
        $tongsl=0;
        foreach ($danhSachThucAnDaChon as $thucAn) {
            $maThucAn = $thucAn['maThucAn'];
            $tenThucAn = $thucAn['tenThucAn'];
            $soLuong = $thucAn['soLuong'];
            $gia = $thucAn['gia'];
            $tong+=$gia*$soLuong;
            $tongsl+=$soLuong;
            $chitietthucan = ChiTietThucAn::create([
                'MATHUCAN' => $maThucAn,
                'MAHOADON' => $idd, 
                'SOLUONG'=>$soLuong// Mã hóa đơn được tạo trước đó
                // Các trường thông tin khác của chi tiết vé
            ]);
            
        }
        $hoaDon->update([
            'TONGTIEN' => $tongTien+$tong,
            'TONGSL'=>$tongsl+$tongSoLuong,
            'TinhTrang' => 0,
            'TRANGTHAI'=>0, 

            // Giả sử TinhTrang là một trường để xác định hóa đơn đã thanh toán hay chưa
        ]);

        return response()->json(['msg'=>$idd]);
    }
    public function chitietdatve($id)
    {
        $hoadon = HoaDon::join('ChiTietVe', 'ChiTietVe.MAHOADON', '=', 'HoaDon.MAHOADON')
        ->join('Ve', 'Ve.idVe', '=', 'ChiTietVe.idVe')
        ->select('HoaDon.*', 'Ve.idVe', 'Ve.MaGheNgoi','ChiTietVe.GiaVe')
        ->where('HoaDon.MAHOADON', '=', $id)
        ->get();
        $phong=PhongChieu::join('LichChieu', 'LichChieu.idPhong', '=', 'PhongChieu.idPhongChieu')
        ->join('Ve', 'Ve.idLichChieu', '=', 'LichChieu.idLichChieu')
        ->join('ChiTietVe','ChiTietVe.idVe','=','Ve.idVe')
        ->where('ChiTietVe.MAHOADON',$id)
        ->select('PhongChieu.*')
        ->get();
        $thucan=ThucAn::join('ChiTietThucAn', 'ChiTietThucAn.MATHUCAN', '=', 'ThucAn.MATHUCAN')
        ->join('HoaDon', 'HoaDon.MAHOADON', '=', 'ChiTietThucAn.MAHOADON')
        ->select('ChiTietThucAN.*', 'ThucAn.TENTHUCAN', 'ThucAn.DONGIA')
        ->where('HoaDon.MAHOADON',$id)
        ->get();
        return view('HoaDon.ChiTietHoaDon',['hoadon'=>$hoadon,'thucan'=>$thucan,'phong'=>$phong]);
    }


    public function thanhtoan($id)
    {
        $hoaDon = DB::table('HoaDon')->where('MAHOADON', $id)->first();

        if ($hoaDon) {
            // Update trạng thái hóa đơn thành trạng thái mới
            DB::table('HoaDon')->where('MAHOADON', $id)->update(['TRANGTHAI' => 1]); // Thay 'DaThanhToan' bằng trạng thái bạn muốn cập nhật

            return response()->json(['msg' => 'Đặt vé thành công']);
        } else {
            return response()->json(['msg' => 'ko']);
        }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function test(Request $request)
    {
        $danhSachThucAnDaChon = json_decode(urldecode($request->query('danhSach')), true);
        foreach ($danhSachThucAnDaChon as $thucAn) {
            $maThucAn = $thucAn['maThucAn'];
            $tenThucAn = $thucAn['tenThucAn'];
            $soLuong = $thucAn['soLuong'];
            $gia = $thucAn['gia'];
    
            
        }
    }
    public function handlePayment(Request $request, $idHD){
        $tongTien = DB::table('HoaDon')->where('MAHOADON', $idHD)->first()->TONGTIEN;
        $tongTienPay = number_format($tongTien / 23000, 2);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment',['id' => $idHD]),
                "cancel_url" => route('cancel.payment',['id' => $idHD]),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => (float)$tongTienPay
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Đã có lỗi xảy ra.');
        } else {
            return redirect()
                ->route('chitietdatve', ['id' => $idHD])
                ->with('error', $response['message'] ?? 'Đã có lỗi xảy ra.');
        }
    }
    public function paymentCancel(Request $request, $id){
        return redirect()
        ->route('chitietdatve', ['id' => $id])
        ->with('error','Bạn đã hủy thanh toán.');
    }
    public function paymentSuccess(Request $request, $id){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $this->thanhtoan($id, $response['id']);
            return redirect()
                 ->route('chitietdatve', ['id' => $id])
                ->with('success', 'Thanh toán thành công.');
        } else {
            return redirect()
            
                 ->route('chitietdatve', ['id' => $id])
                ->with('error', $response['message'] ?? 'Đã có lỗi xảy ra.');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    public function show($id)
    {
        //
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
