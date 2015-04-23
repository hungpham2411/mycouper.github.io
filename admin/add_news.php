<?php
session_start();

 if(isset($_GET['error']) && $_GET['error'] == "out_of_range"){$error = "Kích thước ảnh không được quá 5MB !";} else{$error = "Thêm tin tức mới";}
if(isset($_GET['error']) && $_GET['error'] == "invalid_file_format"){$error = "Ảnh không đúng định dạng !";}  else{$error = "Thêm tin tức mới";}
if(isset($_GET['error']) && $_GET['error'] == "no_image"){$error = "Mời chọn ảnh cho tin tức !";}  else{$error = "Thêm tin tức mới";}
?>

<script type="text/javascript">
function check()
{
	//kiểm tra thông số ô tiêu đề tin tức
	tieude = document.frmNEWS.title.value;
	if(tieude == "")
	{
		document.frmNEWS.title.style.background = '#FFDAB9';
		document.frmNEWS.title.focus();
		return;
	}else{
		document.frmNEWS.title.style.background = '';
	}
	
	//kiểm tra thông số ô mô tả ngắn cho tin tức
	mota = document.frmNEWS.description.value;
	if(mota == "")
	{
		document.frmNEWS.description.style.background = '#FFDAB9';
		document.frmNEWS.description.focus();
		return;
	}else{
		document.frmNEWS.description.style.background = '';
	}
	
	//kiểm tra thông số ô Meta Title của SEO cho tin tức
	meta_tieude = document.frmNEWS.meta_title.value;
	if(meta_tieude == "")
	{
		document.frmNEWS.meta_title.style.background = '#FFDAB9';
		document.frmNEWS.meta_title.focus();
		return;
	}else{
		document.frmNEWS.meta_title.style.background = '';
	}
	
	//kiểm tra thông số ô Meta Description của SEO cho tin tức
	meta_mota = document.frmNEWS.meta_description.value;
	if(meta_mota == "")
	{
		document.frmNEWS.meta_description.style.background = '#FFDAB9';
		document.frmNEWS.meta_description.focus();
		return;
	}else{
		document.frmNEWS.meta_description.style.background = '';
	}
	
	//kiểm tra thông số ô Meta Keyword của SEO cho tin tức
	meta_tukhoa = document.frmNEWS.meta_keywords.value;
	if(meta_tukhoa == "")
	{
		document.frmNEWS.meta_keywords.style.background = '#FFDAB9';
		document.frmNEWS.meta_keywords.focus();
		return;
	}else{
		document.frmNEWS.meta_keywords.style.background = '';
	}
	
	frmNEWS.submit();
}
</script>

<center><h2>..:<?php echo $error; ?>:..</h2></center>
<form id="frmNEWS" name="frmNEWS" action="xulithemNEWS.php" method="POST" enctype="multipart/form-data">
<div class="Group_Left">
<div class="dynamiclabel">
                           <input id="title" name="title" type="text" placeholder="Tiêu đề tin tức !">  <a style="color:white;">(*)</a>
                        </div>
    <div class="dynamiclabel">
                           <input id="description" name="description" type="text" placeholder="Mô tả ngắn cho tin tức !">  <a style="color:white;">(*)</a>
                        </div>
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
                           <input id="meta_title" name="meta_title" type="text" placeholder="Meta Title cho tin tức !">  <a style="color:white;">(*)</a>
                        </div>
  <div class="dynamiclabel">
                           <textarea id="meta_description" maxlength="160" name="meta_description"  placeholder="Meta description cho tin tức !"></textarea><a style="color:white;">(*)</a>
                        </div>
  <div class="dynamiclabel">
                           <textarea id="meta_keywords" maxlength="160" name="meta_keywords"  placeholder="Meta keywords cho tin tức !"></textarea><a style="color:white;">(*)</a>
                        </div>

<div class="dynamiclabel" style="color: white;"> Hiển thị: 
        <input type="radio" id="rdo" name="rdo" value="1" <?php if($position['ad_Permission'] == 1){ echo "disabled"; }else{echo "checked";} ?> />Có &nbsp;&nbsp;
        <input type="radio" id="rdo" name="rdo" value="0" <?php if($position['ad_Permission'] == 1){echo "checked";} ?> />Không &nbsp;&nbsp;
  <a style="color:white;">(*)</a>
    </div>
</div>
<div class="Group_FCK">Nội dung : 
    <textarea id="content" name="content" class="ckeditor" placeholder="Nội dung tin tức !"></textarea>
</div>
<div class="Bao_btn">
    <input class="btn1" id="Button1" name="Button1" type="button" value="Thêm tin tức" onclick="return check();" />
    <input class="btn1" id="Button4" name="Button4" type="button" value="Làm lại" onclick="this.form.reset();" />


</div>
</form>