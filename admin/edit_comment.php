<?php
$project = $pdo->query("SELECT * FROM contact WHERE co_Id=".$_GET['id']."");
$project = $project->fetch();

?>

<center><h2>..:Thông tin chi tiết:..</h2></center>
<div class="Group_Left">
<div class="dynamiclabel">
<input id="id" name="id" type="hidden" placeholder="Mã số dự án !" value="<?php echo $project['pr_Id'] ?>"> 
                           <input id="title" name="title" readonly="true" type="text" placeholder="Tên người liện hệ !" value="<?php echo $project['co_Name'] ?>">  <a style="color:white;">(*)</a>
                        </div>
    <div class="dynamiclabel">
                           <input id="description" name="description" readonly="true" type="text" placeholder="Địa chỉ !" value="<?php echo $project['co_Address'] ?>">  <a style="color:white;">(*)</a>
                        </div>
<div class="dynamiclabel">
                           <input id="address" name="address" type="text" readonly="true" placeholder="Sđt !" value="<?php echo $project['co_Phone'] ?>">  <a style="color:white;">(*)</a>
                        </div>
    <div class="dynamiclabel">
                           <input id="acreage" name="acreage" type="text" readonly="true" placeholder="Hòm thư !" value="<?php echo $project['co_Email'] ?>">  <a style="color:white;"> (*)</a>
                        </div>
</div>
                         

<div class="Group_Right">

    <div class="dynamiclabel">
                           <input id="acreage" name="acreage" type="text" readonly="true" placeholder="Tiêu đề !" value="<?php echo $project['co_Title'] ?>">  <a style="color:white;"> (*)</a>
                        </div>
						
    <div class="dynamiclabel">
                           <input id="acreage" name="acreage" type="text" readonly="true" placeholder="Ngày đăng !" value="<?php echo $project['co_PostTime'] ?>">  <a style="color:white;"> (*)</a>
                        </div>
						
<div class="dynamiclabel">
                           <textarea id="description" name="description"  placeholder="Nội dung !" cols="30" rows="20"><?php echo $project['co_Content'] ?></textarea>  <a style="color:white;">(*)</a>
                        </div>
</div>
<div class="Bao_btn">
<a class="btn1" href="quanly.php?page=comments">Quay lại</a>

</div>
