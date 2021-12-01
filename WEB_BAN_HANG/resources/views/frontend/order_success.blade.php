<?php include_once "layout/header.php";?>
<?php include_once "dataBaseConnect.php";?>
<?php
$_SESSION['gio_hang'] = [];
?>
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Order Details -->
					<div class="col-md-12 order-details">
						<div class="section-title text-center">
							<h2 class="title" style="color:green">Thanh toán thành công!</h2>
							<p>Cảm ơn quý khách đã mua hàng tại cửa hàng của chúng tôi</p>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>Sản phẩm</strong></div>
								<div><strong>Tổng</strong></div>
							</div>
							<div class="order-products">
							<?php $total = 0;?>
							<?php foreach($rows as $key => $row): ?>
								<div class="order-col">
									<div><?php echo $cart[$row->ID_san_pham];?> X <?php echo $row->Ten_san_pham; ?></div>
									<div><?php echo number_format($cart[$row->ID_san_pham]*$row->Gia_san_pham); ?></div>
								</div>
								<?php $total += $row->Gia_san_pham*$cart[$row->ID_san_pham];?>
							<?php endforeach; ?>
							</div>
							<div class="order-col">
								<div>Phí vận chuyển</div>
								<div><strong>Miễn phí</strong></div>
							</div>
							<div class="order-col">
								<div><strong>Tổng cộng</strong></div>
								<div><strong class="order-total"><?php echo number_format($total); ?></strong></div>
							</div>
						</div>
						<a href="index.php" class="primary-btn order-submit">Trở về trang chủ</a>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<?php include_once "layout/footer.php"?>