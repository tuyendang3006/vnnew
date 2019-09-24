<?php 
ob_start();
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"]==1 ){
	header("localtion:../index.php");
}
	
require "../lib/dbCon.php";
require "../lib/quantri.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Project vnexpress.net PHP</title>
<link rel="stylesheet" type="text/css" href="layout.css" />
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
                    <td colspan="7" align="center">DANH SÁCH QUẢNG CÁO</td>
                </tr>
                <tr>
                    <td>idQC</td>
                    <td>vitri</td>
                    <td>MoTa</td>
                    <td>Url</td>
                    <td>urlHinh</td>
                    <td>SoLanClick</td>
                    <td><a href="themQuangCao.php">Thêm</a></td>
                </tr>
				
				<?php
			        $quangcao = DanhSachQuangCao() ;
			        while ($row_quangcao = mysqli_fetch_array($quangcao) ){
				    ob_start();
			    ?>
				
				<tr>
                    <td>{idQC}</td>
                    <td>{vitri}</td>
                    <td>{MoTa}</td>
                    <td>{Url}</td>
                    <td>{urlHinh}</td>
                    <td>{SoLanClick}</td>
                    <td><a href="suaQuangCao.php?idQC={idQC}">Sửa</a> -<a onclick="return confirm('Bạn có chắc là muốn xóa không ???')" href="xoaQuangCao.php?idQC={idQC}"> Xóa</a></td>
                </tr>
				
				<?php
			 		$s = ob_get_clean();
					$s = str_replace("{idQC}", $row_quangcao["idQC"], $s);
					$s = str_replace("{vitri}", $row_quangcao["vitri"], $s);
					$s = str_replace("{MoTa}", $row_quangcao["MoTa"], $s);
					$s = str_replace("{Url}", $row_quangcao["Url"], $s);
					$s = str_replace("{urlHinh}", $row_quangcao["urlHinh"], $s);
					$s = str_replace("{SoLanClick}", $row_quangcao["SoLanClick"], $s);
					echo $s;
			        }
				?>
            </table>
          </form>
          <p>&nbsp;</p>
        <p>&nbsp;</p></td>
      </tr>
    </table>
       
    </body>
</html>