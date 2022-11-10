<div class="row">
            <div class="row frmtitle"><h1>DANH SÁCH TÀI KHOẢN</h1></div>
            <div class="row frmcontent">
                <form action="#" method="post">
                    <div class="row mb10 frmdsloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>MÃ TK</th>
                                <th>TÊN TK</th>
                                <th>MẬT KHẨU</th>
                                <th>EMAIL</th>
                                <th>ĐỊA CHỈ</th>
                                <th>ĐIỆN THOẠI</th>
                                <th>VAI TRÒ</th>
                                <th></th>
                            </tr>
                            <?php
                                 foreach($listtaikhoan as $taikhoan){
                                    extract($taikhoan);
                                    $xoatk="index.php?act=xoatk&ma_kh=".$ma_kh;
                                    echo '<tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>'.$ma_kh.'</td>
                                    <td>'.$ho_ten.'</td>
                                    <td>'.$mat_khau.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$dia_chi.'</td>
                                    <td>'.$sdt.'</td>
                                    <td>'.$vai_tro.'</td>
                                    <td><a href="'.$xoatk.'"><input type="button" value="Xóa"></a></td>
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
                </form>
            </div>
        </div>