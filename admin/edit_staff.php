<?php

$id = $_GET['id'];
$banner1 = $pdo->query("SELECT * FROM admins WHERE ad_Id='$id'");
$banner1 = $banner1->fetch();

if(isset($_GET['error']) && $_GET['error'] == "out_of_range"){$error="Kích thước ảnh không được quá 1MB !";}else{$error="Sửa thông tin quản trị viên";}
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
    validatePhone = /^[0-9 ]{3,12}$/;
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
	
	document.frmSTAFF.submit();
	
}
</script>
<center><h2>..:<?php echo $error; ?>:..</h2></center>
<form id="frmSTAFF" name="frmSTAFF"  action="xulisuaSTAFF.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">
<input id="id" name="id" type="hidden" placeholder="Your Id here !" value="<?php echo $banner1['ad_Id'] ?>">
<input id="security" name="security" type="hidden" placeholder="Your Id here !" value="2">
<div class="dynamiclabel" style="color:white">
       Ảnh đại diện: <input type="file" id="picture" name="picture" onchange="readURL(this);"/>
<input type="hidden" id="hpc" name="hpc" value="<?php echo $banner1['ad_Picture'] ?>" />
    </div>
<div class="pre_img">
                             <span>
                                 <center><img class="prw_img" src="images/<?php echo  $banner1['ad_Picture']  ?>"  alt="No Image" width="178" height="178"></center>
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
                    $('.prw_img,.activeImage').attr('src', e.target.result).width(178).height(178);

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
                           <input id="name" name="name" type="text" placeholder="Họ và tên !" value="<?php echo $banner1['ad_Name'] ?>"><a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <input id="address" name="address" type="text" placeholder="Địa chỉ liên lạc !" value="<?php echo $banner1['ad_Address'] ?>"><a style="color:white;">(*)</a>
                        </div>
  <div class="dynamiclabel">
                           <input id="phone" name="phone" type="text" placeholder="Số điện thoại !" value="<?php echo $banner1['ad_Phone'] ?>"><a style="color:white;">(*)</a>
                        </div>
  <div class="dynamiclabel">
                           <input type="text" id="email" name="email"  placeholder="Địa chỉ email !" value="<?php echo $banner1['ad_Email'] ?>"><a style="color:white;">(*)</a>
                        </div>
 <div class="dynamiclabel">
                           <input id="username" name="username" type="text" placeholder="Tài khoản đăng nhập !" value="<?php echo $banner1['ad_Username'] ?>" readonly="true"><a style="color:white;">(*)</a>
                        </div>
 <div class="dynamiclabel">
                           <input id="password" name="password" type="password" placeholder="Mật khẩu đăng nhập !" value="<?php echo $banner1['ad_Password'] ?>"><a style="color:white;">(*)</a>
                        </div>
 <div class="dynamiclabel" style="color:white">Quyền hạn:
                           <input id="position" name="position" type="radio" value="2" <?php if($banner1['ad_Permission']== 2){echo "checked";} ?> />Cao nhất &nbsp;&nbsp;
                           <input id="position" name="position" type="radio" value="1" <?php if($banner1['ad_Permission']== 1){echo "checked";} ?> />Thứ 2 &nbsp;&nbsp;
                           <input id="position" name="position" type="radio" value="0" <?php if($banner1['ad_Permission']== 0){echo "checked";} ?> />Bị khoá
<a style="color:white;">(*)</a>
                        </div>
  

</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Sửa thông tin" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />
</div>
</form>