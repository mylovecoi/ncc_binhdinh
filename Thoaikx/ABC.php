<html xmlns="http://www.w10.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>NCC</title>
	<style type="text/css">
		body {
			font: normal 14px time, serif;
		}

		table,
		p {
			width: 99%;
			margin: auto;
		}

		#tabcontent td,
		#tabcontent th {
			padding: 10px;
		}

		tr td:first-child {
			text-align: center;
		}

		@media print {
			.in {
				display: none !important;
			}
		}
	</style>
	<link rel="stylesheet" href="/thoaikx/buttonPro.css" />
</head>
<div class="in" style="margin-left: 900px;">
	<input type="submit" class="buttonPro medium blue" onclick="window.print()" value="In báo cáo" />
	<input type="button" class="buttonPro medium red" value="Thoát" onclick="window.location.href='<?php echo $_SERVER['HTTP_REFERER']; ?>'" />
</div>

<body>
	<?php
	require("$_SERVER[DOCUMENT_ROOT]/Main/connect.php");
	require("$_SERVER[DOCUMENT_ROOT]/Main/general.php");

	function dinhdangsoxx($so)
	{
		$kq = "";
		if ($so != 0)
			$kq = number_format($so);
		return $kq;
	}
	$tendv = "";
	$capql = "";
	if (isset($_POST['create'])) {
		$tendv = $_POST['xahuyen'];
		$capql = $_POST['quanly'];
	}
	?>
	<table cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td style="text-align: center;font-weight: bold;">BIỂU THỐNG KÊ SỐ LƯỢNG HỒ SƠ NGƯỜI CÓ CÔNG TRÊN PHẦN MỀM</td>
		</tr>
		<tr>
			<?php
			if ($capql == "Tỉnh")
				echo "<td  style='text-align: center;font-weight: bold;'>" . $tendv . "</td>";
			else if ($capql == "Huyện")
				echo "<td  style='text-align: center;font-weight: bold;'>Huyện (Thành phố) " . $tendv . "</td>";
			else if ($capql == "Xã")
				echo "<td  style='text-align: center;font-weight: bold;'>Xã(phường, thị trấn) " . $tendv . "</td>";
			?>
		</tr>
	</table>
	<?php
	$a_dshuyen = [];
	$sql_huyen = "Select tenhuyen From huyen";
	$qrsql_huyen = mysqli_query($con, $sql_huyen);
	while ($row = mysqli_fetch_array($qrsql_huyen)) {
		$a_dshuyen[] = $row[0];
	}

	?>
	<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
		<tr>
			<th width="5%">STT</th>
			<th width="29%">Hồ sơ Người có công với Cách mạng</th>
			<th width="6%">Tổng số</th>
			<?php
			for ($i = 0; $i < count($a_dshuyen); $i++) {
				echo "<th style='text-align: center;'>" . $a_dshuyen[$i] . "</th>";
			}
			?>

		</tr>
		<?php
		$sql1 = "Select count(idhsbm) as hs, huyen From hosobm Group by huyen";
		$qrsql1 = mysqli_query($con, $sql1);
		$a_hosobm = [];
		while ($row = mysqli_fetch_array($qrsql1)) {
			$a_hosobm[$row[1]] = $row[0];
		}
		echo "<tr>";
		echo "<td style='text-align: center;'>1</td>";
		echo "<td style='text-align: left;'>Hồ sơ Bà mẹ Việt Nam anh hùng</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_hosobm)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(isset($a_hosobm[$a_dshuyen[$i]]) ? $a_hosobm[$a_dshuyen[$i]] : 0) . "</td>";
		}
		echo "</tr>";

		//
		$sql2 = "Select count(idhsls) as hs,huyen From hosols Group by huyen";
		$qrsql2 = mysqli_query($con, $sql2);
		$a_hosols = [];
		while ($row = mysqli_fetch_array($qrsql2)) {
			$a_hosols[$row[1]] = $row[0];
		}
		echo "<tr>";
		echo "<td style='text-align: center;'>2</td>";
		echo "<td style='text-align: left;'>Hồ sơ Liệt sĩ</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_hosols)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(isset($a_hosols[$a_dshuyen[$i]]) ? $a_hosols[$a_dshuyen[$i]] : 0) . "</td>";
		}
		echo "</tr>";

		//
		$sql10 = "Select count(idhstb) as hs,huyen From hosotb Group by huyen";
		$qrsql10 = mysqli_query($con, $sql10);
		$a_hosotb = [];
		while ($row = mysqli_fetch_array($qrsql10)) {
			$a_hosotb[$row[1]] = $row[0];
		}

		echo "<tr>";
		echo "<td style='text-align: center;'>10</td>";
		echo "<td style='text-align: left;'>Hồ sơ Thương binh</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_hosotb)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(isset($a_hosotb[$a_dshuyen[$i]]) ? $a_hosotb[$a_dshuyen[$i]] : 0) . "</td>";
		}
		echo "</tr>";
		//
		$sql4 = "Select count(idhsbb) as hs,huyen From hosobb Group by huyen";
		$qrsql4 = mysqli_query($con, $sql4);
		$a_hosobb = [];
		while ($row = mysqli_fetch_array($qrsql4)) {
			$a_hosobb[$row[1]] = $row[0];
		}

		echo "<tr>";
		echo "<td style='text-align: center;'>4</td>";
		echo "<td style='text-align: left;'>Hồ sơ Bệnh binh</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_hosobb)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(isset($a_hosobb[$a_dshuyen[$i]]) ? $a_hosobb[$a_dshuyen[$i]] : 0) . "</td>";
		}
		echo "</tr>";
		//
		echo "<tr>";
		echo "<td style='text-align: center;'>5</td>";
		echo "<td style='text-align: left;'>Hồ sơ Nhiễm chất độc hóa học:</td>";
		echo "<td></td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td></td>";
		}
		echo "</tr>";
		//

		$sql5 = "Select count(idhshh) as hs,huyen From hosohh Group by huyen";
		$qrsql5 = mysqli_query($con, $sql5);
		$a_hosohh = [];
		while ($row = mysqli_fetch_array($qrsql5)) {
			$a_hosohh[$row[1]] = $row[0];
		}

		echo "<tr>";
		echo "<td style='text-align: center;'></td>";
		echo "<td style='text-align: left;'>-	Hồ sơ nhiễm CĐHH trực tiếp:</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_hosohh)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(isset($a_hosohh[$a_dshuyen[$i]]) ? $a_hosohh[$a_dshuyen[$i]] : 0) . "</td>";
		}
		echo "</tr>";
		//
		$sql51 = "Select count(idthannhanhh) as hs,huyen From thannhanhh where quanhe like 'Con' and tths <> 0 and qdtcsongay not like ', hưởng trợ cấp từ ' Group by huyen";
		$qrsql51 = mysqli_query($con, $sql51);
		$a_thannhanhh = [];
		while ($row = mysqli_fetch_array($qrsql51)) {
			$a_thannhanhh[$row[1]] = $row[0];
		}
		echo "<tr>";
		echo "<td style='text-align: center;'></td>";
		echo "<td style='text-align: left;'>-	Hồ sơ nhiễm CĐHH gián tiếp:</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_thannhanhh)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(isset($a_thannhanhh[$a_dshuyen[$i]]) ? $a_thannhanhh[$a_dshuyen[$i]] : 0) . "</td>";
		}
		echo "</tr>";
		//
		$sql6 = "Select count(idhskc) as hs,huyen From hosokc Group by huyen";
		$qrsql6 = mysqli_query($con, $sql6);
		$a_hosokc = [];
		while ($row = mysqli_fetch_array($qrsql6)) {
			$a_hosokc[$row[1]] = $row[0];
		}

		echo "<tr>";
		echo "<td style='text-align: center;'>6</td>";
		echo "<td style='text-align: left;'>Hồ sơ Người hoạt động kháng chiến</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_hosokc)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(isset($a_hosokc[$a_dshuyen[$i]]) ? $a_hosokc[$a_dshuyen[$i]] : 0) . "</td>";
		}
		echo "</tr>";
		//
		$sql7 = "Select count(idhstkn) as hs,huyen From hosotkn Group by huyen";
		$qrsql7 = mysqli_query($con, $sql7);
		$a_hosotkn = [];
		while ($row = mysqli_fetch_array($qrsql7)) {
			$a_hosotkn[$row[1]] = $row[0];
		}

		echo "<tr>";
		echo "<td style='text-align: center;'>7</td>";
		echo "<td style='text-align: left;'>Hồ sơ Tiền khởi nghĩa</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_hosotkn)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(isset($a_hosotkn[$a_dshuyen[$i]]) ? $a_hosotkn[$a_dshuyen[$i]] : 0) . "</td>";
		}
		echo "</tr>";
		//
		$sql8 = "Select count(idhslt) as hs,huyen From hosolt Group by huyen";
		$qrsql8 = mysqli_query($con, $sql8);
		$a_hosolt = [];
		while ($row = mysqli_fetch_array($qrsql8)) {
			$a_hosolt[$row[1]] = $row[0];
		}
		echo "<tr>";
		echo "<td style='text-align: center;'>8</td>";
		echo "<td style='text-align: left;'>Hồ sơ Lão thành cách mạng</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_hosolt)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(isset($a_hosolt[$a_dshuyen[$i]]) ? $a_hosolt[$a_dshuyen[$i]] : 0) . "</td>";
		}
		echo "</tr>";
		//
		$sql9 = "Select count(idhsah) as hs,huyen From hosoah Group by huyen";
		$qrsql9 = mysqli_query($con, $sql9);
		$a_hosoah = [];
		while ($row = mysqli_fetch_array($qrsql9)) {
			$a_hosoah[$row[1]] = $row[0];
		}
		echo "<tr>";
		echo "<td style='text-align: center;'>9</td>";
		echo "<td style='text-align: left;'>Hồ sơ Anh hùng</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_hosoah)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(isset($a_hosoah[$a_dshuyen[$i]]) ? $a_hosoah[$a_dshuyen[$i]] : 0) . "</td>";
		}
		echo "</tr>";
		//
		$sql10 = "Select count(idhstd) as hs,huyen From hosotd Group by huyen";
		$qrsql10 = mysqli_query($con, $sql10);
		$a_hosotd = [];
		while ($row = mysqli_fetch_array($qrsql10)) {
			$a_hosotd[$row[1]] = $row[0];
		}
		echo "<tr>";
		echo "<td style='text-align: center;'>10</td>";
		echo "<td style='text-align: left;'>Hồ sơ bị bắt, tù đày</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_hosotd)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(isset($a_hosotd[$a_dshuyen[$i]]) ? $a_hosotd[$a_dshuyen[$i]] : 0) . "</td>";
		}
		echo "</tr>";
		//
		$sql11 = "Select count(idhscc) as hs,huyen From hosocc Group by huyen";
		$qrsql11 = mysqli_query($con, $sql11);
		$a_hosocc = [];
		while ($row = mysqli_fetch_array($qrsql11)) {
			$a_hosocc[$row[1]] = $row[0];
		}

		echo "<tr>";
		echo "<td style='text-align: center;'>11</td>";
		echo "<td style='text-align: left;'>Hồ sơ NCC giúp đỡ CM</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_hosocc)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(isset($a_hosocc[$a_dshuyen[$i]]) ? $a_hosocc[$a_dshuyen[$i]] : 0) . "</td>";
		}
		echo "</tr>";
		//
		echo "<tr>";
		echo "<td style='text-align: center;'></td>";
		echo "<td style='text-align: left;'>Tổng số hồ sơ</td>";
		echo "<td style='text-align: right;'>" . dinhdangsoxx(array_sum($a_hosobm) +
			array_sum($a_hosols) + array_sum($a_hosotb) + array_sum($a_hosobb) +
			array_sum($a_hosohh) + array_sum($a_thannhanhh) + array_sum($a_hosokc) +
			array_sum($a_hosotkn) + array_sum($a_hosolt) + array_sum($a_hosoah) +
			array_sum($a_hosotd) + array_sum($a_hosocc)) . "</td>";
		for ($i = 0; $i < count($a_dshuyen); $i++) {
			echo "<td style='text-align: right;'>" . dinhdangsoxx(
				(isset($a_hosobm[$a_dshuyen[$i]]) ? $a_hosobm[$a_dshuyen[$i]] : 0) +
					(isset($a_hosols[$a_dshuyen[$i]]) ? $a_hosols[$a_dshuyen[$i]] : 0) +
					(isset($a_hosotb[$a_dshuyen[$i]]) ? $a_hosotb[$a_dshuyen[$i]] : 0) +
					(isset($a_hosobb[$a_dshuyen[$i]]) ? $a_hosobb[$a_dshuyen[$i]] : 0) +
					(isset($a_hosohh[$a_dshuyen[$i]]) ? $a_hosohh[$a_dshuyen[$i]] : 0) +
					(isset($a_thannhanhh[$a_dshuyen[$i]]) ? $a_thannhanhh[$a_dshuyen[$i]] : 0) +
					(isset($a_hosokc[$a_dshuyen[$i]]) ? $a_hosokc[$a_dshuyen[$i]] : 0) +
					(isset($a_hosotkn[$a_dshuyen[$i]]) ? $a_hosotkn[$a_dshuyen[$i]] : 0) +
					(isset($a_hosolt[$a_dshuyen[$i]]) ? $a_hosolt[$a_dshuyen[$i]] : 0) +
					(isset($a_hosoah[$a_dshuyen[$i]]) ? $a_hosoah[$a_dshuyen[$i]] : 0) +
					(isset($a_hosotd[$a_dshuyen[$i]]) ? $a_hosotd[$a_dshuyen[$i]] : 0) +
					(isset($a_hosocc[$a_dshuyen[$i]]) ? $a_hosocc[$a_dshuyen[$i]] : 0)
			) . "</td>";
		}
		echo "</tr>";
		?>
	</table>
	<table>
		<tr>
		</tr>
		<tr>
			<td width="50%"></td>
			<td width="50%" style="text-align: center;">............, ngày ... tháng ... năm ......</td>
		</tr>
	</table>
</body>

</html>