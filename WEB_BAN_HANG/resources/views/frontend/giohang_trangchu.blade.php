<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    $_SESSION['gio_hang'] = $_REQUEST['so_luong'];
    header("Location:cart.php");
}
?>
<?php include_once 'layout/header.php'; ?>
<?php include_once 'dataBaseConnect.php'; ?>
<?php
 $rows = [];
 $cart = [];
if(isset($_SESSION['gio_hang'])){
    $cart  = $_SESSION['gio_hang'];
    $id_sp = implode(',', array_keys($cart));
    if($id_sp != ''){
        $sql = "SELECT * FROM san_pham WHERE ID_san_pham IN ($id_sp) ";
        $query = $connect->query($sql);
        // tùy chọn kiểu trả về
        $query->setFetchMode(PDO::FETCH_OBJ);
        // lấy tất cả kết quả
        $rows = $query->fetchAll();
    }
}
?>
    <section class="page-title-area page-title-bg1">
        <div class="container">
            <div class="page-title-content">
                <h1 title="Cart">Giỏ hàng</h1>
            </div>
        </div>
    </section>
    <section class="cart-area ptb-100">
        <div class="container">
        <form action="" method="POST">
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên Sản phẩm</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>                 
                        <tbody>
                        <?php 
                        $total = 0;
                        foreach ($rows as $key => $row): 
                        $total += ($row->Gia_san_pham*$cart[$row->ID_san_pham]);
                        ?>
                            <tr>
                                <td style="width:100px">
                                    <a href="#">
                                    <img src="admin/<?php echo $row->hinh_anh; ?>" style="width:100%">
                                    </a>
                                </td>
                                <td class="product-name">
                                    <a href="#"><?php echo $row->Ten_san_pham; ?></a>
                                </td>
                                <td class="product-price">
                                    <span class="unit-amount"><?php echo number_format($row->Gia_san_pham); ?></span>
                                </td>   
                                <td>
                                    <input type="number" 
                                    name="so_luong[<?php echo $row->ID_san_pham;?>]" 
                                    value="<?php echo $cart[$row->ID_san_pham];?>"/>
                                </td>
                                <td>
                                    <?php echo number_format($cart[$row->ID_san_pham]*$row->Gia_san_pham); ?>
                                </td>
                                <td>
                                    <a href="delete_cart.php?id=<?php echo $row->ID_san_pham; ?>" class="remove" onclick="xac_nhan()">Xóa</i></a>
                                </td>                                
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan='4'>
                                <h4>Thành tiền</h4>
                                <div style="float:right">
                                <input type="submit" value="Cập nhật" class="btn btn-primary"/></div>
                                </td>
                                <td colspan='2'>
                                <h6><span><?php echo number_format($total); ?></span></h6>
                                <a href="checkout.php" style="color:red">Tiến hành thanh toán</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </section>
<script>
    function xac_nhan(){
        let thong_bao = confirm('Bạn có chắc chắn xóa hay không ?');
        if( thong_bao == false ){
            event.preventDefault();
        }
    }
</script>
<?php include 'layout/footer.php'; ?>