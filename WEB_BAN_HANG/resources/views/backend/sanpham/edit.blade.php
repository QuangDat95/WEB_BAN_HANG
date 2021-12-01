@extends('backend.index')
@section('content')
<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="{{route('sanpham.index')}}">Sản phẩm</a> <span class="divider">></span></li>
            <li class="active">chỉnh sửa</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Chỉnh Sửa Sản Phẩm</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="{{route('sanpham.update',$sanpham->id)}}" method="POST" enctype= "multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row-form">
                            <div class="span3">Tên sản phẩm:</div>
                            <div class="span9">
                                <input type="text" name="ten_sp" value="{{$sanpham->ten_sp}}" placeholder="Nhập vào tên sản phẩm" />
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Thể loại:</div>
                            <div class="span9">
                                <select name="the_loai">
                                    <option value=""></option>
                                    @foreach($theloais as $theloai)
                                    <option value="{{$theloai->id}}" <?php if($sanpham->the_loai->id == $theloai->id){
                                        echo "selected";
                                    } ?>>{{$theloai->the_loai}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Giá sản phẩm:</div>
                            <div class="span9">
                                <input type="text" name="gia_sp" value="{{$sanpham->gia_sp}}" placeholder="Nhập vào giá sản phẩm" />
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Hình ảnh:</div>
                            <div class="span9">
                                <input type="file" name="hinh_anh" value="{{ $sanpham->hinh_anh }}"/>
                                <img src="{{ Storage::url($sanpham->hinh_anh) }}" style="height:2.5cm"></img>
                            </div>
                            <div class="clear"></div>
                            
                        </div>
                        <div class="row-form">
                            <div class="span3">Mô tả:</div>
                            <div class="span9">
                            <textarea type="text" name="mo_ta" placeholder="Nhập vào tên sản phẩm">{{$sanpham->mo_ta}}</textarea>
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace('mo_ta');
</script>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">