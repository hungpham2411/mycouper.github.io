<?php

$tag = $pdo->query("SELECT * FROM tags WHERE ta_Id='".$_GET['id']."'");
$tag = $tag->fetch();

?>
  <script type="text/javascript">
function check()
{
    ten = document.frmSTAFF.name.value;
	if(ten == "")
	{
		document.frmSTAFF.name.style.backgroundColor = '#FFDAB9';
         document.frmSTAFF.name.focus();
         return;
	}else{
		document.frmSTAFF.name.style.backgroundColor = '';
	}
	
	frmSTAFF.submit();
	
}
</script>
<center><h2>..:Sửa thông tin Tag:..</h2></center>
<form id="frmSTAFF" name="frmSTAFF" action="xulisuaTAG.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">
<div class="dynamiclabel">
<input id="security" name="security" type="hidden" placeholder="Tên Tag " value="2">
<input id="id" name="id" type="hidden" placeholder="Tên Tag " value="<?php echo $tag['ta_Id'] ?>">
                           <input id="name" name="name" type="text" placeholder="Tên Tag " value="<?php echo $tag['ta_Name'] ?>"><a style="color:white;">(*)</a>
                        </div>
</div>
              
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Cập nhật" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />
</div>
</form>