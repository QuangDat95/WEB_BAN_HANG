<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\SanphamModel;
use App\Cart;

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

    public function addCart($id)
    {
        $sanpham = SanphamModel::findOrFail($id);
        $oldCart = Session::get('cart');
        $newCart = new Cart($oldCart);
        $newCart->add($sanpham);
        Session::put('cart', $newCart);
        dd(Session('cart'));
        Session::flash('add-to-cart-success', 'Them sp vao gio hang thang cong');
        return back();
    }

    public function getCart()
    {
        $cart = Session::get('cart');
        return view('includes.website.giohang', compact('cart'));
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
    }
}
