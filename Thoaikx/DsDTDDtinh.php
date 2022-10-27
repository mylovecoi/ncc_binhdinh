<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>NCC</title>
    <style type="text/css">
        body {
            font: normal 14px time, serif;
        }

        table, p {
            width: 99%;
            margin: auto;
        }

        #tabcontent td, #tabcontent th {
            padding: 10px;
        }
        tr td:first-child {text-align: center;}
    @media print {
		   .in{
			  display: none !important;
		   }
		}
    </style>
	<link rel="stylesheet" href="/thoaikx/buttonPro.css"/>
</head>
<div class="in" style="margin-left: 900px;">
<input  type="submit" class="buttonPro medium blue" onclick="window.print()" value="In báo cáo"  />
<input type="button" class="buttonPro medium red" value="Thoát" onclick="window.location.href='<?php echo $_SERVER['HTTP_REFERER'];?>'" />	
</div>
<body>
<?php
$nambc = "";
$tenhuyen = "";
if(isset($_POST['create'])){
	$nambc = $_POST['nambc'];	
	$tenhuyen = $_POST['huyen'];
	$tenxa = $_POST['xa'];	
}
?>
    <table cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td style="text-align: left;font-weight: bold;">
				<nobr><?php echo $tenxa;?></nobr>
            </td>
            <td width="40%">
            </td>
			<td style="text-align: center; font-weight: bold;"><nobr>Mẫu số 01-CSSK</nobr></td>
        </tr>
		<tr>
			<td style="text-align: left;font-weight: bold;"><nobr>Sở Lao Động - Thương Binh Và Xã Hội</nobr></td>
			<td>
			</td>
			<td style="text-align: center;" ><nobr>(Ban hành theo thông tư liên tịch số 13/2014/TTLT-BLDTBXH-BTC </br>ngày 03/6/2014 của Bộ Lao động - Thương binh và Xã hôi, Bộ Tài chính)</nobr></td>
		</tr>
		</table>
		<table cellspacing="0" cellpadding="0" border="0">
		<tr>
            <td  style="text-align: center;font-weight: bold;">DANH SÁCH ĐỐI TƯỢNG ĐƯỢC ĐIỀU DƯỠNG</td>
		</tr>				
		<tr>
			<td style="text-align: center;font-weight: bold; font-style: italic;"> Năm: <?php echo $nambc;?></td>
		</tr>
	</table>
	<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
		<tr>
			<th  width="5%">STT</th>
			<th  width="25%">Họ và tên</th>
			<th  width="25%">Địa chỉ</th>
			<th  width="15%">Đối tượng</th>
			<th  width="10%">Tháng năm điều dưỡng lần trước liền kề</th>
			<th  width="10%">Tình trạng sức khỏe</th>
			<th  width="10%">Ghi chú</th>
		</tr>		
		<tr>
			<th style="font-weight: inherit;">1</th>
			<th style="font-weight: inherit;">2</th>
			<th style="font-weight: inherit;">3</th>
			<th style="font-weight: inherit;">4</th>
			<th style="font-weight: inherit;">5</th>
			<th style="font-weight: inherit;">6</th>
			<th style="font-weight: inherit;">7</th>
		</tr>
<?php 
//làm việc với cơ sở dữ liệu
// kết nối csdl
$cc = array();
require("$_SERVER[DOCUMENT_ROOT]/Main/connect.php");
require ("$_SERVER[DOCUMENT_ROOT]/Main/general.php");
$taptrung = 0;$tainha=0;$taptrung1 = 0;$tainha1=0;
$sntaptrung = 0;$sntainha=0;$sntaptrung1 = 0;$sntainha1=0;
$_sQLdv="Select distinct huyen from dieuduong where huyen Like '".$tenhuyen."%' and namdd = '".$nambc."'";
			
