<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">ĐƠN HÀNG CỦA BẠN</div>
            <div class="row boxcontent cart">
                <table>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Số lượng mặt hàng</th>
                        <th>Tổng giá trị đơn hàng</th>
                        <th>Tình trạng đơn hàng</th>
                    </tr>
                    <?php
                        if(is_array($listbill)){
                            foreach ($listbill as $bill) {
                                extract($bill);
                                $ttdh=get_ttdh($bill['trang_thai']);
                                $countsp=loadall_cart_count($bill['ma_hdct']);
                                echo '<tr>
                                        <td>'.$bill['ma_hdct'].'</td>
                                        <td>'.$bill['ngay_dat'].'</td>
                                        <td>'.$countsp.'</td>
                                        <td>'.$bill['tong_tien'].'</td>
                                        <td>'.$ttdh.'</td>
                                    </tr>';
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="boxphai">
        <?php include "view/boxright.php";?>
    </div>
</div>