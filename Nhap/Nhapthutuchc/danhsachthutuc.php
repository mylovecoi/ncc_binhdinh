<?php include("$_SERVER[DOCUMENT_ROOT]/Main/header.php");
include("$_SERVER[DOCUMENT_ROOT]/Main/general.php"); ?>	
<meta charset='utf-8' />										
<?php include("$_SERVER[DOCUMENT_ROOT]/Main/menu.php")?>
<?php include("$_SERVER[DOCUMENT_ROOT]/Main/header2.php"); ?>
<!--------- Header ----------->
<script src="/assets/News/jquery.min.js"></script>
<script src="/dist/jquery.inputmask.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/News/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="/assets/News/dataTables.fixedColumns.css">
	<style type="text/css" class="init">
	th, td { text-align: center; white-space: nowrap; }	
	</style>
	<script type="text/javascript" language="javascript" src="/assets/News/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="/assets/News/dataTables.fixedColumns.js"></script>
<style type="text/css" class="init">
		/* Ensure that the demo table scrolls */
		th, td { white-space: nowrap; }
		table > tbody > tr.highlight > td,
		table > tbody > tr.highlight > th {
		  background-color: pink !important;
		  color: red;
		}
</style>
<script type="text/javascript" language="javascript" class="init">
		$(document).ready(function() {  
	   $('table tbody tr').hover(function() {               
		  $(this).addClass('highlight');  
	   }, function() {  
		  $(this).removeClass('highlight');  
	   });  
	  
	});  
</script>
<script type="text/javascript" language="javascript" class="init">
			$(document).ready(function() 
			{  
			   $('table tbody tr').dblclick(function() 
			   { 
					if ($(this).find('td:last').text() == "ncc")
					{
						if ($(this).find('td:nth-child(7)').text()=="Người có công")
						{							
							jQuery('#modal-6').modal('show', {backdrop: 'static'});
							$("#hoten").val($(this).find('td:nth-child(2)').text());
							$("#phanloai").val($(this).find('td:nth-child(7)').text());
							$("#ngaysinh").val($(this).find('td:nth-child(3)').text());
							$("#gioitinh").val($(this).find('td:nth-child(8)').text());
							$("#loaidoituong").val($(this).find('td:nth-child(12)').text());
							$("#nguyenquan").val($(this).find('td:nth-child(9)').text());
							$("#truquan").val($(this).find('td:nth-child(10)').text());
							if ($(this).find('td:nth-child(27)').text()=="0000-00-00")
								$("#ngaylaphs").val("");
							else
								$("#ngaylaphs").val(ngaythang($(this).find('td:nth-child(27)').text()));
							$("#noidung").val($(this).find('td:nth-child(4)').text());
							$("#tralai").val($(this).find('td:nth-child(26)').text());
							$('#sTTKK').load('ajax_chinhsua.php?id_a='+$(this).find('td:nth-child(6)').text());
							$("#ttthutuchc").val($(this).find('td:nth-child(6)').text());
							$("#trangthai").val($(this).find('td:nth-child(5)').text());
							$("#phanloaihoso").val($(this).find('td:nth-child(28)').text());
						}
						else
						{
							jQuery('#modal-7').modal('show', {backdrop: 'static'});
							$('#sTTKKx').load('ajax_chinhsuatn.php?id_a='+$(this).find('td:nth-child(6)').text());
							$("#hotenx").val($(this).find('td:nth-child(2)').text());
							$("#phanloaix").val($(this).find('td:nth-child(7)').text());
							$("#ngaysinhx").val($(this).find('td:nth-child(3)').text());
							$("#gioitinhx").val($(this).find('td:nth-child(8)').text());
							$("#loaidoituongx").val($(this).find('td:nth-child(12)').text());
							$("#nguyenquanx").val($(this).find('td:nth-child(9)').text());
							$("#truquanx").val($(this).find('td:nth-child(10)').text());
							if ($(this).find('td:nth-child(27)').text()=="0000-00-00")
								$("#ngaylaphsx").val("");
							else
								$("#ngaylaphsx").val(ngaythang($(this).find('td:nth-child(27)').text()));
							$("#noidungx").val($(this).find('td:nth-child(4)').text());
							$("#tralaix").val($(this).find('td:nth-child(26)').text());
							$("#ttthutuchcx").val($(this).find('td:nth-child(6)').text());
							$("#trangthaix").val($(this).find('td:nth-child(5)').text());
							$("#phanloaihosox").val($(this).find('td:nth-child(28)').text());
							//
							$("#nguoihuongtn").val($(this).find('td:nth-child(13)').text());
							$("#ngaysinhtn").val($(this).find('td:nth-child(14)').text());
							$("#gioitinhtn").val($(this).find('td:nth-child(15)').text());
							$("#nguyenquantn").val($(this).find('td:nth-child(19)').text());
							$("#truquantn").val($(this).find('td:nth-child(20)').text());
							$("#quanhe").val($(this).find('td:nth-child(16)').text());
							
						}
					}					
			   }); 
			}
		    		  
		);
	// click
	$(document).ready(function() 
			{  
			   $('table tbody tr').click(function() 
			   { 
					if ($(this).find('td:last').text() == "ncc")
					{
						$("#ttthutuchc1").val($(this).find('td:nth-child(6)').text());
						$("#trangthai1").val($(this).find('td:nth-child(5)').text());
					}
			   }); 
			}
		    		  
		);
