@extends('backend.index')
@section('content')
<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="{{route('theloai.index')}}">Các loại sản phẩm</a> <span class="divider">></span></li>
            <li class="active">Thêm</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Thêm Loại Sản Phẩm</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="{{route('theloai.store')}}" method="POST">
                        @csrf
                        <div class="row-form">
                            <div class="span3">Tên loại sản phẩm:</div>
                            <div class="span9">
                                <input type="text" name="the_loai" placeholder="Nhập vào tên loại sản phẩm" />
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