<div class="menu">
    <div class="breadLine">
        <div class="arrow"></div>
        <div class="adminControl active">
        <div style="width:5.5cm;"><marquee style="color:blue">Chào Nguyễn Quang Đạt</marquee></div>
        </div>
    </div>
    <div class="admin">
        <div class="image">
            <a href="index.php"><img src="{{URL::asset('img1/users/avatar.jpg')}}" class="img-polaroid"/></a>
        </div>
        <ul class="control">
            <li><span class="icon-cog"></span> <a href="">Cập nhật Quản lý</a></li>
            <li><span class="icon-share-alt"></span> <a href="{{route('trangchu')}}">Đăng xuất</a></li>
        </ul>
    </div>
    <ul class="navigation">
        <li>
            <a href="{{route('theloai.index')}}">
                <span class="isw-grid"></span><span class="text">Phân loại</span>
            </a>
        </li>
        <li>
            <a href="{{route('sanpham.index')}}">
                <span class="isw-list"></span><span class="text">Sản phẩm</span>
            </a>
        </li>
        <li>
            <a href="{{route('donhang.index')}}">
                <span class="isw-list"></span><span class="text">Đơn hàng</span>
            </a>
        </li>
        <li>
            <a href="{{route('danhsach.index')}}">
                <span class="isw-list"></span><span class="text">Danh sách đơn hàng</span>
            </a>
        </li>
    </ul>
</div>