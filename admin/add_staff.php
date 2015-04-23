<?php
 if(isset($_GET['error']) && $_GET['error'] == "out_of_range"){$error = "Kích thước ảnh không được quá 1MB !";} else{$error = "Thêm quản trị viên";}
if(isset($_GET['error']) && $_GET['error'] == "invalid_file_format"){$error = "Ảnh không đúng định dạng. Hãy kiểm tra lại !";}  else{$error = "Thêm quản trị viên";}
if(isset($_GET['error']) && $_GET['error'] == "exist"){$error = "Tài khoản đã tồn tại. Hãy kiểm tra lại !";}  else{$error = "Thêm quản trị viên";}
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
	
	diachi = document.frmSTAFF.address.value;
	if(diachi == "")
	{
		document.frmSTAFF.address.style.backgroundColor = '#FFDAB9';
         document.frmSTAFF.address.focus();
         return;
	}else{
		document.frmSTAFF.address.style.backgroundColor = '';
	}
	
    sdt = document.frmSTAFF.phone.value;
    validatePhone = /^[0-9 ]{3,15}$/;
    testPhone = validatePhone.test(sdt);

    if(testPhone == false)
    {
         document.frmSTAFF.phone.style.backgroundColor = '#FFDAB9';
         document.frmSTAFF.phone.focus();
         return;
    }else{
         document.frmSTAFF.phone.style.backgroundColor = '';
    }

    homthu = document.frmSTAFF.email.value;
	homthuValid = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/;
	testHomthu = homthuValid.test(homthu);
	if(testHomthu == false)
	{
		document.frmSTAFF.email.style.background = '#FFDAB9';
		document.frmSTAFF.email.focus();
        return;
	}else{
		document.frmSTAFF.email.style.background = '';
	}
	
	taikhoan = document.frmSTAFF.username.value;
	taikhoanValid = /^\w+$/
	testTaikhoan = taikhoanValid.test(taikhoan);
	if(testTaikhoan == false)
	{
		document.frmSTAFF.username.style.background = '#FFDAB9';
		document.frmSTAFF.username.focus();
        return;
	}else{
		document.frmSTAFF.username.style.background = '';
	}
	
	matkhau = document.frmSTAFF.password.value;
	matkhauValid = /^\w+$/
	testMatkhau = matkhauValid.test(matkhau);
	if(testMatkhau == false)
	{
		document.frmSTAFF.password.style.background = '#FFDAB9';
		document.frmSTAFF.password.focus();
        return;
	}else{
		document.frmSTAFF.password.style.background = '';
	}
	
	frmSTAFF.submit();
	
}
</script>
<center><h2>..:<?php echo $error; ?>:..</h2></center>
<form id="frmSTAFF" name="frmSTAFF" action="xulithemSTAFF.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">
<div class="dynamiclabel" style="color:white;">Ảnh đại diện:<input type="file" id="picture" name="picture" onchange="readURL(this);"/>
    </div><br />
<div class="pre_img">
                             <span>
                                 <center><img class="prw_img" src="images/no-avatar.png"  alt="No Image" width="166" height="166"></center>
                             </span>
                         </div>
<script type="text/javascript">
        $(".imageSection button").click(function () {
            $(".imageSection img").removeClass("activeImage");
            $(this).parent().find("img").addClass("activeImage");
        });
        $(".imageSection:eq(0) img").addClass("activeImage");

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.prw_img,.activeImage').attr('src', e.target.result).width(166).height(166);

                    $('.activeImage').css('display', 'inline');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</br>
</div>
                         

<div class="Group_Right">
<div class="dynamiclabel">
                           <input id="name" name="name" type="text" placeholder="Họ và tên thật " value=""><a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <input id="address" name="address" type="text" placeholder="Địa chỉ liên lạc " value=""><a style="color:white;">(*)</a>
                        </div>
  <div class="dynamiclabel">
                           <input id="phone" name="phone" type="text" placeholder="Số điện thoại " value=""><a style="color:white;">(*)</a>
                        </div>
  <div class="dynamiclabel">
                           <input type="text" id="email" name="email"  placeholder="Địa chỉ email " value=""><a style="color:white;">(*)</a>
                        </div>

 <div class="dynamiclabel">
                           <input id="username" name="username" type="text" placeholder="Tài khoản đăng nhập " value=""><a style="color:white;">(*)</a>
                        </div>
 <div class="dynamiclabel">
                           <input id="password" name="password" type="password" placeholder="Mật khẩu đăng nhập " value=""><a style="color:white;">(*)</a>
                        </div>
 <div class="dynamiclabel" style="color:white">
Quyền hạn: 
<input type="radio" id="position" name="position" value="2" />Cao nhất &nbsp;&nbsp;
<input type="radio" id="position" name="position" value="1" checked="true" />Thứ 2 &nbsp;&nbsp;
<input type="radio" id="position" name="position" value="0" />Khoá &nbsp;&nbsp;                          
<a style="color:white;">(*)</a>
                        </div>
   

</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Hoàn thành" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />
</div>
</form>