//
function ngaythang(giatri)
{
	kq ="";
	if(giatri!="0000/00/00")			
		kq = giatri.substr(8,2)+"/"+ giatri.substr(5,2)+"/"+giatri.substr(0,4);		
	return kq;
}	
//
$(document).ready(function() {
  $('#trang').change(function() {
		//alert(this.value);
		//$('#hsls').load('ajax_lietsy.php?id='+this.value);		
		//$('#thannhan').load('ajax_thannhan.php');
		//$('#giayto').load('ajax_giayto.php');	
		window.location.href="danhsachthutuc.php?id="+this.value+">0";
  });
 });

function showAjaxModalcds()
{		
	jQuery('#modal-9').modal('show', {backdrop: 'static'});
}
function showAjaxModalccd()
{		
	jQuery('#modal-5').modal('show', {backdrop: 'static'});
}
</script>
<script>
$(document).ready(function(){
    $(":input").inputmask();
});
</script>
<script>
	$(document).ready(function() {
	  $('#hhhh').click(function() {
	   giatri = kiemtrahschon(); 		
	   $("#sogiayto").val(giatri);
	  });
	 });
function kiemtrahschon() {

        var sohoso1 = '';
        $.each($('table tbody tr'), function(){	
			if ($(this).find('td:last').text() != "ncc")
				sohoso1 += $(this).find('td:nth-child(2)').text() + "<" + $(this).find('td:nth-child(3)').text() + '<' + $(this).find('td:nth-child(4)').text() + '>';
        });
        return sohoso1;
    }
	
	$(document).ready(function() {
	  $('#hhhhx').click(function() {
	   giatri = kiemtrahschonx(); 		
	   $("#sogiaytox").val(giatri);
	  });
	 });
function kiemtrahschonx() {

        var sohoso1 = '';
        $.each($('table tbody tr'), function(){	
			if ($(this).find('td:last').text() != "ncc")
				sohoso1 += $(this).find('td:nth-child(2)').text() + "<" + $(this).find('td:nth-child(3)').text() + '<' + $(this).find('td:nth-child(4)').text() + '>';
        });
        return sohoso1;
    }	 
</script>
<script type="text/javascript">
	$(document).ready(function() {
	  $('#hhhh1').click(function() {
	   giatri = kiemtrahschon1();   
	   $("#sobg1").val(giatri);	   
	  });
	 });	
	function kiemtrahschon1() {

        var sohoso = '';

        $.each($("input[name='KT']:checked"), function(){
            sohoso += ($(this).attr('id')) + '>';
        });
        return sohoso;
    }
