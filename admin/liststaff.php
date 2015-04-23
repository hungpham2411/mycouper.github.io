<?php

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "success"){

    echo "<script>alert('Thực hiện thành công !')</script>";

}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "failed"){

    echo "<script>alert('Thực hiện thất bại !')</script>";

}

?>
<center><h2>..:Danh sách quản trị viên:..</h2></center>
<center>
    <div class="dynamiclabel1">    <form id="frm" name="frm" method="GET" action="xulitimkiem.php">
<a style="margin-left:10px;" href="quanly.php?page=add_staff" class="btn_timkiem"><img src="images/documents-white-edit-icon.png" width="24px" height="24px" />&nbsp;&nbsp; Thêm mới</a>
<input id="txtSearch" name="txtSearch" placeholder="Thông tin cần tìm ..." type="text">
<input type="submit" id="btnSearchStaff" name="btnSearchStaff" value="Tìm kiếm" class="btn_timkiem" style="margin-left:10px;" />
</form>

</div>
</center>


<div class="Group_DanhSach">
    <div class="CSSTableGenerator">
<table>
<tr style="text-align:center;">
<td style="text-align:center;">Mã số</td>
<td>Họ và tên</td>
<td>Ảnh đại diện</td>
<td>Hòm thư</td>
<td>Số điện thoại</td>
<td>Quyền hạn</td>
<td>Hành động</td>
</tr>

        <?php
       
        $display=20;

        if(isset($_GET['page']) && (int)$_GET['page']){
            $page = $_GET['page'];
        }else{
            $query = "SELECT COUNT(ad_Id) FROM admins";
            $res = mysqli_query($connection, $query) or die('could not count id'.mysqli_error($connection));
            $row = mysqli_fetch_array($res, MYSQLI_NUM);

            $record = $row[0];
            if($record > $display){
                $page = ceil($record/$display);
            }else{
                $page = 1;
            }
        }

        $start = (isset($_GET['start']) && (int)$_GET['start']) ? $_GET['start'] : 0;

         if(!isset($_GET['search']))
         {
            $sql = "SELECT ad_Id,ad_Name,ad_Phone,ad_Email,ad_Picture,ad_Permission FROM admins ORDER BY ad_Id DESC LIMIT $start, $display";
         }else{
            $search = $_GET['search'];
            $sql = "SELECT ad_Id,ad_Name,ad_Phone,ad_Email,ad_Picture,ad_Permission FROM admins WHERE ad_Name LIKE '%$search%' ORDER BY ad_Id DESC LIMIT $start, $display";
         }

        $result = mysqli_query($connection, $sql) or die('could not select data'.mysqli_error($connection));
        while($set = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $id = $set['ad_Id'];
            $name = $set['ad_Name'];
            $image = $set['ad_Picture'];
            $email = $set['ad_Email'];
            $phone = $set['ad_Phone'];
if($set['ad_Permission'] == "2"){$position = "Cao nhất";}
if($set['ad_Permission'] == "1"){$position = "Thứ 2";}
if($set['ad_Permission'] == "0"){$position = "Bị khoá";}

            echo "<tr>
            <td style='text-align:center;'>$id</td>
            <td style='text-align:center;'>$name</td>
            <td style='text-align:center;'><img src='../Admin/images/$image' width='50px' height='50px' /></td>
            <td style='text-align:center;'>$email</td>
            <td style='text-align:center;'>$phone</td>
            <td style='text-align:center;'>$position</td>
            <td style='text-align:center;'><a href='quanly.php?page=edit_staff&id=$id'><img src='images/edit.png' width='24px' height='24px'></a>&nbsp;&nbsp;&nbsp;<a href='delete_staff.php?id=$id'><img src='images/trash-icon.png' width='24px' height='24px'></a></td>
            </tr>";

        }



        ?>
       
    </table>
    <center><ul class="pagination pagination-lg">
        <?php

        if($page > 1){

            $next = $start + $display;
            $prev = $start - $display;
            $current = ($start/$display) + 1;

            if($current != 1){
                echo "<li><a href='quanly.php?page=staff&start=$prev'><i class='fa fa-long-arrow-left'></i>Lùi</a></li>";
            }

            for($i=1;$i<=$page;$i++){
                if($current != $i){
                    echo "<li><a href='quanly.php?page=staff&start=".($display*($i-1))."'>$i</a></li>";
                }else{
                    echo "<li class='active'><a>$i</a></li>";
                }
            }

            if($current != $page){
                echo "<li><a href='quanly.php?page=staff&start=$next'>Tiến<i class='fa fa-long-arrow-right'></i></a></li>";
            }

        }

        ?>
    </ul></center>

</div>
</div>