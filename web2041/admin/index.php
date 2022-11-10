<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/cart.php";
    include "../model/thongke.php";
    include "header.php";
    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch ($act) {
            case 'adddm':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai=$_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao="Thêm thành công";
                }
                
                include "danhmuc/add.php";
                break;
            case 'lisdm':
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if(isset($_GET['ma_loai'])&&($_GET['ma_loai']>0)){
                    delete_danhmuc($_GET['ma_loai']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'suadm':
                if(isset($_GET['ma_loai'])&&($_GET['ma_loai']>0)){
                    $dm=loadone_danhmuc($_GET['ma_loai']);
                }
                
                include "danhmuc/update.php";
                break;
            case 'updatedm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai=$_POST['tenloai'];
                    $ma_loai=$_POST['ma_loai'];
                    update_danhmuc($ma_loai,$tenloai);
                    $thongbao="Cập nhật thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
        /*sản phẩm*/
                case 'addsp':
                    if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                        $iddm=$_POST['ma_loai'];
                        $tensp=$_POST['tensp'];
                        $giasp=$_POST['giasp'];
                        $mota=$_POST['mota'];
                        $filename=$_FILES['hinh']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        if ($tensp == '' || $giasp == '' || $mota == '' || $filename == '') {
                            $thongbao = "Không Để Trống dữ liệu !";
                        } else if ($giasp < 0) {
                            $thongbao = "Giá sản phẩm phải lớn hơn 0 !";
                        } else {
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        } else {
                            //echo "Sorry, there was an error uploading your file.";
                        }
                        insert_sanpham($tensp,$giasp,$filename,$mota,$iddm);
                        $thongbao="Thêm thành công";
                    }
                }
                    $listdanhmuc=loadall_danhmuc();
                    include "sanpham/add.php";
                    break;
                case 'listsp':
                    if(isset($_POST['listok'])&&($_POST['listok'])){
                        $kyw=$_POST['kyw'];
                        $iddm=$_POST['ma_loai'];
                    }else{
                        $kyw='';
                        $iddm=0;
                    }
                    $listdanhmuc=loadall_danhmuc();
                    $listsanpham=loadall_sanpham($kyw,$iddm);
                    include "sanpham/list.php";
                    break;
                case 'xoasp':
                    if(isset($_GET['ma_sp'])&&($_GET['ma_sp']>0)){
                        delete_sanpham($_GET['ma_sp']);
                    }
                    $listsanpham=loadall_sanpham("",0);
                    include "sanpham/list.php";
                    break;
                case 'suasp':
                    if(isset($_GET['ma_sp'])&&($_GET['ma_sp']>0)){
                        $sanpham=loadone_sanpham($_GET['ma_sp']);
                    }
                    $listdanhmuc=loadall_danhmuc();
                    include "sanpham/update.php";
                    break;
                case 'updatesp':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $id=$_POST['id'];
                        $iddm=$_POST['ma_loai'];
                        $tensp=$_POST['tensp'];
                        $giasp=$_POST['giasp'];
                        $mota=$_POST['mota'];
                        $filename=$_FILES['hinh']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        } else {
                            //echo "Sorry, there was an error uploading your file.";
                        }
                        update_sanpham($id,$iddm,$tensp,$giasp,$mota,$filename);
                        $thongbao="Cập nhật thành công";
                    }
                    $listdanhmuc=loadall_danhmuc();
                    $listsanpham=loadall_sanpham("",0);
                    include "sanpham/list.php";
                    break;
                case 'dskh':
                    $listtaikhoan=loadall_taikhoan("",0);
                    include "taikhoan/list.php";
                    break;
                case 'xoatk':
                    if (isset($_GET['ma_kh']) && ($_GET['ma_kh'] > 0)) {
                        delete_taikhoan($_GET['ma_kh']);
                    }
                    $listtaikhoan = loadall_taikhoan("", 0);
                    include "taikhoan/list.php";
                    break;
                case 'dsbl':
                    $listbinhluan=loadall_binhluan(0);
                    include "binhluan/list.php";
                    break;
                case 'xoabl':
                    if(isset($_GET['ma_bl'])&&($_GET['ma_bl']>0)){
                        delete_binhluan($_GET['ma_bl']);
                    }
                    $listbinhluan=loadall_binhluan("",0);
                    include "binhluan/list.php";
                    break;
                case 'thongke':
                    $listthongke=loadall_thongke();
                    include "thongke/list.php";
                    break;
                case 'listbill':
                    if(isset($_POST['kyw'])&&($_POST['kyw'])!=""){
                        $kyw=$_POST['kyw'];
                    }else{
                        $kyw="";
                    }
                    $listbill=loadall_bill($kyw,0);
                    include "bill/listbill.php";
                    break;
                case 'bieudo':
                    $listthongke=loadall_thongke();
                    include "thongke/bieudo.php";
                    break;
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }
    
    include "footer.php";
?>