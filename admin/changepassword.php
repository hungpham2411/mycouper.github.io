<?php

if(isset($_REQUEST['action']) && $_REQUEST['action']=="lack-informations"){

    $error = "Thiếu thông tin ! Vui lòng điền đầy đủ thông tin để tiếp tục ! ";

}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="password-wrong"){

    $error = "Mật khẩu hiện tại không đúng. Vui lòng kiểm tra lại !";

}

if(isset($_REQUEST['action']) && $_REQUEST['action']=="repeat-password-wrong"){

    $error = "Xác nhận mật khẩu mới không đúng. Vui lòng kiểm tra lại !";

}

if(isset($_REQUEST['action']) && $_REQUEST['action']=="success"){

    $error = "Thay đổi mật khẩu mới thành công !";

}

?>
<script type="text/javascript">
	function checkInfo()
	{
		matkhaucu = document.frm.old.value;
		if(matkhaucu == "")
		{
			document.frm.old.style.background = '#FFDAB9';
			document.frm.old.focus();
			return;
		}else{
			document.frm.old.style.background = '';
		}
		
		matkhaumoi = document.frm.new.value;
		if(matkhaumoi == "")
		{
			document.frm.new.style.background = '#FFDAB9';
			document.frm.new.focus();
			return;
		}else{
			document.frm.new.style.background = '';
		}
		
		nhaclaimatkhau = document.frm.repeat.value;
		if(nhaclaimatkhau == "")
		{
			document.frm.repeat.style.background = '#FFDAB9';
			document.frm.repeat.focus();
			return;
		}else{
			document.frm.repeat.style.background = '';
		}
		
		if(nhaclaimatkhau != matkhaumoi)
		{
			document.frm.repeat.style.background = '#FFDAB9';
			document.frm.repeat.focus();
			return;
		}else{
			document.frm.repeat.style.background = '';
		}
		
		document.frm.submit();
	}
</script>
<center><h2>..:Đổi mật khẩu:..</h2></center>
           <form id="frm" name="frm" action="xulidoimatkhau.php" method="POST"> <div class="Group_Left_Changepass">
                <div class="dynamiclabel">
					<input id="security" name="security" placeholder="Mật khẩu hiện tại" type="hidden" value="1">
                    <input id="old" name="old" placeholder="Mật khẩu hiện tại" type="password">  <a style="color:white;">(*)</a>
                </div>
                <div class="dynamiclabel">
                    <input id="new" name="new" placeholder="Mật khẩu mới" type="password">  <a style="color:white;">(*)</a>
                </div>
                <div class="dynamiclabel">
                    <input id="repeat" name="repeat" placeholder="Xác nhận mật khẩu mới" type="password">  <a style="color:white;">(*)</a>
                </div>
            </div>
                <center>
                <div class="Bao_btn">
                    <input class="btn1" id="Button1" name="Button1" type="button" onclick="return checkInfo();" value="Đổi mật khẩu" />
                    <input class="btn1" id="Button4" type="button" value="Ghi lại" onclick="this.form.reset();" /><br />
                    <span style="color:red;font-size:11px;"><?php echo $error; ?></span>
                </div>
            </center>
</div></form>