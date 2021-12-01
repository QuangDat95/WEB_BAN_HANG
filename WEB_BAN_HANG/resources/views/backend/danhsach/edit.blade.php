@extends('backend.index')
@section('content')
<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="{{route('danhsach.index')}}">Danh sách</a> <span class="divider">></span></li>
            <li class="active">Thêm</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Sửa Danh Sách Đơn Hàng</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="{{route('danhsach.update',$danhsach->id)}}" method="POST" enctype= "multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row-form">
                            <div class="span3">Khách Hàng</div>
                            <div class="span9">
                                <select name="don_hang_id">
                                    <option value=""></option>
                                    @foreach($donhangs as $donhang)
                                    <option value="{{$donhang->id}}"
                                    <?php if($donhang->id == $danhsach->don_hang->id){ echo "selected";} ?>
                                    >{{$donhang->ten_KH}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Sản Phẩm</div>
                            <div class="span9">
                                <select name="san_pham_id">
                                    <option value=""></option>
                                    @foreach($sanphams as $sanpham)
                                    <option value="{{$sanpham->id}}"
                                    <?php if($sanpham->id == $danhsach->san_pham->id){ echo "selected";} ?>
                                    >{{$sanpham->ten_sp}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Số Lượng</div>
                            <div class="span9">
                                <input type="text" name="so_luong" value="{{$danhsach->so_luong}}" placeholder="Nhập số lượng sản phẩm" />
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <button class="btn btn-success" type="submit">Lưu</button>
                            <div class="clear"></div>
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="dr"><span></span></div>
    </div>
</div>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">