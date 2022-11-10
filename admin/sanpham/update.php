<?php
    if(is_array($sanpham)){
        extract($sanpham);
    }
    $hinhpath="../upload/".$hinh;
        if(is_file($hinhpath)){
            $hinh="<img src='".$hinhpath."' height='80' width='116'>";
        }else{
            $hinh="no photo";
        }
?>
<div class="row">
            <div class="row frmtitle"><h1>CẬP NHẬT LOẠI SẢN PHẨM</h1></div>
            <div class="row frmcontent">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                    <div class="row mb10">
                    <select name="ma_loai">
                        <option value="0" selected>Tất cả</option>
                        <?php
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                if($iddm==$ma_loai) $s="selected"; else $s="";
                                echo '<option value="'.$ma_loai.'" '.$s.'>'.$ten_loai.'</option>';
                            }
                        ?>
                    </select>
                    </div>
                    <div class="row mb10">
                        Tên sản phẩm <br>
                        <input type="text" name="tensp" value="<?=$ten_sp?>">
                    </div>
                    <div class="row mb10">
                        Giá <br>
                        <input type="text" name="giasp" value="<?=$don_gia?>">
                    </div>
                    <div class="row mb10">
                        Hình <br>
                        <input type="file" name="hinh">
                        <?=$hinh?>
                    </div>
                    <div class="row mb10">
                        Mô tả <br>
                        <textarea name="mota" cols="30" rows="10"><?=$mo_ta?></textarea>
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?=$ma_sp?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                         if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
            </form>
            </div>
        </div>
    </div>
