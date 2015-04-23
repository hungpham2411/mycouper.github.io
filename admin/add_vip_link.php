
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

<center><h2>..:Thêm liên kết:..</h2></center>
<form id="frmNEWS" name="frmNEWS" action="xulithemVIPLINK.php" method="POST">
<div class="Group_Left">
<div class="dynamiclabel">
<input id="security" name="security" type="hidden" placeholder="Tiêu đề sản phẩm !" value="1">
<input id="vip_id" name="vip_id" type="hidden" placeholder="Tiêu đề sản phẩm !" value="<?php echo $_GET['id'] ?>">
                           
                        </div>					
  <div class="dynamiclabel">
                           <textarea id="description" name="description"  placeholder="Đường dẫn ( bao gồm cả giao thức ) !"></textarea><a style="color:white;">(*)</a>
                        </div>
</div>
                         

<div class="Group_Right">
		
<div class="dynamiclabel">
                           <input id="picture" name="picture" type="text" placeholder="Biểu tượng !" value=''>  <a style="color:white;">(*)</a>
    </div>
						<div class="dynamiclabel" style="color:white;">Hiển thị:
							<input type="radio" id="rdo" name="rdo" value="1" checked />Có &nbsp;&nbsp;
							<input type="radio" id="rdo" name="rdo" value="0" />Không &nbsp;&nbsp;
							<a style="color:white;">(*)</a>
						</div>
</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Thêm liên kết" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />


</div>
</form>