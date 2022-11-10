<?php
    function insert_khachhang($email,$ho_ten,$mat_khau){
        $sql="insert into khach_hang(email,ho_ten,mat_khau) values('$email','$ho_ten','$mat_khau')";
        pdo_execute($sql);
    }
    function checkuser($ho_ten,$mat_khau){
        $sql="select * from khach_hang where ho_ten='".$ho_ten."' AND mat_khau='".$mat_khau."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }
    function checkemail($email){
        $sql="select * from khach_hang where email='".$email."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }
    function update_taikhoan($ma_kh,$email,$ho_ten,$mat_khau,$dia_chi,$sdt, $filename){
        if ($filename != "")
            $sql = "update khach_hang set `email`='" . $email . "',`ho_ten`='" . $ho_ten . "',`mat_khau`='" . $mat_khau . "',`dia_chi`='" . $dia_chi . "',`sdt`='" . $sdt . "',`hinh`='" . $filename . "' where `ma_kh`='" . $ma_kh . "';";
        else
            $sql = "update khach_hang set `email`='" . $email . "',`ho_ten`='" . $ho_ten . "',`mat_khau`='" . $mat_khau . "',`dia_chi`='" . $dia_chi . "',`sdt`='" . $sdt . "' where `ma_kh`='" . $ma_kh . "';";
            pdo_execute($sql);
    }
    function loadall_taikhoan(){
        $sql="select * from khach_hang order by ma_kh desc";
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
    }
    function delete_taikhoan($ma_kh)
    {
    $sql = "DELETE FROM khach_hang WHERE `khach_hang`.`ma_kh` = '$ma_kh'";
    pdo_query($sql);
    }

?>