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

<center><h2>..:Thêm danh mục Blog:..</h2></center>
<form id="frmNEWS" name="frmNEWS" action="xulithemBLOGCATEGORY.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">
<div class="dynamiclabel">
<input id="security" name="security" type="hidden" placeholder="Tiêu đề !" value="1">
                           <input id="title" name="title" type="text" placeholder="Tiêu đề !">  <a style="color:white;">(*)</a>
                        </div>

</div>
                         

<div class="Group_Right">


<div class="dynamiclabel" style="color: white;"> Hiển thị: 
        <input type="radio" id="rdo" name="rdo" value="1" checked />Có &nbsp;&nbsp;
        <input type="radio" id="rdo" name="rdo" value="0" />Không &nbsp;&nbsp;
  <a style="color:white;">(*)</a>
    </div>
</div>

<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Thêm danh mục" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />


</div>
</form>