</script>
<?php
function doingay1($ngay)
{		
		$kq = substr($ngay,6,4) ."/". substr($ngay,3,2) . "/". substr($ngay,0,2);		
		return $kq;
}
if (isset($_POST['chuyenhuyen']))
{	
	$key=explode('>',$_POST['sobg1']);
	$chars=str_split($_POST["sobg1"]);
	$count=0;
	foreach($chars as $char){
		if($char == '>'){
			$count++;
		}
	}
	$i=0;
	//echo $count;
	for($i=0;$i<$count;$i++){
		$kytu=explode('<',$key[$i]);
		if ($kytu[1]=="DK")
		{
			$sql="Update thutuchc Set trangthai='Chuyển 1' Where ttthutuchc=".$kytu[0];
			$kq=mysqli_query($con,$sql);
		}
	}
}	
if(isset($_POST["capnhat"]))
{
	if ($_POST['trangthai']=="Đăng ký" || $_POST['trangthai']=="Bị trả lại")
	{
		$sqlpt = "Update thutuchc Set phanloai='".$_POST['phanloai']."', hoten='".$_POST['hoten']."', ngaysinh='".$_POST['ngaysinh']."', ";
		$sqlpt = $sqlpt."gioitinh='".$_POST['gioitinh']."', nguyenquan='".$_POST['nguyenquan']."', truquan='".$_POST['truquan']."', noidung='".$_POST['noidung']."', ";
		$sqlpt = $sqlpt."loaidoituong='".$_POST['loaidoituong']."', trangthai='DK', ngaylaphs='".doingay1($_POST['ngaylaphs'])."', tralai='".$_POST['tralai']."', phanloaihoso='".$_POST['phanloaihoso']."'";
		$sqlpt = $sqlpt." Where ttthutuchc=".$_POST['ttthutuchc'];
		$kqpt=mysqli_query($con,$sqlpt);		
		$key=explode('>',$_POST['sogiayto']);
		$chars=str_split($_POST["sogiayto"]);
		//echo "hgjgj khk ".$_POST['sogiayto'];
		$count=0;
		foreach($chars as &$char)
		{
			if($char=='>')
			{
				$count++;
			}
		}
		$i=0;$sqlup="";
		for($i=0;$i<$count;$i++)
		{
			if ($key[$i] != "")
			{				
				$kytu=explode('<',$key[$i]);
				if ($kytu[0] != "")	
				{
					if ($kytu[2]=="")
					{
						$sqlup = "Insert into giaytothutuc Set ttthutuchc=".$_POST['ttthutuchc'].", tengiay='".$kytu[0]."', soluong=".kieudouble($kytu[1]);				
						$kq=mysqli_query($con,$sqlup);
					}
					else
					{
						if ($kytu[1]=="")
						{
							$sqlup = "Delete From giaytothutuc Where ttgttt=".$kytu[2];
							$kq=mysqli_query($con,$sqlup);							
						}
						else
						{
							$sqlup = "Update giaytothutuc Set tengiay='".$kytu[0]."', soluong=".kieudouble($kytu[1])." Where ttgttt=".$kytu[2];				
							$kq=mysqli_query($con,$sqlup);
						}
					}
				}
			}
		}
	}
}	
//
if(isset($_POST["capnhatx"]))
{
	if ($_POST['trangthaix']=="Đăng ký" || $_POST['trangthaix']=="Bị trả lại")
	{
		$sqlpt = "Update thutuchc Set phanloai='Thân nhân người có công', hoten='".$_POST['hotenx']."', ngaysinh='".$_POST['ngaysinhx']."', ";
		$sqlpt = $sqlpt."gioitinh='".$_POST['gioitinhx']."', nguyenquan='".$_POST['nguyenquanx']."', truquan='".$_POST['truquanx']."', noidung='".$_POST['noidungx']."', ";
		$sqlpt = $sqlpt."loaidoituong='".$_POST['loaidoituongx']."', trangthai='DK', xa='".$madv[0]."', huyen='".$madv[1]."', ngaylaphs='".doingay1($_POST['ngaylaphsx'])."', ";
		$sqlpt = $sqlpt."nguoihuongtn='".$_POST['nguoihuongtn']."', ngaysinhtn='".$_POST['ngaysinhtn']."', gioitinhtn='".$_POST['gioitinhtn']."', ";
		$sqlpt = $sqlpt."quanhe='".$_POST['quanhe']."', nguyenquantn='".$_POST['nguyenquantn']."', truquantn='".$_POST['truquantn']."', phanloaihoso='".$_POST['phanloaihosox']."'";
		$sqlpt = $sqlpt." Where ttthutuchc=".$_POST['ttthutuchcx'];
		$kqpt=mysqli_query($con,$sqlpt);
		
		$key=explode('>',$_POST['sogiaytox']);
		$chars=str_split($_POST["sogiaytox"]);
		//echo "hgjgj khk ".$_POST['sogiayto'];
		$count=0;
		foreach($chars as &$char)
		{
			if($char=='>')
			{
				$count++;
			}
		}
		$i=0;$sqlup="";
		for($i=0;$i<$count;$i++)
		{
			if ($key[$i] != "")
			{
				echo $key[$i];
				$kytu=explode('<',$key[$i]);
				if ($kytu[0] != "")	
				{
					if ($kytu[2]=="")
					{
						$sqlup = "Insert into giaytothutuc Set ttthutuchc=".$_POST['ttthutuchcx'].", tengiay='".$kytu[0]."', soluong=".kieudouble($kytu[1]);				
						$kq=mysqli_query($con,$sqlup);
					}
					else
					{
						if ($kytu[1]=="")
						{
							$sqlup = "Delete From giaytothutuc Where ttgttt=".$kytu[2];				
							$kq=mysqli_query($con,$sqlup);						
						}
						else
						{
							$sqlup = "Update giaytothutuc Set tengiay='".$kytu[0]."', soluong=".kieudouble($kytu[1])." Where ttgttt=".$kytu[2];				
							$kq=mysqli_query($con,$sqlup);
						}												
					}
				}
			}
		}
	}
}	
//
if(isset($_POST["xoahs"]))
{	
	if ($_POST['trangthai1']=="Đăng ký" || $_POST['trangthai1']=="Bị trả lại")
	{
		$sqlpt1="Delete From giaytothutuc Where ttthutuchc=".$_POST['ttthutuchc1'];		
		$kq1=mysqli_query($con,$sqlpt1);
		$sqlpt="Delete From thutuchc Where ttthutuchc=".$_POST['ttthutuchc1'];		
		$kq=mysqli_query($con,$sqlpt);
	}
}
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Danh sách hồ sơ xin hưởng trợ cấp</h4>
		</div>
			<div class="modal-body">
