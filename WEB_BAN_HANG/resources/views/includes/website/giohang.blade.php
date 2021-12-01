<div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart"></i>
        <span>Giỏ hàng</span>
        <div class="qty"></div>
    </a>
    <div class="cart-dropdown">
        <div class="cart-list">
            @if(Session('cart'))
            @foreach(Session('cart')->items as $item )
            <div class="product-widget">
                <div class="product-img">
                    <img>
                </div>
                <div class="product-body">
                    <h3 class="product-name"><a href="#">{{$item["item"]->ten_sp}}</a></h3>
                    <h4 class="product-price">{{$item["totalQty"]}}<span class="qty">x</span>{{number_format($item["item"]->gia_sp)}}<sup>đ</sup></h4>
                </div>
                <button class="delete"><i class="fa fa-close"></i></button>
            </div>
            @endforeach
        </div>
        <div class="cart-summary">
            <small>{{count(Session('cart')->items)}} sản phẩm đã chọn</small>
            <h5>Tổng tiền: {{number_format(Session('cart')->totalPrice)}}<sup>đ</sup></h5>
        </div>
        @endif
        <div class="cart-btns">
            <a href="#">Xem giỏ hàng</a>
            <a href="#">Thanh toán<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>