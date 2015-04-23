<?php
$category = $pdo->query("SELECT * FROM categories WHERE cate_Id=".$_GET['id']." AND cate_UseFor=1");
$category = $category->fetch();

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
	
	frmNEWS.submit();
}
</script>

<center><h2>..:Sửa thông tin tiêu đề:..</h2></center>
<form id="frmNEWS" name="frmNEWS" action="xulisuaCATEGORY.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">
<div class="dynamiclabel">
<input id="security" name="security" type="hidden" placeholder="Tiêu đề danh mục !" value="2" />
<input id="id" name="id" type="hidden" placeholder="mã !" value="<?php echo $category['cate_Id'] ?>" />
                           <input id="title" name="title" type="text" placeholder="Tiêu đề danh mục !" value="<?php echo $category['cate_Name'] ?>">  <a style="color:white;">(*)</a>
                        </div>
</div>
                         


<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Sửa thông tin" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />


</div>
</form>