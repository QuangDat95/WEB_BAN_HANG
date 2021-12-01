@extends('backend.index')
@section('content')
<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="">Chi tiết đơn hàng</a> <span class="divider"></span></li>
            <li class="active">Sửa</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Chi tiết đơn hàng</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên Khách hàng</th>
                            <th colspan="3">{{$donhang->ten_KH}}</th>
                        </tr>
                        <tr>
                            <th>Ngày mua</th>
                             <?php 
                                $donhang->ngay_mua = date('d-m-Y', strtotime($donhang->ngay_mua));
                            ?>
                            <th colspan="3">{{$donhang->ngay_mua}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tên Sản Phẩm</td>
                            <td>Hình ảnh</td>
                            <td>Số lượng</td>
                            <td>Giá sản phẩm</td>
                        </tr>
                    @foreach($items as $key => $item) 
                        <tr>
                            <td>{{ $item->ten_sp }}</td>
                            <td> <img src="{{Storage::url($item->hinh_anh)}}" width="100"> </td>
                            <td>{{$item->so_luong}}</td>
                            <td>{{number_format($item->gia_sp)}} <sup>đ</sup></td>
                        </tr>
                    @endforeach
                        <tr>
                            <td>Tổng</td>
                            <td></td>
                            <td>{{$so_luong}}</td>
                            <td>{{$tong_gia = number_format($tong_gia)}} <sup>đ</sup></td>
                            
                        </tr>
                        
                    </tbody>
                </table>        
                        <div class="row-form">
                        	<a class="btn btn-info" onclick="window.history.back()">Trở về</a>
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