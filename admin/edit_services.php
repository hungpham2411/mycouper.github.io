<?php
$project = $pdo->query("SELECT * FROM categories WHERE cate_Id=".$_GET['id']." AND cate_UseFor=2");
$project = $project->fetch();

?>

<script type="text/javascript">
function check()
{
	//kiểm tra thông số ô tiêu đề dự án
	tieude = document.frmNEWS.title.value;
	if(tieude == "")
	{
		document.frmNEWS.title.style.background = '#FFDAB9';
		document.frmNEWS.title.focus();
		return;
	}else{
		document.frmNEWS.title.style.background = '';
	}
	
	//kiểm tra thông số ô tiêu đề dự án
	tieude1 = document.frmNEWS.logo.value;
	if(tieude1 == "")
	{
		document.frmNEWS.logo.style.background = '#FFDAB9';
		document.frmNEWS.logo.focus();
		return;
	}else{
		document.frmNEWS.logo.style.background = '';
	}
	
	//kiểm tra thông số ô tiêu đề dự án
	tieude2 = document.frmNEWS.description.value;
	if(tieude2 == "")
	{
		document.frmNEWS.description.style.background = '#FFDAB9';
		document.frmNEWS.description.focus();
		return;
	}else{
		document.frmNEWS.description.style.background = '';
	}
	
	frmNEWS.submit();
}
</script>

<center><h2>..:Sửa thông tin dịch vụ:..</h2></center>
<form id="frmNEWS" name="frmNEWS" action="xulisuaCATEGORY.php" method="POST">
<div class="Group_Left">
<div class="dynamiclabel">
<input id="id" name="id" type="hidden" placeholder="Mã số dự án !" value="<?php echo $project['cate_Id'] ?>"> 
<input id="security" name="security" type="hidden" placeholder="Mã số dự án !" value="1"> 
                           <input id="title" name="title" type="text" placeholder="Tiêu đề !" value="<?php echo $project['cate_Name'] ?>">  <a style="color:white;">(*)</a>
                        </div>
    <div class="dynamiclabel">
                           <input id="logo" name="logo" type="text" placeholder="Biểu tượng !" value='<?php echo $project['cate_Logo']; ?>'>  <a style="color:white;">(*)</a>
                        </div>
</div>
                         

<div class="Group_Right">
						
<div class="dynamiclabel">
                           <textarea id="description" name="description"  placeholder="Mô tả !" cols="30" rows="20"><?php echo $project['cate_Description'] ?></textarea>  <a style="color:white;">(*)</a>
                        </div>
</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Sửa thông tin" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />
</div>
</form>