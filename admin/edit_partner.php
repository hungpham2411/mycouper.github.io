<?php
$partner = $pdo->query("SELECT * FROM partners WHERE pa_Id='".$_GET['id']."'");
$partner = $partner->fetch();

 if(isset($_GET['error']) && $_GET['error'] == "out_of_range"){$error = "Kích thước ảnh không được quá 5MB !";} else{$error = "Sửa thông tin đối tác";}
if(isset($_GET['error']) && $_GET['error'] == "invalid_file_format"){$error = "Ảnh không đúng định dạng !";}  else{$error = "Sửa thông tin đối tác";}

?>
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

sdt = document.frmPR.phone.value;
    validatePhone = /^[0-9 ]{3,15}$/;
    testPhone = validatePhone.test(sdt);

    if(testPhone == false)
    {
         document.frmPR.phone.style.backgroundColor = '#FFDAB9';
         document.frmPR.phone.focus();
         return;
    }else{
         document.frmPR.phone.style.backgroundColor = '';
    }

	homthu = document.frmPR.email.value;
	homthuValid = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/;
	testHomthu = homthuValid.test(homthu);
	if(testHomthu == false)
	{
		document.frmPR.email.style.background = '#FFDAB9';
		document.frmPR.email.focus();
        return;
	}else{
		document.frmPR.email.style.background = '';
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
<center><h2>..:<?php echo $error; ?>:..</h2></center>
<form id="frmPR" name="frmPR" action="xulisuaPARTNER.php" method="POST"  enctype="multipart/form-data">
<div class="Group_Left">

<div class="dynamiclabel">
<input id="security" name="security" type="hidden" placeholder="Tên đối tác " value="2">
<input id="id" name="id" type="hidden" placeholder="Tên đối tác " value="<?php echo $partner['pa_Id'] ?>">
                           <input id="name" name="name" type="text" placeholder="Tên đối tác " value="<?php echo $partner['pa_Name'] ?>">  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <input id="address" name="address" type="text" placeholder="Địa chỉ đối tác " value="<?php echo $partner['pa_Address'] ?>">  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <input id="phone" name="phone" type="text" placeholder="SĐT đối tác " value="<?php echo $partner['pa_Phone'] ?>">  <a style="color:white;">(*)</a>
                        </div>
						<div class="dynamiclabel">
                           <input id="email" name="email" type="text" placeholder="Email đối tác " value="<?php echo $partner['pa_Email'] ?>">  <a style="color:white;">(*)</a>
                        </div>
  <div class="dynamiclabel">
                           <textarea id="description" maxlength="160" name="description"  placeholder="Mô tả về đối tác !"><?php echo $partner['pa_Description'] ?></textarea><a style="color:white;">(*)</a>
                        </div>
</div>
<div class="Group_Right">
<div class="dynamiclabel" style="color:white">
        Ảnh đại diện: <input type="file" id="picture" name="picture"  onchange="readURL(this);" />
		<input type="hidden" id="hpc" name="hpc" value="<?php echo $partner['pa_Picture'] ?>" />
    </div>
<div class="pre_img">
                             <span>
                                 <center><img class="prw_img" src="../public/images/partner/<?php echo $partner['pa_Picture'] ?>" alt="" width="95%" height="122"></center>
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
                    $('.prw_img,.activeImage').attr('src', e.target.result).width(450).height(122);

                    $('.activeImage').css('display', 'inline');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</br>
<div class="dynamiclabel" style="color: white;"> Hiển thị: 
        <input type="radio" id="rdo" name="rdo" value="1" <?php if($partner['pa_IsShow'] == 1){echo "checked";} ?> />Có &nbsp;&nbsp;
        <input type="radio" id="rdo" name="rdo" value="0" <?php if($partner['pa_IsShow'] == 0){echo "checked";} ?> />Không &nbsp;&nbsp;
  <a style="color:white;">(*)</a>
    </div>
</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Cập nhật" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />
</div>
</form>