<form role='form' method='POST' class='form-horizontal form-groups-bordered'>				
		<a style = "float:right; background-color:rgb(83, 181, 166)" onclick="showAjaxModalcds();" class='btn btn-success'>
			<i class='entypo-pencil'></i>Chuyển hồ sơ
		</a>
		<a style = "float:right; background-color:rgb(83, 181, 166)" onclick="showAjaxModalccd();" class='btn btn-success'>
			<i class='entypo-pencil'></i>In hồ sơ đang giải quyết
		</a>
		<input name="ttthutuchc1" type="text" style="display:none" class="form-control" id="ttthutuchc1">
		<input name="trangthai1" type="text" style="display:none" class="form-control" id="trangthai1">
		<input style = "float:right; background-color:rgb(83, 181, 166)" type="submit" name="xoahs" class="btn btn-blue" value = "Xóa hồ sơ">
		<label class='col-sm-2'>Trang số:</label>
<?php
$ahs =$_GET['id'];
$j = $ahs;
		echo "<div  class='col-sm-2' style='margin-top:-7px'>";
			echo "<select style='margin-left:-90px;' name='trang' class='form-control' id='trang'>";
	$ls =  array(array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27"));		
	$cs=0;
	$sql="select * from thutuchc where xa='".$madv[0]."' and huyen='".$madv[1]."'";
	$sql1=mysqli_query($con,$sql);
	$kq = 0;$kq1 = 1;
	if ($j == 1)
		echo "<option selected='selected' value='$kq1'>$kq1</option>";
	else
		echo "<option value='$kq1'>$kq1</option>";
	while($row=mysqli_fetch_array($sql1)){					
		$ls[$cs][0] = $row['ttthutuchc'];
		$ls[$cs][1] = $row['phanloai'];
		$ls[$cs][2] = $row['hoten'];
		$ls[$cs][3] = $row['ngaysinh'];
		$ls[$cs][4] = $row['gioitinh'];
		$ls[$cs][5] = $row['nguyenquan'];
		$ls[$cs][6] = $row['truquan'];
		$ls[$cs][7] = $row['noidung'];
		$ls[$cs][8] = $row['ngayhuong'];
		$ls[$cs][9] = $row['loaidoituong'];
		$ls[$cs][10] = $row['nguoihuongtn'];
		$ls[$cs][11] = $row['ngaysinhtn'];
		$ls[$cs][12] = $row['gioitinhtn'];
		$ls[$cs][13] = $row['quanhe'];
		$ls[$cs][14] = $row['quyetdinh'];
		$ls[$cs][15] = $row['muctrocap'];
		$ls[$cs][16] = $row['nguyenquantn'];
		$ls[$cs][17] = $row['truquantn'];
		$ls[$cs][18] = $row['phucap'];
		$ls[$cs][19] = $row['truylinh'];
		$ls[$cs][20] = $row['trangthai'];
		$ls[$cs][21] = $row['xa'];
		$ls[$cs][22] = $row['huyen'];
		$ls[$cs][23] = $row['tths'];
		$ls[$cs][24] = $row['tralai'];
		$ls[$cs][25] = $row['ngaylaphs'];
		$ls[$cs][26] = $row['phanloaihoso'];
		$cs = $cs + 1;
	$kq=$kq + 1;
	if ($kq == 15)
	{
		$kq = 0;
		$kq1 = $kq1 + 1;
		if ($j == $kq1)	
			echo "<option selected='selected' value='$kq1'>$kq1</option>";	
		else
			echo "<option value='$kq1'>$kq1</option>";	
	}
	}
	//if ($j == 0)
		//echo "<option selected='selected' value='$kq1'>$kq1</option>";		
			echo "</select>";
		echo "</div>";
?>		
	<div id = "hsls" class="table-responsive">
		<table class="table table-hover table-striped table-bordered table-advanced tablesorter display" id="table-2">
			<thead>
				<tr>					
					<th style="background-color:rgb(54, 169, 224)" width="4%"><strong style='color:rgb(255, 255, 225)'>Chọn</strong></th>
					<th style="background-color:rgb(54, 169, 224)" width="15%"><strong style='color:rgb(255, 255, 225)'>Họ và tên</strong></th>
					<th style="background-color:rgb(54, 169, 224)" width="8%"><strong style='color:rgb(255, 255, 225)'>Ngày sinh</strong></th>
					<th style="background-color:rgb(54, 169, 224)" width="63%"><strong style='color:rgb(255, 255, 225)'>Nội dung xin hưởng</strong></th>
					<th style="background-color:rgb(54, 169, 224)" width="10%"><strong style='color:rgb(255, 255, 225)'>Trạng thái</strong></th>
					<th style="background-color:rgb(54, 169, 224); display:none" width="28%"><strong>ttthutuchc</strong></th>					
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>phanloai</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>gioitinh</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>nguyenquan</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>truquan</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>ngayhuong</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>loaidoituong</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>nguoihuongtn</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>ngaysinhtn</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>gioitinhtn</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>quanhe</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>quyetdinh</strong></th>					
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>muctrocap</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>nguyenquantn</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>truquantn</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>phucap</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>truylinh</strong></th>					
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>xa</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>huyen</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>tths</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>tralai</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>ngaylaphs</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>phanloaihoso</strong></th>
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>ncc</strong></th>
				</tr>				
			</thead>
			<tbody id="rowlist" class="rowlist">
<?php
			for($i=($j - 1)*15;$i<15*$j;$i++)
			{
				//$a = $i + 1;
				if ($i < $cs)
				{					
				echo "<tr>";					
					echo "<td><input type = 'Checkbox' name = 'KT' id = '".$ls[$i][0].'<'.$ls[$i][20]."' checked = 'checked'></td>";
					//if ($ls[$i][1]=="")
					echo "<td style='text-align: left;'>".$ls[$i][2]."</td>";
					echo "<td style='text-align: left;'>".$ls[$i][3]."</td>";
					echo "<td style='text-align: left;'>".$ls[$i][7]."</td>";
					if ($ls[$i][20]=="DK")
						echo "<td style='text-align: left;'>Đăng ký</td>";
					else if($ls[$i][20]=="Chuyển 1" || $ls[$i][20]=="Chuyển 2")
						echo "<td style='text-align: left;'>Đang xử lý</td>";
					else if($ls[$i][20]=="Duyệt")
						echo "<td style='text-align: left;'>Đã duyệt</td>";
					else if($ls[$i][20]=="Trả lại 1")
						echo "<td style='text-align: left;'>Bị trả lại</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][0]."</td>";					
					echo "<td style='text-align: left; display:none'>".$ls[$i][1]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][4]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][5]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][6]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][8]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][9]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][10]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][11]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][12]."</td>";	
					echo "<td style='text-align: left; display:none'>".$ls[$i][13]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][14]."</td>";					
					echo "<td style='text-align: left; display:none'>".$ls[$i][15]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][16]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][17]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][18]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][19]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][21]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][22]."</td>";	
					echo "<td style='text-align: left; display:none'>".$ls[$i][23]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][24]."</td>";					
					echo "<td style='text-align: left; display:none'>".$ls[$i][25]."</td>";
					echo "<td style='text-align: left; display:none'>".$ls[$i][26]."</td>";
					echo "<td style='text-align: left; display:none'>ncc</td>";
				echo "</tr>";
				}
			}
