<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/all.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/webfonts/font.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{asset('plugins/uikit/uikit.min.css')}}" />

    <title>Runner</title>

</head>

<body>
    <div class="header">
        <a style="color: #ffffff;text-decoration: none;" href="index.html">MIỄN PHÍ VẬN CHUYỂN VỚI ĐƠN HÀNG NỘI THÀNH > 300K
            - ĐỔI TRẢ TRONG 30 NGÀY - ĐẢM BẢO CHẤT LƯỢNG</a>
    </div>

    <!--Navbar-->

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">

        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{asset('images/logo.png')}}" class="logo-top" alt="">
            </a>
            <div class="desk-menu collapse navbar-collapse justify-content-md-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.html">BỘ SƯU TẬP</a>
                    </li>
                    <li class="nav-item lisanpham">
                        <a class="nav-link" href="detailproduct.html">SẢN PHẨM
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </a>
                        <ul class="sub_menu">
                            <li class="">
                                <a href="detailproduct.html" title="Sản phẩm - Style 1">
                                    Sản phẩm - Style 1
                                </a>
                            </li>
                            <li class="">
                                <a href="detailproduct.html" title="Sản phẩm - Style 2">
                                    Sản phẩm - Style 2
                                </a>
                            </li>
                            <li class="">
                                <a href="detailproduct.html" title="Sản phẩm - Style 3">
                                    Sản phẩm - Style 3
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="introduce.html">GIỚI THIỆU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">BLOG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">LIÊN HỆ</a>
                    </li>
                </ul>
            </div>
            <div id="offcanvas-flip1" uk-offcanvas="flip: true; overlay: true">
                <div class="uk-offcanvas-bar" style="background: white;
        width: 100%;">

                    <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>
                    <h3 style="font-size: 14px;
          color: #272727;
          text-transform: uppercase;
          margin: 3px 0 30px 0;
          font-weight: 500; letter-spacing: 2px;">MENU</h3>
                    <div class="justify-content-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">TRANG CHỦ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Product.html">BỘ SƯU TẬP</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle aaaa" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <p>SẢN PHẨM</p>
                                    <i class="fa fa-angle-double-right"></i>

                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border:0;">
                                    <a class="dropdown-item" href="detailproduct.html" title="Sản phẩm - Style 1">Sản phẩm - Style 1</a>
                                    <a class="dropdown-item" href="detailproduct.html" title="Sản phẩm - Style 2">Sản phẩm - Style 2</a>
                                    <a class="dropdown-item" href="detailproduct.html" title="Sản phẩm - Style 3">Sản phẩm - Style 3</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="introduce.html">GIỚI THIỆU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="blog.html">BLOG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Contact.html">LIÊN HỆ</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
                <div class="uk-offcanvas-bar" style="    background: white;
            width: 350px;">

                    <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>

                    <h3 style="font-size: 14px;
                color: #272727;
                text-transform: uppercase;
                margin: 3px 0 30px 0;
                font-weight: 500; letter-spacing: 2px;">Tìm kiếm</h3>
                    <div class="search-box wpo-wrapper-search">
                        <form action="search" class="searchform searchform-categoris ultimate-search">
                            <div class="wpo-search-inner" style="display:inline">
                                <input type="hidden" name="type" value="product">
                                <input required="" id="inputSearchAuto" name="q" maxlength="40" autocomplete="off" class="searchinput input-search search-input" type="text" size="20" placeholder="Tìm kiếm sản phẩm...">
                            </div>
                            <button type="submit" class="btn-search btn" id="search-header-btn">
                                <i style="font-weight:bold" class="fas fa-search"></i>
                            </button>
                        </form>
                        <div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults" style="display: none">
                            <div class="resultsContent"></div>
                        </div>
                    </div>
                </div>
            </div>
           @include('includes.giohang')

            <div class="icon-ol">
                <a style="color: #272727" href="">
                    <i class="fas fa-user-alt"></i>
                </a>
                <a href="#" class="" uk-toggle="target: #offcanvas-flip">
                    <i class="fas fa-search" style="color: black"></i>
                </a>

                <a style="color: #272727" href="#" uk-toggle="target: #offcanvas-flip2">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        </div>

    </nav>