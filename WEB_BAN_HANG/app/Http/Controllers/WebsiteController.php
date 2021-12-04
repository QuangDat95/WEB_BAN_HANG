<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\SanphamModel;
use App\Models\DonhangModel;
use App\Models\DanhsachdonhangModel;
use App\Cart;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index()
    {
        $sanphams = SanphamModel::all();
        return view('frontend.trangchu', compact('sanphams'));
    }

    public function chitiet($id)
    {
        $sanpham = SanphamModel::find($id);
        return view('frontend.chitiet', compact('sanpham'));
    }

    public function addCart(Request $req, $id)
    {
        $product = DB::table('san_pham')->where('id', '=', $id)->first();
        if ($product != null) {
            $oldCart = Session::get('cart') ? Session::get('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);
            $req->Session()->put('cart', $newCart);
        }
        return view('includes.website.giohang');
    }

    public function getCart()
    {
        return view('frontend.giohang.giohang');
    }

    public function deleteListCart(Request $req, $id)
    {
        $oldCart = Session::get('cart') ? Session::get('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);
        if (count($newCart->products) > 0) {
            $req->Session()->put('cart', $newCart);
        } else {
            $req->Session()->forget('cart');
        }
        return view('frontend.giohang.list_giohang');
    }

    public function saveItemListCart(Request $req, $id, $quanty)
    {
        $oldCart = Session::get('cart') ? Session::get('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $quanty);
        $req->Session()->put('cart', $newCart);
        return view('frontend.giohang.list_giohang');
    }
    public function getCheckout()
    {
        return view('frontend.checkout');
    }

    public function orderSuccess()
    {
        return view('frontend.order_success');
    }

    public function Checkout(Request $req)
    {
        $donhang = new DonhangModel();
        $donhang->ten_KH = $req->Ten_khach_hang;
        $donhang->ngay_mua = date('y-m-d');
        $donhang->so_dt = $req->so_dt;
        $donhang->dia_chi = $req->dia_chi;
        $donhang->save();
        $last_id = $donhang->id;
        $cart = Session::get('cart')->products;
        foreach ($cart as $ID_sp => $value) {
            $chitiet_donhang = new DanhsachdonhangModel();
            $chitiet_donhang->don_hang_id = $last_id;
            $chitiet_donhang->san_pham_id = $ID_sp;
            $chitiet_donhang->so_luong = $value["quanty"];
            $chitiet_donhang->save();
        }
        return redirect()->route('orderSuccess');
    }

    public function returnHome()
    {
        Session::forget('cart');
        return redirect()->route('trangchu');
    }

    public function Cuahang()
    {
        $sanphams = SanphamModel::paginate(6);
        $banchays = DanhsachdonhangModel::orderBy('chi_tiet_don_hang.so_luong', 'desc')->limit(5)->get();
        return view('frontend.cuahang.cuahang', compact('sanphams', 'banchays'));
    }

    public function lienhe(){
        return view('frontend.lienhe');
    }
}
