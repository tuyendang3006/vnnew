<!-- box cat -->
<?php
$idLT = 3;
?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
		<?php 
            $tenloaitin = TenLoaiTin($idLT);
            $row_tenloaitin = mysqli_fetch_array($tenloaitin);
         ?>
        	<a href="#"><?php echo $row_tenloaitin['Ten'] ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
		    <?php
			$mottin = TinMoiNhat_TheoLoaiTin_Mottin($idLT);
			$row_mottin = mysqli_fetch_array($mottin);
			?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="#"> <?php echo $row_mottin['TieuDe']?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row_mottin['urlHinh']?>" align="left" />
                    <div class="des"> <?php echo $row_mottin['TomTat']?> </div>
                  
                  
                    <div class="clear"></div>
                   
				</div>
            </div>
            <div class="col2">
			<?php
			$tinmoi_bontin = TinMoiNhat_TheoLoaiTin_BonTin($idLT);
			while($row_tinmoi_bontin = mysqli_fetch_array($tinmoi_bontin)){
			?>
           <h3 class="tlq"><a href="#"><?php echo $row_tinmoi_bontin['TieuDe'] ?></a></h3>
            <?php
			}
			?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->

<!-- box cat -->
<?php
$idLT = 5;
?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
		<?php 
            $tenloaitin = TenLoaiTin($idLT);
            $row_tenloaitin = mysqli_fetch_array($tenloaitin);
         ?>
        	<a href="#"><?php echo $row_tenloaitin['Ten'] ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
		    <?php
			$mottin = TinMoiNhat_TheoLoaiTin_Mottin($idLT);
			$row_mottin = mysqli_fetch_array($mottin);
			?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="#"> <?php echo $row_mottin['TieuDe']?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row_mottin['urlHinh']?>" align="left" />
                    <div class="des"> <?php echo $row_mottin['TomTat']?> </div>
                  
                  
                    <div class="clear"></div>
                   
				</div>
            </div>
            <div class="col2">
			<?php
			$tinmoi_bontin = TinMoiNhat_TheoLoaiTin_BonTin($idLT);
			while($row_tinmoi_bontin = mysqli_fetch_array($tinmoi_bontin)){
			?>
           <h3 class="tlq"><a href="#"><?php echo $row_tinmoi_bontin['TieuDe'] ?></a></h3>
            <?php
			}
			?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->

<!-- box cat -->
<?php
$idLT = 10;
?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
		<?php 
            $tenloaitin = TenLoaiTin($idLT);
            $row_tenloaitin = mysqli_fetch_array($tenloaitin);
         ?>
        	<a href="#"><?php echo $row_tenloaitin['Ten'] ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
		    <?php
			$mottin = TinMoiNhat_TheoLoaiTin_Mottin($idLT);
			$row_mottin = mysqli_fetch_array($mottin);
			?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="#"> <?php echo $row_mottin['TieuDe']?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row_mottin['urlHinh']?>" align="left" />
                    <div class="des"> <?php echo $row_mottin['TomTat']?> </div>
                  
                  
                    <div class="clear"></div>
                   
				</div>
            </div>
            <div class="col2">
			<?php
			$tinmoi_bontin = TinMoiNhat_TheoLoaiTin_BonTin($idLT);
			while($row_tinmoi_bontin = mysqli_fetch_array($tinmoi_bontin)){
			?>
           <h3 class="tlq"><a href="#"><?php echo $row_tinmoi_bontin['TieuDe'] ?></a></h3>
            <?php
			}
			?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->

