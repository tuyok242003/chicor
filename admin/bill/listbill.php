<div class="row"> 
    <div class="row frmtitle mb"><h1>DANH SÁCH ĐƠN HÀNG</h1></div>   
    <form action="index.php?act=listbill" method="post">
        <input type="text" name="kyw" placeholder="Nhập mã đơn hàng">
        <input type="submit" name="listok" value="GO">
    </form>
    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>KHÁCH HÀNG</th>
                    <th>SỐ LƯỢNG HÀNG</th>
                    <th>GIÁ TRỊ ĐƠN HÀNG</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th>THAO TÁC</th>
                </tr>
                <?php
                    foreach ($listbill as $bill) {
                        extract($bill);
                        $kh=$bill["ten_kh"].'
                        <br> '.$bill["email"].'
                        <br> '.$bill["dia_chi"].'
                        <br> '.$bill["sdt"];
                        $ttdh=get_ttdh($bill["trang_thai"]);
                        $countsp=loadall_cart_count($bill["ma_hdct"]);
                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$bill['ma_hdct'].'</td>
                                <td>'.$kh.'</td>
                                <td>'.$countsp.'</td>
                                <td><strong>'.$bill['tong_tien'].'</strong></td>
                                <td>'.$ttdh.'</td>
                                <td>'.$bill['ngay_dat'].'</td>
                                <td><input type="button" value="Sửa"><input type="button" value="Xóa"></td>
                            </tr>';
                    }
                ?>
            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục chọn">
            <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>