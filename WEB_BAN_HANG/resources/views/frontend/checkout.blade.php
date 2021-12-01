
<?php include_once "dataBaseConnect.php";?>
<?php
session_start();
$gio_hang   = $_SESSION['gio_hang'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Ten_khach_hang = $_POST['Ten_khach_hang'];
		$dia_chi      = $_POST['dia_chi'];
		$so_dt = $_POST['so_dt'];
	$sql = "INSERT INTO don_hang
	 ( 
	 Ten_khach_hang, 
	 ngay_mua, 
	 so_dt, 
	 dia_chi) VALUES
	  (
	  '$Ten_khach_hang',
	   NOW(), 
	   '$so_dt', 
	   '$dia_chi'
	   )";
	$stmt   = $connect->query( $sql );
	$new_id = $connect->lastInsertId();
	foreach($gio_hang as $ID_san_pham => $So_luong){
		$sql1 = "INSERT INTO chi_tiet_don_hang (
			 ID_don_hang,
			  ID_san_pham,
			   So_luong) VALUES 
			   ( '$new_id',
			    '$ID_san_pham',
				'$So_luong'
				)";
				$stmt1  = $connect->query( $sql1 );		
	}
	header("Location:order_success.php?id=".$new_id);
}	
?>
<?php include_once "layout/header.php";?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Thanh toán</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Trang chủ</a></li>
							<li class="active">Thanh toán</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
			<form action="" method="POST">
				<!-- row -->
				<div class="row">
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">	
								<h3 class="title">Địa chỉ nhận hàng</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="Ten_khach_hang" placeholder="Nhập tên">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="dia_chi" placeholder="Nhập địa chỉ">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="so_dt" placeholder="Nhập số điện thoại">
							</div>
						</div>
					</div>
					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Đơn hàng của bạn</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>SẢN PHẨM</strong></div>
								<div><strong>TỔNG</strong></div>
							</div>
							<div class="order-products">
								<?php $total = 0;?>
								<?php foreach($rows as $key => $row): ?>
								<div class="order-col">
									<div><strong><?php echo $cart[$row->ID_san_pham];?> X <?php echo $row->Ten_san_pham; ?></strong></div>
									<div><?php echo number_format($row->Gia_san_pham*$cart[$row->ID_san_pham]);?></div>
								</div>
								<?php $total += $row->Gia_san_pham*$cart[$row->ID_san_pham];?>
								<?php endforeach; ?>
							</div>
							<div class="order-col">
								<div>Phí ship</div>
								<div><strong>Miễn phí</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TỔNG</strong></div>
								<div><strong class="order-total"><?php echo number_format($total);?></strong></div>
							</div>
						</div>	
						<button href="#" type="submit" class="primary-btn order-submit">Đặt hàng</button>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</form>
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
	<?php include_once "layout/footer.php";?>
