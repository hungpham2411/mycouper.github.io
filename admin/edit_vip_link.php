<?php

$vip_link = $pdo->query("SELECT * FROM vip_link WHERE vl_Id='".$_GET['id']."'");
$vip_link = $vip_link->fetch();

?>
<script type="text/javascript">
function check()
{

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

<center><h2>..:Sửa liên kết:..</h2></center>
<form id="frmNEWS" name="frmNEWS" action="xulisuaVIPLINK.php" method="POST">
<div class="Group_Left">
<div class="dynamiclabel">
<input id="security" name="security" type="hidden" placeholder="Tiêu đề sản phẩm !" value="2">
<input id="id" name="id" type="hidden" placeholder="Tiêu đề sản phẩm !" value="<?php echo $vip_link['vl_Id'] ?>">
<input id="vip_id" name="vip_id" type="hidden" placeholder="Tiêu đề sản phẩm !" value="<?php echo $vip_link['vl_Vip'] ?>">
                           
                        </div>					
  <div class="dynamiclabel">
                           <textarea id="description" name="description"  placeholder="Đường dẫn ( bao gồm cả giao thức ) !"><?php echo $vip_link['vl_Link'] ?></textarea><a style="color:white;">(*)</a>
                        </div>
</div>
                         

<div class="Group_Right">
		
<div class="dynamiclabel">
                           <input id="picture" name="picture" type="text" placeholder="Biểu tượng !" value='<?php echo $vip_link['vl_Picture'] ?>'>  <a style="color:white;">(*)</a>
    </div>
						<div class="dynamiclabel" style="color:white;">Hiển thị:
							<input type="radio" id="rdo" name="rdo" value="1" <?php if($vip_link['vl_IsShow'] == 1){echo "checked";} ?> />Có &nbsp;&nbsp;
							<input type="radio" id="rdo" name="rdo" value="0" <?php if($vip_link['vl_IsShow'] == 0){echo "checked";} ?> />Không &nbsp;&nbsp;
							<a style="color:white;">(*)</a>
						</div>
</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Cập nhật" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />


</div>
</form>