?>				
			</tbody>
		</table>
	</div>	
</form>	
<div class="modal fade" id="modal-6">
	<div class="modal-dialog">
		<div class="modal-content">				
			<div class="modal-body">				
<form name="thoaimoi" role='form' method='POST' class='form-horizontal form-groups-bordered'>
	<input name="xoa" type="text" style="display:none" class="form-control" id="xoa">	
	<h3><strong>Thông tin về đối tượng xin hưởng trợ cấp:</strong><button type="button" style = "float:right" class="btn btn-black" data-dismiss="modal">Đóng</button><input type="submit" name="capnhat" class="btn btn-info" value = "Cập nhật" style = "float:right" id = "hhhh"></h3>
	<legend></legend>
	<label for="field-3" class="col-sm-2 control-label">Họ và tên:</label>
	<div class="col-sm-4">
		<input name="hoten" type="text" class="form-control" id="hoten">
		<input name="phanloai" type="text" style="display:none" class="form-control" id="phanloai">
		<input name="sogiayto" type="text" style="display:none" class="form-control" id="sogiayto">
		<input name="ttthutuchc" type="text" style="display:none" class="form-control" id="ttthutuchc">		
		<input name="trangthai" type="text" style="display:none" class="form-control" id="trangthai">		
	</div>
	<label for="field-3" class="col-sm-2 control-label">Ngày sinh:</label>
	<div class="col-sm-4">
		<input name="ngaysinh" type="text" class="form-control" data-mask="date" id="ngaysinh">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Giới tính:</label>
	<div class="col-sm-4">
		<select name="gioitinh" id="gioitinh" class="form-control">
			<option value="Nam">Nam</option>
			<option value="Nữ">Nữ</option>
		</select>		
	</div>
	<label for="field-3" class="col-sm-2 control-label">Đối tượng:</label>
	<div class="col-sm-4">
		<select name="loaidoituong" id="loaidoituong" class="form-control">
			<option value="ah">Anh hùng lực lượng VTND, anh hùng lao động TKKC</option>
			<option value="bb">Bệnh binh</option>
			<option value="bm">Bà mẹ Việt Nam anh hùng</option>
			<option value="ls">Liệt sỹ</option>
			<option value="tb">Thương binh</option>
			<option value="hh">Người hđkc bị nhiễm chất độc hóa học</option>
			<option value="kc">Người hđkc giải phóng dân tộc, làm nghĩa vụ quốc tế được tặng huân, huy chương</option>
			<option value="cc">Người có công giúp đỡ cách mạng</option>
			<option value="td">Người hđkc bị địch bắt tù, đày</option>
			<option value="lt">Người hđcm trước ngày 01/01/1945</option>
			<option value="tkn">Người hđcm từ ngày 01/01/1945 đến khởi nghĩa tháng 8 năm 1945</option>			
			<option value=""></option>
		</select>		
	</div>
	<label for="field-3" class="col-sm-2 control-label">Nguyên quán:</label>
	<div class="col-sm-10">
		<input name="nguyenquan" type="text" class="form-control" id="nguyenquan">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Trú quán:</label>
	<div class="col-sm-10">		
		<input name="truquan" type="text" class="form-control" id="truquan">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Ngày lập hồ sơ:</label>
	<div class="col-sm-4">
		<input name="ngaylaphs" type="text" class="form-control" data-mask="date" id="ngaylaphs">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Phân loại hồ sơ:</label>
	<div class="col-sm-4">
		<select name="phanloaihoso" id="phanloaihoso" class="form-control">
			<option value="Hồ sơ xin hưởng trợ cấp">Hồ sơ xin hưởng trợ cấp</option>
			<option value="Hồ sơ báo giảm">Hồ sơ báo giảm</option>
		</select>		
	</div>
	<label for="field-3" class="col-sm-2 control-label">Nội dung hồ sơ:</label>
	<div class="col-sm-10">
		<input name="noidung" type="text" class="form-control" id="noidung">
	</div>	
	<label for="field-3" class="col-sm-2 control-label">Lý do trả hồ sơ:</label>
	<div class="col-sm-10">
		<input name="tralai" type="text" class="form-control" id="tralai">
	</div>
	<label>Chi tiết giấy tờ kèm theo:</label>
	<div id = "sTTKK" class="table-responsive">
		<table class="table table-hover table-striped table-bordered table-advanced tablesorter display" id="table-2">
			<thead>
				<tr>					
					<th style="background-color:rgb(54, 169, 224)" width="5%"><strong style='color:rgb(255, 255, 225)'>STT</strong></th>
					<th style="background-color:rgb(54, 169, 224)" width="50%"><strong style='color:rgb(255, 255, 225)'>Tên giấy tờ</strong></th>
					<th style="background-color:rgb(54, 169, 224)" width="8%"><strong style='color:rgb(255, 255, 225)'>Số lượng</strong></th>					
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>ttthutuchc</strong></th>
				</tr>				
			</thead>
			<tbody id="rowlist" class="rowlist">
			</tbody>
		</table>
	</div>	
