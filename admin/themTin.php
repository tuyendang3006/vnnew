<?php 
ob_start();
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1 ){
	header("localtion:../index.php");
	}
	
require "../lib/dbCon.php";
require "../lib/quantri.php";
?>

<?php
if(isset($_POST['btnThem'])){
	$TieuDe = $_POST["TieuDe"];
	$TieuDe_KhongDau = changeTitle($TieuDe);
	$TomTat = $_POST["TomTat"];
	$urlHinh = $_POST["urlHinh"];
	$Ngay = date("Y-m-d");
	$idUser = $_SESSION["idUser"];
	$Content = $_POST["Content"];
	$idLT = $_POST["idLT"];
		settype($idLT, "int");
	$idTL = $_POST["idTL"];
		settype($idTL, "int");
	$SoLanXem = 0;
	$TinNoiBat = $_POST["TinNoiBat"];
	$AnHien = $_POST["AnHien"];

	$qr = " INSERT INTO tin
	        VALUE(null, '$TieuDe' , '$TieuDe_KhongDau' , '$TomTat ' , '$urlHinh' , '$Ngay', '$idUser', '$Content' , '$idLT' , '$idTL', '$SoLanXem' , '$TinNoiBat', '$AnHien')
	";
	$con = mysqli_connect("localhost", "root", "", "vnnew");
    mysqli_query($con,"SET NAMES 'utf8'");
	mysqli_query($con, $qr);
	header("location:listTin.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Project vnexpress.net PHP</title>
    <link rel="stylesheet" type="text/css" href="layout.css" />
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
    <script type="text/javascript">
		function BrowseServer( startupPath, functionData ){
			var finder = new CKFinder();
			finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
			finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
			finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
			finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
			//finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
			finder.popup(); // Bật cửa sổ CKFinder
		} //BrowseServer

		function SetFileField( fileUrl, data ){
			document.getElementById( data["selectActionData"] ).value = fileUrl;
		}
		function ShowThumbnails( fileUrl, data ){	
			var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
			document.getElementById( 'thumbnails' ).innerHTML +=
			'<div class="thumb">' +
			'<img src="' + fileUrl + '" />' +
			'<div class="caption">' +
			'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
			'</div>' +
			'</div>';
			document.getElementById( 'preview' ).style.display = "";
			return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
		}
	</script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
	<script>
	$(document).ready(function(){
		$("#idTL").change(function(){
			var id = $(this).val(); // Lay id hien co
			// use Ajax
			$.get("../loaitin.php", {idTL:id}, function(data){
				$("#idLT").html(data); 
			});
		});
	});
	</script>

</head>

<body>
    <table width="855" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td id="hangTieuDe">TRANG QUẢN TRỊ
        <div style="width:200px; float:right;">
		    <h3> Hello <?php echo $_SESSION["HoTen"] ?> </h3>
        </div>
        </td>
      </tr>
      <tr>
        <td id="hang2"><?php require "menu.php"; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
          <form id="form1" name="form1" method="post" action="">
            <table width="855" border="1" align="center"  cellspacing="0" cellpadding="0">
                <tr>
                    <td colspan="2" align="center">THÊM TIN</td>
                </tr>
				<tr>
                    <td>TieuDe</td>
                    <td><label for="TieuDe"></label>
                    <input type="text" name="TieuDe" id="TieuDe" size="50px"/></td>
                </tr>
                <tr>
                    <td>TomTat</td>
                    <td><label for="TomTat"></label>
                    <textarea name="TomTat" id="TomTat" cols="50" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>urlHinh</td>
                    <td><label for="urlHinh"></label>
                    <input type="text" name="urlHinh" id="urlHinh" />
                    <input onclick="BrowseServer('Images:/','urlHinh')"  type="button" name="btnChonFile" id="btnChonFile" value="Chọn file" /></td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td><label for="Content"></label>
                    <textarea name="Content" id="Content" cols="50" rows="5"></textarea>
                    <script type="text/javascript">
						var editor = CKEDITOR.replace( 'Content',{
							uiColor : '#9AB8F3', 
							language:'vi',
							//skin:'v2',
							filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
							filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
							filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
							filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
							filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
											
							toolbar:[
							['Source','-','Save','NewPage','Preview','-','Templates'],
							['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
							['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
							['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
							['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
							['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
							['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
							['Link','Unlink','Anchor'],
							['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
							['Styles','Format','Font','FontSize'],
							['TextColor','BGColor'],
							['Maximize', 'ShowBlocks','-','About']
							]
						});		
				    </script>
                    </td>
                </tr>
                <tr>
                    <td>idTL</td>
                    <td><label for="idLT"></label> 
					<label for="idTL"></label>
                    <select name="idTL" id="idTL">
						<?php
						$theloai = DanhSachTheLoai();
						while($row_theloai = mysqli_fetch_array($theloai) ){
						?>
						<option value="<?php echo $row_theloai['idTL'] ?>"><?php echo $row_theloai['TenTL'] ?></option>
						<?php
						}
						?>
                    </select></td>
                </tr>
                <tr>
                    <td>idLT</td>
                    <td><label for="idLT"></label>
                     <select name="idLT" id="idLT">                
						<?php
						$loaitin = DanhSachLoaiTin();
						while($row_loaitin = mysqli_fetch_array($loaitin) ){
						?>
						<option value="<?php echo $row_loaitin['idLT'] ?>"><?php echo $row_loaitin["Ten"] ?></option>
						<?php
						}
						?>
                    </select></td>
                </tr>
                <tr>
                    <td>TinNoiBat</td>
                    <td><p>
                    <label>
                    <input type="radio" name="TinNoiBat" value="radio" id="TinNoiBat_0" />
                    Nổi bật</label>
                <br/>
                    <label>
                    <input type="radio" name="TinNoiBat" value="radio" id="TinNoiBat_1" />
                    Bình thường</label>
                <br/>
                </p></td>
                </tr>
                <tr>
                    <td>AnHien<br /> </td>
                    <td><p>
                    <label>
                    <input type="radio" name="AnHien" value="1" id="AnHien_0" />
                    Hiện</label>
                    <br />
                    <label>
                    <input type="radio" name="AnHien" value="0" id="AnHien_1" />
                    Ẩn</label>
                    </p></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnThem" id="btnThem" value="Thêm" /></td>
                </tr>
            </table>
          </form>
         
    </body>
</html>