<?php
$slide = $pdo->query("SELECT * FROM about_us");
$slide = $slide->fetch();

 if(isset($_GET['error']) && $_GET['error'] == "out_of_range"){$error = "Kích thước ảnh không được quá 5MB !";} 
elseif(isset($_GET['error']) && $_GET['error'] == "invalid_file_format"){$error = "Ảnh không đúng định dạng !";}  
else{$error = "Sửa thông tin về chúng tôi ";}
if(isset($_GET['action']) && $_GET['action'] == "success"){echo "<script>alert('Cập nhật thành công !')</script>";}  

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
	
     frmSLIDESHOW.submit();
}
</script>
<center><h2>..:<?php echo $error; ?>:..</h2></center>
<form id="frmSLIDESHOW" name="frmSLIDESHOW" action="xulisuaAboutUs.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">
<div class="dynamiclabel" style="color:white">
        Ảnh đại diện: <input type="file" id="picture" name="picture"  onchange="readURL(this);" />
		<input type="hidden" id="security" name="security" value="1" />
		<input type="hidden" id="id" name="id" value="<?php echo $slide['au_Id'] ?>" />
		<input type="hidden" id="hpc" name="hpc" value="<?php echo $slide['au_Picture'] ?>" />
    </div>
<div class="pre_img">
                             <span>
                                 <center><img class="prw_img" src="../public/images/<?php echo $slide['au_Picture'] ?>" alt="" width="95%" height="122"></center>
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
                           <input id="title" name="title" type="text" placeholder="Tiêu đề !" value="<?php echo $slide['au_Title'] ?>">  <a style="color:white;">(*)</a>
                        </div>

</div>
<div class="Group_FCK">Nội dung : 
    <textarea id="content" name="content" class="ckeditor" placeholder="Nội dung !"><?php echo $slide['au_Content'] ?></textarea>
</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Cập nhật" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />


</div>
</form>