</form>						
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-7">
	<div class="modal-dialog">
		<div class="modal-content">				
			<div class="modal-body">				
<form name="thoaimoix" role='form' method='POST' class='form-horizontal form-groups-bordered'>
	<input name="xoax" type="text" style="display:none" class="form-control" id="xoa">	
	<h3><strong>Thông tin về đối tượng xin hưởng trợ cấp:</strong><button type="button" style = "float:right" class="btn btn-black" data-dismiss="modal">Đóng</button><input type="submit" name="capnhatx" class="btn btn-info" value = "Cập nhật" style = "float:right" id = "hhhhx"></h3>
	<legend></legend>
	<label for="field-3" class="col-sm-2 control-label">Họ tên thân nhân:</label>
	<div class="col-sm-4">
		<input name="nguoihuongtn" type="text" class="form-control" id="nguoihuongtn">
		<input name="phanloaix" type="text" style="display:none" class="form-control" id="phanloaix">
		<input name="sogiaytox" type="text" style="display:none" class="form-control" id="sogiaytox">
		<input name="ttthutuchcx" type="text" style="display:none" class="form-control" id="ttthutuchcx">		
		<input name="trangthaix" type="text" style="display:none" class="form-control" id="trangthaix">		
	</div>
	<label for="field-3" class="col-sm-2 control-label">Ngày sinh:</label>
	<div class="col-sm-4">
		<input name="ngaysinhtn" type="text" class="form-control" data-mask="date" id="ngaysinhtn">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Giới tính:</label>
	<div class="col-sm-4">
		<select name="gioitinhtn" id="gioitinhtn" class="form-control">
			<option value="Nam">Nam</option>
			<option value="Nữ">Nữ</option>
		</select>		
	</div>	
	<label for="field-3" class="col-sm-2 control-label">Nguyên quán:</label>
	<div class="col-sm-4">
		<input name="nguyenquantn" type="text" class="form-control" id="nguyenquantn">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Trú quán:</label>
	<div class="col-sm-10">		
		<input name="truquantn" type="text" class="form-control" id="truquantn">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Quan hệ:</label>
	<div class="col-sm-4">		
		<input name="quanhe" type="text" class="form-control" id="quanhe">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Ngày lập hồ sơ:</label>
	<div class="col-sm-4">
		<input name="ngaylaphsx" type="text" class="form-control" data-mask="date" id="ngaylaphsx">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Phân loại hồ sơ:</label>
	<div class="col-sm-10">
		<select name="phanloaihosox" id="phanloaihosox" class="form-control">
			<option value="Hồ sơ xin hưởng trợ cấp">Hồ sơ xin hưởng trợ cấp</option>
			<option value="Hồ sơ báo giảm">Hồ sơ báo giảm</option>
		</select>		
	</div>
	<label for="field-3" class="col-sm-2 control-label">Nội dung hồ sơ:</label>
	<div class="col-sm-10">
		<input name="noidungx" type="text" class="form-control" id="noidungx">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Lý do trả hồ sơ:</label>
	<div class="col-sm-10">
		<input name="tralaix" type="text" class="form-control" id="tralaix">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Đối tượng:</label>
	<div class="col-sm-10">
		<select name="loaidoituongx" id="loaidoituongx" class="form-control">
			<option value="ah">Anh hùng lực lượng VTND, anh hùng lao động TKKC</option>
			<option value="bb">Bệnh binh</option>
			<option value="bm">Bà mẹ Việt Nam anh hùng</option>
			<option value="ls">Liệt sỹ</option>
			<option value="tb">Thương binh</option>
			<option value="hh">Người hđkc bị nhiễm chất độc hóa học</option>
			<option value="kc">Người hđkc giải phóng dân tộc, làm nghĩa vụ quốc tế được tặng huân, huy chương</option>
			<option value="cc">Người có công giúp đỡ cách mạng</option>
			<option value="td">Người hđkc bị địch bắt tù, đày</option>
			<option value="lt">Người hđcm trước ngày 01/01/1945</option>
			<option value="tkn">Người hđcm từ ngày 01/01/1945 đến khởi nghĩa tháng 8 năm 1945</option>			
			<option value=""></option>
		</select>		
	</div>
	<label for="field-3" class="col-sm-2 control-label">Họ tên người có công:</label>
	<div class="col-sm-4">
		<input name="hotenx" type="text" class="form-control" id="hotenx">		
	</div>
	<label for="field-3" class="col-sm-2 control-label">Ngày sinh:</label>
	<div class="col-sm-4">
		<input name="ngaysinhx" type="text" class="form-control" data-mask="date" id="ngaysinhx">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Giới tính:</label>
	<div class="col-sm-4">
		<select name="gioitinhx" id="gioitinhx" class="form-control">
			<option value="Nam">Nam</option>
			<option value="Nữ">Nữ</option>
		</select>		
	</div>	
	<label for="field-3" class="col-sm-2 control-label">Nguyên quán:</label>
	<div class="col-sm-4">
		<input name="nguyenquanx" type="text" class="form-control" id="nguyenquanx">
	</div>
	<label for="field-3" class="col-sm-2 control-label">Trú quán:</label>
	<div class="col-sm-10">		
		<input name="truquanx" type="text" class="form-control" id="truquanx">
	</div>
	<label>Chi tiết giấy tờ kèm theo:</label>
	<div id = "sTTKKx" class="table-responsive">
		<table class="table table-hover table-striped table-bordered table-advanced tablesorter display" id="table-2">
			<thead>
				<tr>					
					<th style="background-color:rgb(54, 169, 224)" width="5%"><strong style='color:rgb(255, 255, 225)'>STT</strong></th>
					<th style="background-color:rgb(54, 169, 224)" width="50%"><strong style='color:rgb(255, 255, 225)'>Tên giấy tờ</strong></th>
					<th style="background-color:rgb(54, 169, 224)" width="8%"><strong style='color:rgb(255, 255, 225)'>Số lượng</strong></th>					
					<th style="background-color:rgb(16, 78, 211); display:none" width="30%"><strong>ttthutuchc</strong></th>
				</tr>				
			</thead>
			<tbody id="rowlist" class="rowlist">
			</tbody>
		</table>
	</div>	
