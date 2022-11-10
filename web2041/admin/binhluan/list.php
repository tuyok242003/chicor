<div class="row">
            <div class="row frmtitle"><h1>DANH SÁCH BÌNH LUẬN</h1></div>
            <div class="row frmcontent">
                <form action="#" method="post">
                    <div class="row mb10 frmdsloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>MÃ BL</th>
                                <th>TÊN SẢN PHẨM</th>
                                <th>NỘI DUNG</th>
                                <th>TÊN KH</th>
                                <th>NGÀY BL</th>
                                <th></th>
                            </tr>
                            <?php
                                 foreach($listbinhluan as $binhluan){
                                    extract($binhluan);
                                    $sql = "SELECT kh.ho_ten FROM `binh_luan` bl INNER JOIN `khach_hang` kh on bl.ma_kh = kh.ma_kh WHERE bl.ma_kh = '$ma_kh';";
                                    $ho_ten_kh = pdo_query($sql);

                                    $sql2 = "SELECT sp.ten_sp FROM `binh_luan` bl INNER JOIN `san_pham` sp on bl.idpro = sp.ma_sp WHERE bl.idpro = '$idpro';";
                                    $ten_sp = pdo_query($sql2);

                                    $xoabl="index.php?act=xoabl&ma_bl=".$ma_bl;
                                    echo '<tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>'.$ma_bl.'</td>
                                    <td width="10%">' . $ten_sp[0]["ten_sp"] . '</td>
                                    <td>'.$noi_dung.'</td>
                                    <td>'.$ho_ten_kh[0]["ho_ten"].'</td>
                                    <td>'.$ngay_bl.'</td>
                                    <td><a href="' . $xoabl . '" onclick="return confirm("Are you sure?");"><input type="button" value="Xóa"></a></td>
                                </tr>';
                                 }
                            ?>
                            
                        </table>
                    </div>
                    <div class="row mb10">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa các mục chọn">
                    </div>
                </form>
            </div>
        </div>