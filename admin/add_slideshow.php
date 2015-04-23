<?php
session_start();

 if(isset($_GET['error']) && $_GET['error'] == "out_of_range"){$error = "Kích thước ảnh không được quá 5MB !";} else{$error = "Thêm ảnh mới";}
if(isset($_GET['error']) && $_GET['error'] == "invalid_file_format"){$error = "Ảnh không đúng định dạng !";}  else{$error = "Thêm ảnh mới";}
if(isset($_GET['error']) && $_GET['error'] == "no_image"){$error = "Mời chọn ảnh cho Slide !";}  else{$error = "Thêm ảnh mới";}

?>
<script type="text/javascript">
function check()
{
    tieude = document.frmSLIDESHOW.title.value;
    if(tieude == "")
    {
      document.frmSLIDESHOW.title.style.background = '#FFDAB9';
      document.frmSLIDESHOW.title.focus();
      return;  
    }else{
      document.frmSLIDESHOW.title.style.background = '';
    }
	
	tieude1 = document.frmSLIDESHOW.description.value;
    if(tieude1 == "")
    {
      document.frmSLIDESHOW.description.style.background = '#FFDAB9';
      document.frmSLIDESHOW.description.focus();
      return;  
    }else{
      document.frmSLIDESHOW.description.style.background = '';
    }
	
	seomota = document.frmSLIDESHOW.applestore.value;
		if(seomota == "")
		{
			document.frmSLIDESHOW.applestore.style.background='#FFDAB9';
			document.frmSLIDESHOW.applestore.focus();
			return;
		}else{
			document.frmSLIDESHOW.applestore.style.background='';
		}
		
		seomota1 = document.frmSLIDESHOW.playstore.value;
		if(seomota1 == "")
		{
			document.frmSLIDESHOW.playstore.style.background='#FFDAB9';
			document.frmSLIDESHOW.playstore.focus();
			return;
		}else{
			document.frmSLIDESHOW.playstore.style.background='';
		}
		seomota2 = document.frmSLIDESHOW.applestore.value;
		if(seomota2 == "")
		{
			document.frmSLIDESHOW.register.style.background='#FFDAB9';
			document.frmSLIDESHOW.register.focus();
			return;
		}else{
			document.frmSLIDESHOW.register.style.background='';
		}
	
     frmSLIDESHOW.submit();
}
</script>
<center><h2>..:<?php echo $error; ?>:..</h2></center>
<form id="frmSLIDESHOW" name="frmSLIDESHOW" action="xulithemSLIDESHOW.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">
<div class="dynamiclabel" style="color:white">
        Ảnh đại diện: <input type="file" id="picture" name="picture"  onchange="readURL(this);" />
    </div>
<div class="pre_img">
                             <span>
                                 <center><img class="prw_img"  alt="" width="95%" height="122"></center>
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
</div>
                         

<div class="Group_Right">
  <div class="dynamiclabel">
                           <input id="title" name="title" type="text" placeholder="Tiêu đề của ảnh !">  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <textarea placeholder="Mô tả cho ảnh !" cols="30" rows="20" id="description" name="description"></textarea>  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel" style="color: white;"> Hiển thị: 
        <input type="radio" id="rdo" name="rdo" value="1" checked />Có &nbsp;&nbsp;
        <input type="radio" id="rdo" name="rdo" value="0" />Không &nbsp;&nbsp;
  <a style="color:white;">(*)</a>
    </div>
	<div class="dynamiclabel">
                           <input id="applestore" name="applestore" type="text" placeholder="Đường dẫn từ Apple Store !" value="">  <a style="color:white;">(*)</a>
                        </div>
						<div class="dynamiclabel">
                           <input id="playstore" name="playstore" type="text" placeholder="Đường dẫn từ Play Store !" value="">  <a style="color:white;">(*)</a>
                        </div>
						<div class="dynamiclabel">
                           <input id="register" name="register" type="text" placeholder="Đường dẫn đăng ký !" value="">  <a style="color:white;">(*)</a>
                        </div>
</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Thêm ảnh" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />


</div>
</form>