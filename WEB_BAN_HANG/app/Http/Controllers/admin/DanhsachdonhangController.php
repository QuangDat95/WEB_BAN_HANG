<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhsachdonhangModel;
use App\Models\DonhangModel;
use App\Models\SanphamModel;
use Illuminate\Support\Facades\Session;

class DanhsachdonhangController extends Controller
{
    public function index()
    {
        $danhsachs = DanhsachdonhangModel::paginate(5);
        return view('backend.danhsach.index',compact('danhsachs'));
    }
    public function create()
    {
        $donhangs = DonhangModel::all();
        $sanphams = SanphamModel::all();
        return view('backend.danhsach.create',compact('donhangs','sanphams'));
    }
    public function store(Request $request)
    {
        $danhsach = new DanhsachdonhangModel();
        $danhsach->don_hang_id = $request->don_hang_id;
        $danhsach->san_pham_id = $request->san_pham_id;
        $danhsach->so_luong = $request->so_luong;
        $danhsach->save();
        Session::flash('success', 'Thêm danh sách thành công!');
        return redirect()->route('danhsach.index');
    }
    public function edit($id)
    {
        $donhangs = DonhangModel::all();
        $sanphams = SanphamModel::all();
        $danhsach = DanhsachdonhangModel::find($id);
        return view('backend.danhsach.edit',compact('donhangs','sanphams','danhsach'));
    }
    public function update(Request $request, $id)
    {
        $danhsach = DanhsachdonhangModel::find($id);
        $danhsach->don_hang_id = $request->input('don_hang_id');
        $danhsach->san_pham_id = $request->input('san_pham_id');
        $danhsach->so_luong = $request->input('so_luong');
        $danhsach->save();
        Session::flash('success', 'Cập nhật danh sách thành công!');
        return redirect()->route('danhsach.index');
    }
    public function destroy($id)
    {
        $danhsach = DanhsachdonhangModel::find($id);
        $danhsach->delete();
        Session::flash('success', 'Xoá danh mục thành công!');
        return redirect()->route('danhsach.index');
    }
}
