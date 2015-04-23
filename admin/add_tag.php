
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
<center><h2>..:Thêm Tag chung:..</h2></center>
<form id="frmSTAFF" name="frmSTAFF" action="xulithemTAG.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">
<div class="dynamiclabel">
<input id="security" name="security" type="hidden" placeholder="Tên Tag " value="1">
                           <input id="name" name="name" type="text" placeholder="Tên Tag " value=""><a style="color:white;">(*)</a>
                        </div>
</div>
              
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Thêm Tag" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />
</div>
</form>