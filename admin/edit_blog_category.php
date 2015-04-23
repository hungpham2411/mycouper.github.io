<?php

$blog_cate = $pdo->query("SELECT * FROM blog_categories WHERE bc_Id='".$_GET['id']."'");
$blog_cate = $blog_cate->fetch();

?>
<script type="text/javascript">
function check()
{
	//kiểm tra thông số ô tiêu đề tin tức
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

<center><h2>..:Sửa thông tin danh mục Blog:..</h2></center>
<form id="frmNEWS" name="frmNEWS" action="xulisuaBLOGCATEGORY.php" method="POST">
<div class="Group_Left">
<div class="dynamiclabel">
<input id="security" name="security" type="hidden" placeholder="Tiêu đề !" value="2">
<input id="id" name="id" type="hidden" placeholder="Tiêu đề !" value="<?php echo $blog_cate['bc_Id'] ?>">
                           <input id="title" name="title" type="text" placeholder="Tiêu đề !" value="<?php echo $blog_cate['bc_Name'] ?>">  <a style="color:white;">(*)</a>
                        </div>

</div>
                         

<div class="Group_Right">


<div class="dynamiclabel" style="color: white;"> Hiển thị: 
        <input type="radio" id="rdo" name="rdo" value="1" <?php if($blog_cate['bc_IsShow'] == 1){echo "checked";} ?> />Có &nbsp;&nbsp;
        <input type="radio" id="rdo" name="rdo" value="0" <?php if($blog_cate['bc_IsShow'] == 0){echo "checked";} ?> />Không &nbsp;&nbsp;
  <a style="color:white;">(*)</a>
    </div>
</div>

<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Cập nhật" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />


</div>
</form>