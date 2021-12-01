<?php include_once "layout/header.php";?>
<?php include_once "dataBaseConnect.php";?>
<?php 
 if(isset($_GET['page'])){
	$current_page = $_GET['page'];
}else{
	$current_page = 1;
}
$limit = 6;
$sql_1 = "SELECT COUNT(ID_san_pham) as total from san_pham";
$query = $connect->query($sql_1);
// tùy chọn kiểu trả về
$query->setFetchMode(PDO::FETCH_OBJ);
// lấy tất cả kết quả
$total = $query->fetch();
$total_pages = ceil($total->total / $limit);
$start = ($current_page - 1) * $limit;
$sql = "SELECT * from san_pham 
JOIN phan_loai ON san_pham.ID_hang = phan_loai.ID_hang
limit $start,$limit";
// thực hiện truy vấn
$query = $connect->query($sql);
// tùy chọn kiểu trả về
$query->setFetchMode(PDO::FETCH_OBJ);
// lấy tất cả kết quả
$products = $query->fetchAll();;
?>
<?php 
	$sql = "SELECT * from san_pham
	JOIN phan_loai ON san_pham.ID_hang = phan_loai.ID_hang";
    if( isset($_REQUEST['search']) ){
        $search = $_REQUEST['search'];
        if($search !==''){
            $sql .= " where Ten_san_pham like '%$search%'";
        }
    }
    // thực hiện truy vấn
    $query = $connect->query($sql);
    // tùy chọn kiểu trả về
    $query->setFetchMode(PDO::FETCH_OBJ);
    // lấy tất cả kết quả
    $rows = $query->fetchAll();
	?>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<?php 
						$sql = "SELECT * FROM `chi_tiet_don_hang`
						JOIN san_pham ON chi_tiet_don_hang.ID_san_pham = san_pham.ID_san_pham
						ORDER BY So_luong DESC LIMIT 3";
						$query = $connect->query($sql);
						// tùy chọn kiểu trả về
						$query->setFetchMode(PDO::FETCH_OBJ);
						// lấy tất cả kết quả
						$san_phams = $query->fetchAll();
						?>
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Hàng bán chạy</h3>
							<?php foreach($san_phams as $key => $san_pham):?>
							<div class="product-widget">
								<div class="product-img">
									<img src="admin/<?php echo $san_pham->hinh_anh;?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"></p>
									<h3 class="product-name"><?php echo $san_pham->Ten_san_pham;?><a href="product.php?id=<?php echo $san_pham->ID_san_pham; ?>"></a></h3>
									<h4 class="product-price"><?php echo number_format($san_pham->Gia_san_pham);?></h4>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->
					<!-- STORE -->
					<div id="store" class="col-md-9">
						<div class="store-filter clearfix">
							<!-- <span class="store-qty">Showing 6-30 products</span> -->
						<?php if($current_page > 1 ): ?>
						<a href="store.php?page=<?php echo $current_page - 1; ?>" class="prev page-numbers">Back</i></a>
						<?php endif; ?>
						<?php for($i = 1 ; $i <= $total_pages ; $i++) :?>
							<a href="store.php?page=<?php echo $i; ?>">
							<span class="page-numbers current" aria-current="page"><?php echo $i; ?></span>
							</a>
						<?php endfor; ?>
						<?php if($current_page < $total_pages ): ?>
						<a href="store.php?page=<?php echo $current_page + 1; ?>" class="next page-numbers">Next</i></a>
						<?php endif; ?>
						</div>
						<!-- store products -->
						<div class="row">
							<!-- product -->
							<?php foreach($products as $key => $product):?>
							<div class="col-md-4 col-xs-6">
								<div class="product">
								<a href="product.php?id=<?php echo $product->ID_san_pham?>"><div class="product-img">
										<img src="admin/<?php echo $product->hinh_anh;?>" alt="">
									</div></a>
									<div class="product-body">
										<p class="product-category"><?php echo $product->Ten_hang; ?></p>
										<h3 class="product-name"><a href="product.php?id=<?php echo $product->ID_san_pham?>"><?php echo $product->Ten_san_pham;?></a></h3>
										<h4 class="product-price"><?php echo number_format($product->Gia_san_pham);?></h4>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
							<!-- /product -->
						</div>
						<!-- /store products -->
						<!-- store bottom filter -->
						<div class="store-filter clearfix">
						<?php if($current_page > 1 ): ?>
                    <a href="store.php?page=<?php echo $current_page - 1; ?>" class="prev page-numbers">Back</i></a>
                    <?php endif; ?>
                    <?php for($i = 1 ; $i <= $total_pages ; $i++) :?>
                        <a href="store.php?page=<?php echo $i; ?>">
                        <span class="page-numbers current" aria-current="page"><?php echo $i; ?></span>
                        </a>
                    <?php endfor; ?>
                    <?php if($current_page < $total_pages ): ?>
                    <a href="store.php?page=<?php echo $current_page + 1; ?>" class="next page-numbers">Next</i></a>
                    <?php endif; ?>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
<?php include_once "layout/footer.php";?>