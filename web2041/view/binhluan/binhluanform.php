<?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/binhluan.php";
    $idpro=$_REQUEST['idpro'];
    $dsbl=loadall_binhluan($idpro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .binhluan table{
            width: 90%;
            margin-left: 5%;
        }
        .binhluan table td:nth-child(1){
            width: 50%;
        }
        .binhluan table td:nth-child(2){
            width: 20%;
        }
        .binhluan table td:nth-child(3){
            width: 30%;
        }
    </style>
</head>
<body>
<div class="row mb">
    <div class="boxtitle">BÌNH LUẬN</div>
    <div class="boxcontent binhluan">
        <table>
            <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    $sql = "SELECT kh.ho_ten FROM `binh_luan` bl INNER JOIN `khach_hang` kh on bl.ma_kh = kh.ma_kh WHERE bl.ma_kh = '$ma_kh';";
                    $ho_ten_kh = pdo_query($sql);
                    echo '<tr><td>'.$noi_dung.'</td>';
                    echo '<td>' . $ho_ten_kh[1]["ho_ten"] . '</td>';
                    echo '<td>'.$ngay_bl.'</td></tr>';
                }
            ?>
        </table>
    </div>
    <div class="boxfooter binhluanform">
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="idpro" value="<?=$idpro?>">
            <input type="text" name="noi_dung">
            <input type="submit" name="guibinhluan" value="Gửi bình luận">
        </form>
    </div>
    <?php
        if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
            $noi_dung=$_POST['noi_dung'];
            $idpro=$_POST['idpro'];
            $ma_kh=$_SESSION['user']['ma_kh'];
            $ngay_bl=date('h:i:sa d/m/Y');
            insert_binhluan($noi_dung,$ma_kh,$idpro,$ngay_bl);
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    ?>
</div>
</body>
</html>