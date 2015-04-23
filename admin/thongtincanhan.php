<?php

$username = $_SESSION['login_user'];

$info = $pdo->query("SELECT * FROM admins WHERE ad_Username='$username'");

$info = $info->fetch();

?>

<div class="Group_Left_NhanVien">
    <img class="img_user" width="100px" height="120px" src="images/<?php echo $info['ad_Picture'] ?>" />
    <div class="address_user">
        <a style="font-weight:bold;font-size:20px;text-decoration: none;color:white;">Tên thật: <?php echo $info['ad_Name'] ?></a><br />
        <a style="text-decoration: none;color:white;">Điện thoại: <?php echo $info['ad_Phone'] ?></a><br />
        <a style="text-decoration: none;color:white;">Hòm thư: <?php echo $info['ad_Email'] ?></a><br />
		<a style="text-decoration: none;color:white;">Địa chỉ: <?php echo $info['ad_Address'] ?></a><br />
		<a style="text-decoration: none;color:white;">Cấp bậc: <?php 
			if($info['ad_Permission'] == 2)
			{
				echo "Quản trị viên Cấp 1";
			} 
			if($info['ad_Permission'] == 1)
			{
				echo "Quản trị viên Cấp 2";
			} 
			if($info['ad_Permission'] == 0)
			{
				echo "Quản trị viên bị khoá";
			} 
		?></a><br />
    </div>
</div>