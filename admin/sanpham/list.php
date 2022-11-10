<div class="row">
            <div class="row frmtitle mb"><h1>DANH SÁCH SẢN PHẨM</h1></div>
            <form action="index.php?act=listsp" method="post">
                <input type="text" name="kyw">
                <select name="ma_loai">
                    <option value="0" selected>Tất cả</option>
                    <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="'.$ma_loai.'">'.$ten_loai.'</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="listok" value="Go">
            </form>
            <div class="row frmcontent">
                    <div class="row mb10 frmdsloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>MÃ SẢN PHẨM</th>
                                <th>TÊN SẢN PHẨM</th>
                                <th>HÌNH</th>
                                <th>GIÁ</th>
                                <th>LƯỢT XEM</th>
                                <th></th>
                            </tr>
                            <?php
                                 foreach($listsanpham as $sanpham){
                                    extract($sanpham);
                                    $suasp="index.php?act=suasp&ma_sp=".$ma_sp;
                                    $xoasp="index.php?act=xoasp&ma_sp=".$ma_sp;
                                    $hinhpath="../upload/".$hinh;
                                    if(is_file($hinhpath)){
                                        $hinh="<img src='".$hinhpath."' height='80' width='116'>";
                                    }else{
                                        $hinh="no photo";
                                    }
                                    echo '<tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>'.$ma_sp.'</td>
                                    <td>'.$ten_sp.'</td>
                                    <td>'.$hinh.'</td>
                                    <td>'.$don_gia.'</td>
                                    <td>'.$so_luot_xem.'</td>
                                    <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a> <a href="'.$xoasp.'"><input type="button" value="Xóa"></a></td>
                                </tr>';
                                 }
                            ?>
                            
                        </table>
                    </div>
                    <div class="row mb10">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa các mục chọn">
                        <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
                    </div>
            </div>
        </div>