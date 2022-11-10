<?php
    session_start();
    include "model/pdo.php";
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include "model/taikhoan.php";
    include "model/cart.php";
    include "view/header.php";
    include "global.php";
    if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];
    $spnew=loadall_sanpham_home();
    $dsdm=loadall_danhmuc();
    $dstop10=loadall_sanpham_top10();
    if((isset($_GET['act']))&&($_GET['act'])!=""){
        $act=$_GET['act'];
        switch ($act) {
            case 'sanpham':
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw=$_POST['kyw'];
                }else{
                    $kyw="";
                }
                if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                    $iddm=$_GET['iddm'];
                    
                }else{
                    $iddm=0;
                }
                $dssp=loadall_sanpham($kyw,$iddm);
                $tendm=load_ten_dm($iddm);
                include "view/sanpham.php";
                break;
            case 'sanphamct':
                if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                    $id=$_GET['idsp'];
                    $onesp=loadone_sanpham($id);
                    extract($onesp);
                    $sp_cung_loai=load_sanpham_cungloai($id,$ma_loai);
                    include "view/sanphamct.php";
                }else{
                    include "view/home.php";
                }
                break;
            case 'dangky':
                if(isset($_POST['dangky'])&&($_POST['dangky']>0)){
                    $email=$_POST['email'];
                    $ho_ten=$_POST['user'];
                    $mat_khau=$_POST['pass'];
                    if ($email == '' || $ho_ten == '' || $mat_khau == '') {
                        $thongbao = "Đăng ký thất bại. Vui lòng không để trống dữ liệu!";
                    } else {
                        insert_khachhang($email, $ho_ten, $mat_khau);
                        $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để thực hiện chức năng bình luận hoặc đặt hàng!";
                    }
                }
                include "view/taikhoan/dangky.php";
                break;
            case 'dangnhap':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap']>0)){
                    $ho_ten=$_POST['user'];
                    $mat_khau=$_POST['pass'];
                    $checkuser=checkuser($ho_ten,$mat_khau);
                    if(is_array($checkuser)){
                        $_SESSION['user']=$checkuser;
                        header('location: index.php');
                    }else{
                        $thongbao="Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký!";
                    }
                }
                include "view/taikhoan/dangky.php";
                break;
            case 'edit_taikhoan':
                if(isset($_POST['capnhat'])&&($_POST['capnhat']>0)){
                    $email=$_POST['email'];
                    $ho_ten=$_POST['user'];
                    $mat_khau=$_POST['pass'];
                    $dia_chi=$_POST['dc'];
                    $sdt=$_POST['sdt'];
                    $ma_kh=$_POST['id'];
                    $filename = $_FILES['hinh']['name'];
                if ($_FILES["hinh"]["name"] != null) {
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], "upload/" . $_FILES['hinh']['name']);
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                    update_taikhoan($ma_kh,$email,$ho_ten,$mat_khau,$dia_chi,$sdt,$filename);
                    $_SESSION['user']=checkuser($ho_ten,$mat_khau);
                    header('location: index.php?act=edit_taikhoan');
                }
                include "view/taikhoan/edit_taikhoan.php";
                break;
            case 'quenmk':
                if(isset($_POST['guiemail'])&&($_POST['guiemail']>0)){
                    $email=$_POST['email'];
                    $checkemail=checkemail($email);
                    if(is_array($checkemail)){
                        $thongbao="Mật khẩu của bạn là: ".$checkemail['mat_khau'];
                    }else{
                        $thongbao="Email này không tồn tại";
                    }
                }
                include "view/taikhoan/quenmk.php";
                break;
            case 'gioithieu':
                include "view/gioithieu.php";
                break;
            case 'addtocart':
                if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                    $ma_sp=$_POST['ma_sp'];
                    $ten_sp=$_POST['ten_sp'];
                    $hinh=$_POST['hinh'];
                    $don_gia=$_POST['don_gia'];
                    $soluong=1;
                    $ttien=$soluong * $don_gia;
                    $spadd=[$ma_sp,$ten_sp,$hinh,$don_gia,$soluong,$ttien];
                    array_push($_SESSION['mycart'],$spadd);                    
                }
                include "view/cart/viewcart.php";
                break;
            case 'delcart':
                if(isset($_GET['idcart'])){
                    array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                }else{
                    $_SESSION['mycart']=[];
                }
                header('location: index.php?act=viewcart');
                break;
            case 'viewcart':
                include "view/cart/viewcart.php";
                break;
            case 'bill':
                include "view/cart/bill.php";
                break;
            case 'billcomfirm':
                if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
                    if(isset($_SESSION['user'])) $ma_kh=$_SESSION['user']['ma_kh'];
                    else $ma_kh=0;
                    $name=$_POST['ho_ten'];
                    $email=$_POST['email'];
                    $address=$_POST['dia_chi'];
                    $tel=$_POST['sdt'];
                    $pttt=$_POST['pttt'];
                    $ngaydathang=date('d/m/Y');
                    $tongdonhang=tongdonhang();
                    $ma_hdct=insert_hoa_don_chi_tiet($ma_kh,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang);
                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_hoa_don($_SESSION['user']['ma_kh'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$ma_hdct);
                    }
                    $_SESSION['cart']=[];
                }
                $bill=loadone_bill($ma_hdct);
                $billct=loadall_cart($ma_hdct);
                include "view/cart/billcomfirm.php";
                break;
            case 'mybill':
                $listbill=loadall_bill($_SESSION['user']['ma_kh']);
                include "view/cart/mybill.php";
                break;
            case 'thoat':
                session_unset();
                header('location: index.php');
                break;
            case 'lienhe':
            include "view/lienhe.php";
            break;
            default:
                include "view/home.php";
                break;
        }
    }else{
        include "view/home.php";
    }
    include "view/footer.php";
?>