<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanphamModel;
use App\Models\TheloaiModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class SanphamController extends Controller
{
    public function index()
    {
        $sanphams = SanphamModel::paginate(5);
        return view('backend.sanpham.index',compact('sanphams'));
    }
    public function create()
    {
        $theloais = TheloaiModel::all();
        return view('backend.sanpham.create',compact('theloais'));
    }
    public function store(Request $request)
    {
        $sanpham = new SanphamModel();
        $sanpham->ten_sp = $request->ten_sp;
        $sanpham->TL_id = $request->the_loai;
        $sanpham->gia_sp = $request->gia_sp;
        if ($request->hasFile('hinh_anh')) {
            $file = $request->hinh_anh;
            $path = $file->store('image','public');
            $sanpham->hinh_anh = $path;
        }
        $sanpham->mo_ta = $request->mo_ta;
        $sanpham->save();
        Session::flash('success', 'Thêm sản phẩm thành công!');
        return redirect()->route('sanpham.index');
    }
    public function edit($id)
    {
        $sanpham = SanphamModel::find($id);
        $theloais = TheloaiModel::all();
        return view('backend.sanpham.edit',compact('sanpham','theloais'));
    }
    public function update(Request $request, $id)
    {
        $sanpham = SanphamModel::find($id);
        $sanpham->ten_sp = $request->input('ten_sp');
        $sanpham->TL_id = $request->input('the_loai');
        $sanpham->gia_sp = $request->input('gia_sp');
        if ($request->hasFile('hinh_anh')) {
            //delete old images
            $currentFile = $sanpham->hinh_anh;
            if ($currentFile) {
                Storage::delete('/public/' . $currentFile);
            }
            // update new images
            $file = $request->hinh_anh;
            $path = $file->store('image', 'public');
            $sanpham->hinh_anh = $path;
        }
        $sanpham->mo_ta = $request->input('mo_ta');
        $sanpham->save();
        Session::flash('success', 'Sửa sản phẩm thành công!');
        return redirect()->route('sanpham.index');
    }
    public function destroy($id)
    {
        $sanpham = SanphamModel::find($id);
        $sanpham->delete();
        Session::flash('success','Xoá sản phẩm thành công!');
        return redirect()->route('sanpham.index');
    }
}
