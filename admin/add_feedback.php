
<script type="text/javascript">
function check()
{
tieude = document.frmPR.name.value;
if(tieude == "")
{
document.frmPR.name.style.background = '#FFDAB9';
document.frmPR.name.focus();
return;
}else{
document.frmPR.name.style.background = '';
}

tieude1 = document.frmPR.address.value;
if(tieude1 == "")
{
document.frmPR.address.style.background = '#FFDAB9';
document.frmPR.address.focus();
return;
}else{
document.frmPR.address.style.background = '';
}

	tieude12 = document.frmPR.description.value;
if(tieude12 == "")
{
document.frmPR.description.style.background = '#FFDAB9';
document.frmPR.description.focus();
return;
}else{
document.frmPR.description.style.background = '';
}
	
frmPR.submit();

}
</script>
<center><h2>..:Thêm nhận xét:..</h2></center>
<form id="frmPR" name="frmPR" action="xulithemFEEDBACK.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">

<div class="dynamiclabel">
<input id="security" name="security" type="hidden" placeholder="Tên đối tác " value="1">
                           <input id="name" name="name" type="text" placeholder="Tên người nhận xét ">  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <input id="address" name="address" type="text" placeholder="Chức vụ ">  <a style="color:white;">(*)</a>
                        </div>
</div>
<div class="Group_Right">
  <div class="dynamiclabel">
                           <textarea id="description" name="description"  placeholder="Nội dung nhận xét !"></textarea><a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel" style="color: white;"> Hiển thị: 
        <input type="radio" id="rdo" name="rdo" value="1" checked />Có &nbsp;&nbsp;
        <input type="radio" id="rdo" name="rdo" value="0" />Không &nbsp;&nbsp;
  <a style="color:white;">(*)</a>
    </div>
</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Thêm mới" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />
</div>
</form>