$_qdv=mysqli_query($con,$_sQLdv);
$_aDV=array();
while($_r=mysqli_fetch_array($_qdv)){
	$_aDV[]=array('ten'=>$_r['huyen']			
	);
}
//Duyệt từng đơn vị
$tongcong = 0;
foreach($_aDV as $_madv) {
//
	echo "<tr style='vertical-align:top;'>";
	echo "<td style='width:0px;height:24px;'></td>";
	echo "<td class='csDC952B64' colspan='18' style='border-top-style: none;border-left:#000000 1px solid;vertical-align:middle;font-weight: bold;'>$_madv[ten]</td>";
	echo "</tr>";
	echo "<tr style='vertical-align:top;'>";
	echo "<td style='width:0px;height:24px;'>A</td>";
	echo "<td class='csDC952B64' style='border-top-style: none;border-left:#000000 1px solid;vertical-align:middle;font-weight: bold;'>Người có công thuộc diện ĐD mỗi năm một lần</td>";
	echo "<td style='width:0px;height:24px;'></td>";
	echo "<td style='width:0px;height:24px;'></td>";
	echo "<td style='width:0px;height:24px;'></td>";
	echo "<td style='width:0px;height:24px;'></td>";
	echo "<td style='width:0px;height:24px;'></td>";
	echo "</tr>";	
//
	$ton = 0;
	$cs = 0;
	
//$sql = "Select hoten,truquan,namddlt,tinhtrangsk,doituong from dieuduong WHERE namdd = '$nambc' and chuyen = 'Chuyển 2' and loaidd = 'Một năm một lần' and xa = '$_madv[ten]' order by hoten";
$sql = "Select hoten,truquan,namddlt,tinhtrangsk,doituong,phanloaidd from dieuduong WHERE namdd = '$nambc' and chuyen = 'Chuyển 2' and loaidd = 'Một năm một lần' and huyen = '$_madv[ten]' order by hoten";
$qrsql = mysqli_query($con,$sql);
$cc = array();
while ($row = mysqli_fetch_array($qrsql)) {
		$cc[$cs] = array(0 => $row['hoten'],
				1 => $row['truquan'],
				2 => $row['doituong'],
				3 => $row['namddlt'],
				4 => $row['tinhtrangsk']);
		$cs++;
		if ($row['phanloaidd']=="Tập trung")
		{
			$taptrung=$taptrung+2220000;
			$sntaptrung=$sntaptrung+1;
		}
		else
		{
			$sntainha=$sntainha+1;
		}
	}	
	$stt = 0;
	foreach ($cc as $value) {
		$stt++;	
		$tongcong++;
		echo "<tr>";
		echo "<td style='text-align: center;'>$stt</td>";
		echo "<td style='text-align: left;'><nobr>".$value[0]."</nobr></td>";
		echo "<td style='text-align: left;'><nobr>".$value[1]."</nobr></td>";
		echo "<td style='text-align: left;'><nobr>".$value[2]."</nobr></td>";
		echo "<td style='text-align: left;'><nobr>".$value[3]."</nobr></td>";
		echo "<td style='text-align: left;'>" . $value[4] . "</td>";
		echo "<td style='text-align: left;'></td>";
		echo "</tr>";
	}
echo "<tr>";
echo "<td style='text-align: center;'></td>";
echo "<td style='text-align: center;font-weight: bold;'> Cộng: ".$stt." </td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "</tr>";
// nhóm B
echo "<tr style='vertical-align:top;'>";
	echo "<td style='width:0px;height:24px;'>B</td>";
	echo "<td class='csDC952B64' style='border-top-style: none;border-left:#000000 1px solid;vertical-align:middle;font-weight: bold;'>Người có công thuộc diện ĐD hai năm một lần</td>";
	echo "<td style='width:0px;height:24px;'></td>";
	echo "<td style='width:0px;height:24px;'></td>";
	echo "<td style='width:0px;height:24px;'></td>";
	echo "<td style='width:0px;height:24px;'></td>";
	echo "<td style='width:0px;height:24px;'></td>";
	echo "</tr>";	
//
	$ton = 0;
	$cs = 0;
//$sql = "Select hoten,truquan,namddlt,tinhtrangsk,doituong from dieuduong WHERE namdd = '$nambc' and chuyen = 'Chuyển 2' and loaidd = 'Hai năm một lần' and xa = '$_madv[ten]' "
//		. " order by hoten";
$sql = "Select hoten,truquan,namddlt,tinhtrangsk,doituong,phanloaidd from dieuduong WHERE namdd = '$nambc' and chuyen = 'Chuyển 2' and loaidd = 'Hai năm một lần' and huyen = '$_madv[ten]' order by hoten";
$qrsql = mysqli_query($con,$sql);
$cc = array();
while ($row = mysqli_fetch_array($qrsql)) {
		$cc[$cs] = array(0 => $row['hoten'],
				1 => $row['truquan'],
				2 => $row['doituong'],
				3 => $row['namddlt'],
				4 => $row['tinhtrangsk']);
		$cs++;
		if ($row['phanloaidd']=="Tập trung")
		{
			$taptrung1=$taptrung1+2220000;
			$sntaptrung1=$sntaptrung1+1;
		}
		else
		{
			$tainha1=$tainha1+1110000;
			$sntainha1=$sntainha1+1;
		}
	}
$stt = 0;
	foreach ($cc as $value) {
		$stt++;		
		$tongcong++;
		echo "<tr>";
		echo "<td style='text-align: center;'>$stt</td>";
		echo "<td style='text-align: left;'><nobr>".$value[0]."</nobr></td>";
		echo "<td style='text-align: left;'><nobr>".$value[1]."</nobr></td>";
		echo "<td style='text-align: left;'><nobr>".$value[2]."</nobr></td>";
		echo "<td style='text-align: left;'><nobr>".$value[3]."</nobr></td>";
		echo "<td style='text-align: left;'>" . $value[4] . "</td>";
		echo "<td style='text-align: left;'></td>";
		echo "</tr>";
	}
echo "<tr>";
echo "<td style='text-align: center;'></td>";
echo "<td style='text-align: center;font-weight: bold;'> Cộng: ".$stt." </td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "</tr>";
}
echo "<tr>";
echo "<td style='text-align: center;'></td>";
echo "<td style='text-align: center;font-weight: bold;'> Tổng cộng: ".$tongcong." </td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "<td style='text-align: right;font-weight: bold;'></td>";
echo "</tr>";
?>
	</table>
