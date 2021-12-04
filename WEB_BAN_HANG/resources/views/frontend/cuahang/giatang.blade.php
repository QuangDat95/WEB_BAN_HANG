<div class="store-filter clearfix">
    <div style="float:right">
        <select id="select_option">
            <option>Tuỳ chọn</option>
            <option value="price_up">Giá tăng</option>
            <option value="price_down">Giá giảm</option>
            <option value="a_to_z">A-Z</option>
            <option value="z_to_a">Z-A</option>
            <option value="ao_nam">Áo Nam</option>
            <option value="ao_nu">Áo Nữ</option>
            <option value="quan_nam">Quần Nam</option>
            <option value="quan_nu">Quần Nữ</option>
            <option value="pk_nam">Phụ kiện Nam</option>
            <option value="pk_nu">Phụ kiện Nữ</option>
        </select>
    </div>
</div>

<!-- store products -->
<div class="row">
    <!-- product -->
    @foreach($sanphams as $sanpham)
    <div class="col-md-4 col-xs-6">
        <div class="product">
            <a href="{{route('chitiet',$sanpham->id)}}">
                <div class="product-img">
                    <img src="{{Storage::url($sanpham->hinh_anh)}}" alt="{{$sanpham->hinh_anh}}">
                </div>
            </a>
            <div class="product-body">
                <p class="product-category">{{$sanpham->the_loai->the_loai}}</p>
                <h3 class="product-name"><a href="{{route('chitiet',$sanpham->id)}}">{{$sanpham->ten_sp}}</a></h3>
                <h4 class="product-price">{{number_format($sanpham->gia_sp)}}<sup>đ</sup></h4>
            </div>
        </div>
    </div>
    @endforeach
    <!-- /product -->
</div>
<!-- /store products -->
<!-- store bottom filter -->
<!-- /store bottom filter -->