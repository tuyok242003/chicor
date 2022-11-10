<?php
    function insert_binhluan($noi_dung,$ma_kh,$idpro,$ngay_bl){
        $sql="insert into binh_luan(noi_dung,ma_kh,idpro,ngay_bl) values('$noi_dung','$ma_kh','$idpro','$ngay_bl')";
        pdo_execute($sql);
    }
    function loadall_binhluan($idpro){
        $sql="select * from binh_luan where 1";
        if($idpro>0) $sql.=" AND idpro='".$idpro."'";
        $sql.=" order by ma_bl desc";
        $listbl=pdo_query($sql);
        return $listbl;
    }
    function delete_binhluan($ma_bl){
        $sql="delete from binh_luan where ma_bl=".$ma_bl;
        pdo_query($sql);
    }
?>