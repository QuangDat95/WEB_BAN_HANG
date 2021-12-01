<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonhangModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DonhangController extends Controller
{
    public function index()
    {
        $donhangs = DonhangModel::paginate(5);
        return view('backend.donhang.index', compact('donhangs'));
    }
    public function create()
    {
        return view('backend.donhang.create');
    }
    public function store(Request $request)
    {
        $donhang = new DonhangModel();
        $donhang->ten_KH = $request->ten_KH;
        $donhang->ngay_mua = $request->ngay_mua;
        $donhang->so_dt = $request->so_dt;
        $donhang->dia_chi = $request->dia_chi;
        $donhang->save();
        Session::flash('success', 'Thêm đơn hàng thành công!');
        return redirect()->route('donhang.index');
    }
    public function show($id)
    {
        $donhang = DonhangModel::find($id);
        $items = DB::table('chi_tiet_don_hang')
            ->join('don_hang', 'chi_tiet_don_hang.don_hang_id', '=', 'don_hang.id')
            ->join('san_pham', 'chi_tiet_don_hang.san_pham_id', '=', 'san_pham.id')
            ->where('don_hang_id', '=', $id)
            ->get();
        $so_luong = 0;
        $tong_gia = 0;
        for ($i = 0; $i < count($items); $i++) {
            $so_luong += $items[$i]->so_luong;
            $tong_gia += $items[$i]->gia_sp * $items[$i]->so_luong;
        }
        return view('backend.donhang.show', compact('donhang', 'items','so_luong','tong_gia'));
    }
    public function edit($id)
    {
        $donhang = DonhangModel::find($id);
        return view('backend.donhang.edit',compact('donhang'));
    }
    public function update(Request $request, $id)
    {
        $donhang = DonhangModel::find($id);
        $donhang->ten_KH = $request->input('ten_KH');
        $donhang->ngay_mua = $request->input('ngay_mua');
        $donhang->so_dt = $request->input('so_dt');
        $donhang->dia_chi = $request->input('dia_chi');
        $donhang->save();
        Session::flash('success', 'Cập nhật đơn hàng thành công!');
        return redirect()->route('donhang.index');
    }
    public function destroy($id)
    {
        $donhang = DonhangModel::find($id);
        $donhang->delete();
        Session::flash('success', 'Xoá đơn hàng thành công!');
        return redirect()->route('donhang.index');
    }
}
