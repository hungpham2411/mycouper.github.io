<?php

 if(isset($_GET['error']) && $_GET['error'] == "out_of_range"){$error = "Kích thước ảnh không được quá 5MB !";} else{$error = "Thêm nhân vật quan trọng";}
if(isset($_GET['error']) && $_GET['error'] == "invalid_file_format"){$error = "Ảnh không đúng định dạng !";}  else{$error = "Thêm nhân vật quan trọng";}
if(isset($_GET['error']) && $_GET['error'] == "no_image"){$error = "Mời chọn ảnh đại diện !";}  else{$error = "Thêm nhân vật quan trọng";}
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
	
frmPR.submit();

}
</script>
<center><h2>..:<?php echo $error; ?>:..</h2></center>
<form id="frmPR" name="frmPR" action="xulithemVIP.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">

<div class="dynamiclabel">
<input id="security" name="security" type="hidden" placeholder="Tên đối tác " value="1">
                           <input id="name" name="name" type="text" placeholder="Họ và tên ">  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <input id="address" name="address" type="text" placeholder="Chức vụ ">  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel" style="color: white;"> Hiển thị: 
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
</br>
</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Thêm mới" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />
</div>
</form>