<table >
	<tr>	
	</tr>
	<tr>
		<td colspan = 2 width="30%" style="text-align: left;" >Tổng số đề nghị điều dưỡng trong năm: </td>
		<td width="10%" style="text-align: left;">Số người: <?php echo $sntaptrung+$sntainha+$sntaptrung1+$sntainha1;?></td>
		<td width="55%" style="text-align: left;">Số tiền: <?php echo dinhdangso($taptrung+$tainha+$taptrung1+$tainha1);?></td>
	</tr>	
	<tr>
		<td width="10%" style="text-align: left;">Trong đó:</td>
		<td width="20%" style="text-align: left;" > - Điều dưỡng tập trung: </td>
		<td width="10%" style="text-align: left;">Số người: <?php echo $sntaptrung+$sntainha;?></td>
		<td width="60%" style="text-align: left;">Số tiền: <?php echo dinhdangso($taptrung+$tainha);?></td>
	</tr>
	<tr>
		<td width="10%" style="text-align: left;"></td>
		<td width="20%" style="text-align: left;" > - Điều dưỡng tại nhà: </td>
		<td width="10%" style="text-align: left;">Số người: <?php echo $sntaptrung1+$sntainha1;?></td>
		<td width="60%" style="text-align: left;">Số tiền: <?php echo dinhdangso($taptrung1+$tainha1);?></td>
	</tr>
</table>

<table >
	<tr>
	
	</tr>
	<tr>
		<td width="50%"></td>
		<td width="50%" style="text-align: center;">............, ngày ... tháng ... năm ......</td>
	</tr>
	<tr>
		<td style="text-align: center;: center; font-weight: bold;">NGƯỜI LẬP DANH SÁCH</td>
		<td style="text-align: center; font-weight: bold;"> TRƯỞNG PHÒNG LAO ĐỘNG - THƯƠNG BINH VÀ XÃ HỘI</td>
	</tr>
	<tr>
		<td style="text-align: center; font-style: italic;">(Ký, ghi rõ họ và tên)</td>
		<td style="text-align: center; font-style: italic;">(Ký, ghi rõ họ và tên, đóng dấu)</td>
	</tr>
</table>
</body>		
</html>	