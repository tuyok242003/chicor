<div class="row mb">
            <div class="boxtrai mr">
                <div class="row">
                    <div class="banner">
                        <!-- Slideshow container -->
                        <div class="slideshow-container">

                        <!-- Full-width images with number and caption text -->
                        <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="view/images/products/1015.jpg" style="width:50%">
                        <div class="text">Caption Text</div>
                        </div>

                        <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="view/images/products/1004.jpg" style="width:50%">
                        <div class="text">Caption Two</div>
                        </div>

                        <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="view/images/products/1061.png" style="width:50%">
                        <div class="text">Caption Three</div>
                        </div>

                        <!-- Next and previous buttons -->
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The dots/circles -->
                        <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $i=0;
                    foreach ($spnew as $sp) {
                        extract($sp);
                        $linksp="index.php?act=sanphamct&idsp=".$ma_sp;
                        $ha=$img_path.$hinh;
                        if(($i==2)||($i==5)||($i==8)){
                            $mr="";
                        }else{
                            $mr="mr";
                        }
                        echo '<div class="boxsp '.$mr.'">
                                <div class="row img"><a href="'.$linksp.'"><img src="'.$ha.'" alt=""></a></div>
                                <p id="dongia">$'.$don_gia.'</p>
                                <h3 id="tensp"><a href="'.$linksp.'">'.$ten_sp.'</a></h3>
                                <div class="btnaddtocart">
                                <form action="index.php?act=addtocart" method="post">
                                    <input type="hidden" name="ma_sp" value="'.$ma_sp.'">
                                    <input type="hidden" name="ten_sp" value="'.$ten_sp.'">
                                    <input type="hidden" name="hinh" value="'.$hinh.'">
                                    <input type="hidden" name="don_gia" value="'.$don_gia.'">
                                    <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                                </form>
                                </div>
                            </div>';
                            $i+=1;
                    }
                    ?>
                </div>
            </div>
            <div class="boxphai">
                <?php include "boxright.php";?>
            </div>
        </div>
<style>
    #dongia {
        font-weight: 700;
        font-size: 15px;
        color: red;
    }

    #tensp a {
        text-decoration: none;
        color: black;
    }
</style>