<?php

 if(isset($_GET['error']) && $_GET['error'] == "out_of_range"){$error = "Kích thước ảnh không được quá 5MB !";} else{$error = "Thêm danh mục mới";}
if(isset($_GET['error']) && $_GET['error'] == "invalid_file_format"){$error = "Ảnh không đúng định dạng !";}  else{$error = "Thêm danh mục mới";}
if(isset($_GET['error']) && $_GET['error'] == "no_image"){$error = "Mời chọn ảnh !";}  else{$error = "Thêm danh mục mới";}

?>

<script type="text/javascript">
function check()
{
	//kiểm tra thông số ô tiêu đề dự án
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

<center><h2>..:<?php echo $error; ?>:..</h2></center>
<form id="frmNEWS" name="frmNEWS" action="xulithemCATEGORY.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">
<div class="dynamiclabel">
<input id="security" name="security" type="hidden" placeholder="Tiêu đề danh mục !" value="1" />
                           <input id="title" name="title" type="text" placeholder="Tiêu đề danh mục !">  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel" style="color: white;">Hiển thị: 
        <input type="radio" id="rdo" name="rdo" value="1" checked />Có &nbsp;&nbsp;
        <input type="radio" id="rdo" name="rdo" value="0" />Không &nbsp;&nbsp;
  <a style="color:white;">(*)</a>
    </div>
</div>
                         

<div class="Group_Right">
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
<br />

</div>

<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Thêm danh mục" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />


</div>
</form>