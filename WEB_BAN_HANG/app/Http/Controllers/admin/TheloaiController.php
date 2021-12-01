<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheloaiModel;
use Illuminate\Support\Facades\Session;
class TheloaiController extends Controller
{
    public function index()
    {
        $theloais = TheloaiModel::paginate(5);
        return view('backend.theloai.index',compact('theloais'));
    }

    public function create()
    {
        return view('backend.theloai.create');
    }

    public function store(Request $request)
    {
        $theloai = new TheloaiModel();
        $theloai->the_loai = $request->the_loai;
        $theloai->save();
        Session::flash('success', 'Thêm loại sản phẩm thành công!');
        return redirect()->route('theloai.index');
    }

    public function edit($id)
    {
        $theloai = TheloaiModel::find($id);
        return view('backend.theloai.edit', compact('theloai'));
    }

    public function update(Request $request, $id)
    {
        $theloai = TheloaiModel::find($id);
        $theloai->the_loai = $request->input('the_loai');
        $theloai->save();
        Session::flash('success', 'Sửa loại sản phẩm thành công!');
        return redirect()->route('theloai.index');
    }

    public function destroy($id)
    {
        $theloai = TheloaiModel::find($id);
        $theloai->delete();
        Session::flash('success', 'Xóa loại sản phẩm thành công');
        return redirect()->route('theloai.index');
    }
}
