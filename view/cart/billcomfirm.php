<div class="row">
    <div class="row mb">
        <div class="boxtrai mr">
            <div class="row mb">
                <div class="boxtitle">CẢM ƠN</div>
                <div class="row boxcontent" style="text-align: center">
                    <h2>Cảm ơn quý khách đã đặt hàng!</h2>
                </div>
            </div>
            <?php
                if(isset($bill)&&(is_array($bill))){
                    extract($bill);
                }
            ?>
            <div class="row mb">
                <div class="boxtitle">THÔNG TIN ĐƠN HÀNG</div>
                <div class="row boxcontent" style="text-align: center">
                    <li>-Mã đơn hàng: <?=$bill['ma_hdct']?></li>
                    <li>-Ngày đặt hàng: <?=$bill['ngay_dat']?></li> 
                    <li>-Tổng đơn hàng: <?=$bill['tong_tien']?></li> 
                    <li>-Phương thức thanh toán: <?=$bill['pttt'] ? 'Trả tiền khi nhận hàng' : 'Thanh toán online' ?></li>
                </div>
            </div>
            <div class="row mb">
                <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
                <div class="row boxcontent billform">
                    <table>
                        <tr>
                            <td>Người đặt hàng</td>
                            <td><?=$bill['ten_kh']?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><?=$bill['dia_chi']?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?=$bill['email']?></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><?=$bill['sdt']?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row mb">
                <div class="boxtitle">CHI TIẾT GIỎ HÀNG</div>
                <div class="row boxcontent cart">
                    <table>
                        <?php
                            bill_chi_tiet($billct);
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="boxphai">
        <?php include "view/boxright.php";?>
    </div>
    </div>
</div>