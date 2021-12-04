@extends('frontend.index')
@section('content')
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->
			<div id="aside" class="col-md-3">
				<div class="aside">
					<h3 class="aside-title">Hàng bán chạy</h3>
					@foreach ($banchays as $banchay)
					<div class="product-widget">
						<div class="product-img">
							<img src="{{Storage::url($banchay->san_pham->hinh_anh)}}" alt="">
						</div>
						<div class="product-body">
							<p class="product-category"></p>
							<h3 class="product-name"><a href="{{route('chitiet',$banchay->san_pham->id)}}">{{$banchay->san_pham->ten_sp}}</a></h3>
							<h4 class="product-price">{{number_format($banchay->san_pham->gia_sp)}}<sup>đ</sup></h4>
						</div>
					</div>
					@endforeach
				</div>
				<!-- /aside Widget -->
			</div>
			<!-- /ASIDE -->
			<!-- STORE -->
			<div id="store" class="col-md-9">
				<div class="store-filter clearfix">
					<div style="float:left">
						{{$sanphams->links()}}
					</div>
					<!-- <div style="float:right">
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
					</div> -->
				</div>

				<!-- store products -->
				<div class="row" id="option_change">
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
				<div class="store-filter clearfix">
					{{$sanphams->links()}}
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
	// function RenderStore(response) {
	// 	$('#store').empty();
	// 	$('#store').html(response);
	// }
	// $(document).ready(function() {
	// 	$('#select_option').on('change', function() {
			// if (this.value == "price_up") {
			// 	$.ajax({
			// 		type: "GET",
			// 		url: "{{route('giatang')}}",
			// 		dataType: "html",
			// 		success: function (response) {
			// 			RenderStore(response);
			// 			this.attr('selected',true);
			// 		}
			// 	});
				
			// }
			// else if(this.value == "price_down"){
			// 	$.ajax({
			// 		type: "GET",
			// 		url: "/giamdan",
			// 		success: function (response) {
			// 			RenderStore(response);
			// 		}
			// 	});
			// 	this.attr('selected',true);
			// }else if(this.value == "price_down"){
			// 	$.ajax({
			// 		type: "GET",
			// 		url: "/a_to_z",
			// 		success: function (response) {
			// 			RenderStore(response);
			// 		}
			// 	});
			// 	this.attr('selected',true);
			// }else if(this.value == "price_down"){
			// 	$.ajax({
			// 		type: "GET",
			// 		url: "/z_to_a",
			// 		success: function (response) {
			// 			RenderStore(response);
			// 		}
			// 	});
			// 	this.attr('selected',true);
			// }else if(this.value == "price_down"){
			// 	$.ajax({
			// 		type: "GET",
			// 		url: "/ao_nam",
			// 		success: function (response) {
			// 			RenderStore(response);
			// 		}
			// 	});
			// 	this.attr('selected',true);
			// }else if(this.value == "price_down"){
			// 	$.ajax({
			// 		type: "GET",
			// 		url: "/ao_nu",
			// 		success: function (response) {
			// 			RenderStore(response);
			// 		}
			// 	});
			// 	this.attr('selected',true);
			// }else if(this.value == "price_down"){
			// 	$.ajax({
			// 		type: "GET",
			// 		url: "/quan_nam",
			// 		success: function (response) {
			// 			RenderStore(response);
			// 		}
			// 	});
			// 	this.attr('selected',true);
			// }else if(this.value == "price_down"){
			// 	$.ajax({
			// 		type: "GET",
			// 		url: "/quan_nu",
			// 		success: function (response) {
			// 			RenderStore(response);
			// 		}
			// 	});
			// 	this.attr('selected',true);
			// }else if(this.value == "price_down"){
			// 	$.ajax({
			// 		type: "GET",
			// 		url: "/pk_nam",
			// 		success: function (response) {
			// 			RenderStore(response);
			// 		}
			// 	});
			// 	this.attr('selected',true);
			// }else if(this.value == "price_down"){
			// 	$.ajax({
			// 		type: "GET",
			// 		url: "/pk_nu",
			// 		success: function (response) {
			// 			RenderStore(response);
			// 		}
			// 	});
			// 	this.attr('selected',true);
			// }
	// 	})
	// });
</script>