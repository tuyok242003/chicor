<?php
function viewcart($del){
    global $img_path;
    $tong=0;
    $i=0;
    if($del==1){
        $xoasp_th='<th>Thao tác</th>';
        $xoasp_td2='<td></td>';
    }else{
        $xoasp_th='';
        $xoasp_td2='';
    }
    echo '<tr>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            '.$xoasp_th.'   
        </tr>';
        foreach ($_SESSION['mycart'] as $cart) {
            $hinh=$img_path.$cart[2];
            $ttien=$cart[3]*$cart[4];
            $tong+=$ttien;
            if($del==1){
                $xoasp_td='<td><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a></td>';
            }else{
                $xoasp_td='';
            }
            echo'
                    <tr>
                    <td><img src="'.$hinh.'" alt="" height="80px"></td>
                    <td>'.$cart[1].'</td>
                    <td>'.$cart[3].'</td>
                    <td>'.$cart[4].'</td>
                    <td>'.$ttien.'</td>
                    '.$xoasp_td.'
                </tr>';
                $i+=1;
        }
        echo '<tr>
        <td colspan="4">Tổng đơn hàng</td>
        <td>'.$tong.'</td>
        '.$xoasp_td2.'
    </tr>';
}
function bill_chi_tiet($billct){
    global $img_path;
    $tong=0;
    $i=0;
    echo '<tr>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>';
        foreach ($billct as $cart) {
            $hinh=$img_path.$cart['hinh'];
            $tong+=$cart['thanhtien'];  
            echo'
                    <tr>
                    <td><img src="'.$hinh.'" alt="" height="80px"></td>
                    <td>'.$cart['ten_sp'].'</td>
                    <td>'.$cart['don_gia'].'</td>
                    <td>'.$cart['soluong'].'</td>
                    <td>'.$cart['thanhtien'].'</td>
                </tr>';
                $i+=1;
        }
        echo '<tr>
        <td colspan="4">Tổng đơn hàng</td>
        <td>'.$tong.'</td>
    </tr>';
}
function tongdonhang(){
    $tong=0;
        foreach ($_SESSION['mycart'] as $cart) {
            $ttien=$cart[3]*$cart[4];
            $tong+=$ttien;
        }
        return $tong;
}
function insert_hoa_don_chi_tiet($ma_kh,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang){
    $sql="insert into hoa_don_chi_tiet(ma_kh,ten_kh,email,dia_chi,sdt,pttt,ngay_dat,tong_tien) values('$ma_kh','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_hoa_don($ma_kh,$idpro,$hinh,$ten_sp,$don_gia,$soluong,$thanhtien,$ma_hdct){
    $sql="insert into hoa_don(ma_kh,idpro,hinh,ten_sp,don_gia,soluong,thanhtien,ma_hdct) values('$ma_kh','$idpro','$hinh','$ten_sp','$don_gia','$soluong','$thanhtien','$ma_hdct')";
    return pdo_execute($sql);
}
function loadone_bill($ma_hdct){
    $sql="select * from hoa_don_chi_tiet where ma_hdct=".$ma_hdct;
    $bill=pdo_query_one($sql);
    return $bill;
}
function loadall_cart($ma_hdct){
    $sql="select * from hoa_don where ma_hdct=".$ma_hdct;
    $bill=pdo_query($sql);
    return $bill;
}
function loadall_cart_count($ma_hdct){
    $sql="select * from hoa_don where ma_hdct=".$ma_hdct;
    $bill=pdo_query($sql);
    return sizeof($bill);
}
function loadall_bill($kyw="",$ma_kh=0){

    $sql="select * from hoa_don_chi_tiet where 1";
    if($ma_kh>0) $sql.=" AND ma_kh=".$ma_kh;
    if($kyw!="") $sql.=" AND ma_hdct like '%".$kyw."%'";
    $sql.=" order by ma_hdct desc";
    $listbill=pdo_query($sql);
    return $listbill;
}
function get_ttdh($n){
    switch ($n) {
        case '0':
           $tt="Đơn hàng mới";
            break;
        case '1':
            $tt="Đang xử lý";
                break;
        case '2':
            $tt="Đang giao hàng";
            break;
        case '3':
            $tt="Hoàn tất";
            break;
        default:
            $tt="Đơn hàng mới";
            break;
    }
    return $tt;
}
?>