</form>						
			</div>
		</div>
	</div>
</div>
	<div class="modal fade" id="modal-9">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">				
					<form name="thoaichuyen" role='form' method='POST' enctype="multipart/form-data" class='form-horizontal form-groups-bordered'>
						<div id = "sTTKK" class="form-group">
							<h4 style = "text-align:center; color:rgb(10, 10, 10)">CHUYỂN DANH SÁCH XIN HƯỞNG TRỢ CẤP LÊN CẤP TRÊN</h4>	
							<h4 style = "text-align:center; color:rgb(10, 10, 10)">(Lưu ý)</h4>
							<label for="field-3" class="col-sm-12 control-label" style = "text-align: left;">-   Danh sách chuyển lên sẽ không chỉnh sửa được</label>
							<label for="field-3" class="col-sm-12 control-label" style = "text-align: left;">-   Nếu muốn chỉnh sửa cần yêu cầu cán bộ cấp trên chuyển trả lại</label>							
							<input name="sobg1" type="text" class="form-control" style = "Display:none;" id="sobg1">
						</div>
							<button type="button" class="btn btn-black" data-dismiss="modal">Đóng</button>
							<input type="submit" name="chuyenhuyen" class="btn btn-blue" value = "Cập nhật" id = "hhhh1">							
					</form>						
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-5">
	<div class="modal-dialog">
		<div class="modal-content">				
			<div class="modal-body">				
					<form name="thoaitao" role='form' method='POST' action="/Thoaikx/Danhsachhosodgq.php" class='form-horizontal form-groups-bordered'>
						<div id = "sTTKK1" class="form-group">											
							<label for="field-3" class="col-sm-3 control-label">Ngày lập hồ sơ từ:</label>
							<div class="col-sm-9">
								<input name="Tu" type="text" class="form-control" data-mask="date" id="Tu">
							</div>
							<label for="field-3" class="col-sm-3 control-label">Ngày lập hồ sơ đến:</label>
							<div class="col-sm-9">
								<input name="Den" type="text" class="form-control" data-mask="date" id="Den">
							</div>
						</div>
							<button type="button" class="btn btn-black" data-dismiss="modal">Đóng</button>
							<input type="submit" name="create" class="btn btn-blue" value = "Tạo báo cáo">
							<input name="tinhkx" type="text" style="display:none" class="form-control" id="tinhkx" value = "<?php echo $madv[0];?>">	
					</form>						
			</div>
		</div>
	</div>
</div>
<!------ FOOTER --------->
<?php include("$_SERVER[DOCUMENT_ROOT]/Main/footer.php"); ?>