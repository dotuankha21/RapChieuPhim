<?php

namespace App\Http\Middleware;

use App\Models\NhanVien;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $nv = NhanVien::join('ChucVu', 'ChucVu.idCV', '=', 'NhanVien.idChucVu')
            ->where('NhanVien.idTK', Auth::user()->id)
            ->select('NhanVien.*', 'ChucVu.TenChucVu')
            ->first();

        // if ($nv && $nv->TenChucVu !== 'Admin') {
        //     return redirect('/admin/dat-ve');
        // }

        return $next($request);

    }
}
