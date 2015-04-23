<?php

$banner = $pdo->query("SELECT * FROM options");
$banner = $banner->fetch();

if(isset($_GET['error']) && $_GET['error']== "out_of_range"){$error="Ảnh không được quá 5MB !";}else{$error="Thông tin chung";}
if(isset($_GET['error']) && $_GET['error']== "invalid_file_format"){$error="Ảnh không đúng định dạng !";}else{$error="Thông tin chung";}
if(isset($_GET['action']) && $_GET['action'] == "success"){echo "<script>alert('Cập nhật thành công !')</script>";}
?>
<script type="text/javascript">
	function check()
	{
		congty = document.frm.company.value;
		if(congty == "")
		{
			document.frm.company.style.background='#FFDAB9';
			document.frm.company.focus();
			return;
		}else{
			document.frm.company.style.background='';
		}
		
		diachi = document.frm.address.value;
		if(diachi == "")
		{
			document.frm.address.style.background='#FFDAB9';
			document.frm.address.focus();
			return;
		}else{
			document.frm.address.style.background='';
		}
		
		dienthoai = document.frm.phone.value;
		dienthoaiValid = /^[0-9 ]{3,14}$/
		testDienthoai = dienthoaiValid.test(dienthoai);
		if(testDienthoai == false)
		{
			document.frm.phone.style.background='#FFDAB9';
			document.frm.phone.focus();
			return;
		}else{
			document.frm.phone.style.background='';
		}
		
		homthu = document.frm.email.value;
		homthuValid = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/;
		testHomthu = homthuValid.test(homthu);
		if(testHomthu == false)
		{
			document.frm.email.style.background = '#FFDAB9';
			document.frm.email.focus();
			return;
		}else{
			document.frm.email.style.background = '';
		}
		
		seotieude = document.frm.meta_title.value;
		if(seotieude == "")
		{
			document.frm.meta_title.style.background='#FFDAB9';
			document.frm.meta_title.focus();
			return;
		}else{
			document.frm.meta_title.style.background='';
		}
		
		seomota = document.frm.meta_description.value;
		if(seomota == "")
		{
			document.frm.meta_description.style.background='#FFDAB9';
			document.frm.meta_description.focus();
			return;
		}else{
			document.frm.meta_description.style.background='';
		}
		
		seotukhoa = document.frm.meta_keywords.value;
		if(seotukhoa == "")
		{
			document.frm.meta_keywords.style.background='#FFDAB9';
			document.frm.meta_keywords.focus();
			return;
		}else{
			document.frm.meta_keywords.style.background='';
		}
		
		seotukhoa1 = document.frm.youtube.value;
		if(seotukhoa1 == "")
		{
			document.frm.youtube.style.background='#FFDAB9';
			document.frm.youtube.focus();
			return;
		}else{
			document.frm.youtube.style.background='';
		}
		seotukhoa2 = document.frm.twitter.value;
		if(seotukhoa2 == "")
		{
			document.frm.twitter.style.background='#FFDAB9';
			document.frm.twitter.focus();
			return;
		}else{
			document.frm.twitter.style.background='';
		}
		seotukhoa3 = document.frm.facebook.value;
		if(seotukhoa3 == "")
		{
			document.frm.facebook.style.background='#FFDAB9';
			document.frm.facebook.focus();
			return;
		}else{
			document.frm.facebook.style.background='';
		}
		seotukhoa4 = document.frm.linkedin.value;
		if(seotukhoa4 == "")
		{
			document.frm.linkedin.style.background='#FFDAB9';
			document.frm.linkedin.focus();
			return;
		}else{
			document.frm.linkedin.style.background='';
		}
		seotukhoa5 = document.frm.google.value;
		if(seotukhoa5 == "")
		{
			document.frm.google.style.background='#FFDAB9';
			document.frm.google.focus();
			return;
		}else{
			document.frm.google.style.background='';
		}
		seotukhoa6 = document.frm.applestore.value;
		if(seotukhoa6 == "")
		{
			document.frm.applestore.style.background='#FFDAB9';
			document.frm.applestore.focus();
			return;
		}else{
			document.frm.applestore.style.background='';
		}
		seotukhoa7 = document.frm.playstore.value;
		if(seotukhoa7 == "")
		{
			document.frm.playstore.style.background='#FFDAB9';
			document.frm.playstore.focus();
			return;
		}else{
			document.frm.playstore.style.background='';
		}
		seotukhoa8 = document.frm.register_partners.value;
		if(seotukhoa8 == "")
		{
			document.frm.register_partners.style.background='#FFDAB9';
			document.frm.register_partners.focus();
			return;
		}else{
			document.frm.register_partners.style.background='';
		}
		
		document.frm.submit();
	}
