<div class="row">
            <div class="row frmtitle"><h1>DANH SÁCH LOẠI SẢN PHẨM</h1></div>
            <div class="row frmcontent">
                <form action="#" method="post">
                    <div class="row mb10 frmdsloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>MÃ LOẠI</th>
                                <th>TÊN LOẠI</th>
                                <th></th>
                            </tr>
                            <?php
                                 foreach($listdanhmuc as $danhmuc){
                                    extract($danhmuc);
                                    $suadm="index.php?act=suadm&ma_loai=".$ma_loai;
                                    $xoadm="index.php?act=xoadm&ma_loai=".$ma_loai;
                                    echo '<tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>'.$ma_loai.'</td>
                                    <td>'.$ten_loai.'</td>
                                    <td><a href="'.$suadm.'"><input type="button" value="Sửa"></a> <a href="'.$xoadm.'"><input type="button" value="Xóa"></a></td>
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