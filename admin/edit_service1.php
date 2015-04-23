<?php
$service = $pdo->query("SELECT * FROM articles WHERE ar_Id='".$_GET['id']."'");
$service = $service->fetch();

 if(isset($_GET['error']) && $_GET['error'] == "out_of_range"){$error = "Kích thước ảnh không được quá 5MB !";} else{$error = "Thêm tiêu chí mới";}
if(isset($_GET['error']) && $_GET['error'] == "invalid_file_format"){$error = "Ảnh không đúng định dạng !";}  else{$error = "Thêm tiêu chí mới";}
if(isset($_GET['error']) && $_GET['error'] == "no_image"){$error = "Mời chọn ảnh cho tin tức !";}  else{$error = "Thêm tiêu chí mới";}
?>
<script type="text/javascript">
function check()
{
       
        //kiểm tra thông số ô tên người cần đăng tin
	nguoidang = document.frmNEWS.title.value;
	if(nguoidang == "")
	{
		document.frmNEWS.title.style.background = '#FFDAB9';
		document.frmNEWS.title.focus();
		return;
	}else{
		document.frmNEWS.title.style.background = '';
	}
	//kiểm tra thông số ô mô tả ngắn cho tin tức
	mota = document.frmNEWS.description.value;
	if(mota == "")
	{
		document.frmNEWS.description.style.background = '#FFDAB9';
		document.frmNEWS.description.focus();
		return;
	}else{
		document.frmNEWS.description.style.background = '';
	}
	//kiểm tra thông số ô mô tả ngắn cho tin tức
	mota2 = document.frmNEWS.content.value;
	if(mota2 == "")
	{
		document.frmNEWS.content.style.background = '#FFDAB9';
		document.frmNEWS.content.focus();
		return;
	}else{
		document.frmNEWS.content.style.background = '';
	}
	//kiểm tra thông số ô mô tả ngắn cho tin tức
	mota1 = document.frmNEWS.picture.value;
	if(mota1 == "")
	{
		document.frmNEWS.picture.style.background = '#FFDAB9';
		document.frmNEWS.picture.focus();
		return;
	}else{
		document.frmNEWS.picture.style.background = '';
	}
	frmNEWS.submit();
}
</script>

<center><h2>..:<?php echo $error; ?>:..</h2></center>
<form id="frmNEWS" name="frmNEWS" action="xulisuaSERVICE.php" method="POST">
<div class="Group_Left">
<div class="dynamiclabel">
<input id="security" name="security" type="hidden" placeholder="Tiêu đề sản phẩm !" value="4">
<input id="id" name="id" type="hidden" placeholder="Tiêu đề sản phẩm !" value="<?php echo $service['ar_Id'] ?>">
                           <input id="title" name="title" type="text" placeholder="Tiêu đề !" value="<?php echo $service['ar_Name'] ?>">  <a style="color:white;">(*)</a>
                        </div>					
  <div class="dynamiclabel">
                           <textarea id="description" name="description"  placeholder="Mô tả !"><?php echo $service['ar_Description'] ?></textarea><a style="color:white;">(*)</a>
                        </div>
</div>
                         

<div class="Group_Right">
			
  <div class="dynamiclabel">
                           <textarea id="content" name="content"  placeholder="Nội dung !"><?php echo $service['ar_Content'] ?></textarea><a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <input id="picture" name="picture" type="text" placeholder="Biểu tượng !" value='<?php echo $service['ar_Picture'] ?>'>  <a style="color:white;">(*)</a>
    </div>
						<div class="dynamiclabel" style="color:white;">Hiển thị:
							<input type="radio" id="rdo" name="rdo" value="1" <?php if($service['ar_IsShow'] == 1){echo "checked";} ?> />Có &nbsp;&nbsp;
							<input type="radio" id="rdo" name="rdo" value="0" <?php if($service['ar_IsShow'] == 0){echo "checked";} ?> />Không &nbsp;&nbsp;
							<a style="color:white;">(*)</a>
						</div>
</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Cập nhật" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />


</div>
</form>