</script>
<center><h2>..:<?php echo $error; ?>:..</h2></center>
<form id="frm" name="frm" action="xulisuaOPTIONS.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">
<input type="hidden" id="id" name="id" value="<?php echo $banner['op_Id'] ?>" />
<input type="hidden" id="security" name="security" value="2" />
<div class="dynamiclabel">
                           <input id="company" name="company" type="text" placeholder="Tên đơn vị quản lý !" value="<?php echo $banner['op_Name'] ?>">  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <input id="address" name="address" type="text" placeholder="Địa chỉ !" value="<?php echo $banner['op_Address'] ?>">  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <input id="phone" name="phone" type="text" placeholder="Điện thoại !" value="<?php echo $banner['op_Phone'] ?>">  <a style="color:white;">(*)</a>
                        </div>
						<div class="dynamiclabel">
                           <input id="email" name="email" type="text" placeholder="Hòm thư !" value="<?php echo $banner['op_Email'] ?>">  <a style="color:white;">(*)</a>
                        </div>
						<div class="dynamiclabel">
                           <input id="meta_title" name="meta_title" type="text" placeholder="Meta Title chung !" value="<?php echo $banner['op_MetaTitle'] ?>">  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <textarea placeholder="Meta Descriptions chung !" cols="30" rows="20" id="meta_description" name="meta_description"><?php echo $banner['op_MetaDescription'] ?></textarea>  <a style="color:white;">(*)</a>
                        </div>
						<div class="dynamiclabel">
                           <textarea placeholder="Meta Keywords chung !" cols="30" rows="20" id="meta_keywords" name="meta_keywords"><?php echo $banner['op_MetaKeywords'] ?></textarea>  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <input id="youtube" name="youtube" type="text" placeholder="Đường dẫn Youtube !" value="<?php echo $banner['op_LinkYoutube'] ?>">  <a style="color:white;">(*)</a>
                        </div>
</div>
<div class="Group_Right">
<div class="dynamiclabel">
                           <input id="twitter" name="twitter" type="text" placeholder="Đường dẫn Twitter !" value="<?php echo $banner['op_LinkTwitter'] ?>">  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <input id="facebook" name="facebook" type="text" placeholder="Đường dẫn Facebook !" value="<?php echo $banner['op_LinkFacebook'] ?>">  <a style="color:white;">(*)</a>
                        </div>
						<div class="dynamiclabel">
                           <input id="linkedin" name="linkedin" type="text" placeholder="Đường dẫn LinkedIn !" value="<?php echo $banner['op_LinkLinkedIn'] ?>">  <a style="color:white;">(*)</a>
                        </div>
						<div class="dynamiclabel">
                           <input id="google" name="google" type="text" placeholder="Đường dẫn Google !" value="<?php echo $banner['op_LinkGooglePlus'] ?>">  <a style="color:white;">(*)</a>
                        </div>
						<div class="dynamiclabel">
                           <input id="register_partners" name="register_partners" type="text" placeholder="Đường dẫn đăng ký hơp tác !" value="<?php echo $banner['op_RegisterPartner'] ?>">  <a style="color:white;">(*)</a>
                        </div>
						<div class="dynamiclabel" style="color:white">Logo Website <a style="color:white;">(*)</a>:
         <input type="file" id="picture" name="picture"  onchange="readURL(this);" />
<input type="hidden" id="hpc" name="hpc" value="<?php echo $banner['op_Logo'] ?>" />
    </div>
    <div class="dynamiclabel" style="color: white;">
                         <div class="pre_img">
                             <span>
                                 <img class="prw_img" src="../public/images/<?php echo $banner['op_Logo'] ?>" alt="your image" width="480" height="120">
                             </span>
                         </div>
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
                    $('.prw_img,.activeImage').attr('src', e.target.result).width(480).height(120);

                    $('.activeImage').css('display', 'inline');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
<br />

</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Cập nhật" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Reset All" onclick="this.form.reset();" />
</div>
</form>