<?php

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "success"){

    echo "<script>alert('Thực hiện thành công !')</script>";

}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "failed"){

    echo "<script>alert('Thực hiện thất bại !')</script>";

}

?>
<center><h2>..:Slideshow ảnh banner:..</h2></center>
<center>
    <div class="dynamiclabel1">    
<form id="frm" name="frm" method="GET" action="xulitimkiem.php">
<a style="margin-left:10px;" href="quanly.php?page=add_slideshow" class="btn_timkiem"><img src="images/documents-white-edit-icon.png" width="24px" height="24px" />&nbsp;&nbsp; Thêm mới</a>
<input id="txtSearch" name="txtSearch" placeholder="Thông tin cần tìm" type="text">

<input type="submit" id="btnSearchSlideshow" name="btnSearchSlideshow" value="Tìm kiếm" class="btn_timkiem" style="margin-left:10px;" />
</form>

</div>
</center>


<div class="Group_DanhSach">
    <div class="CSSTableGenerator">
<table>
<tr style="text-align:center;">
<td style="text-align:center;">Mã số</td>
<td>Tiêu đề</td>
<td>Ảnh đại diện</td>
<td>Hiển thị</td>
<td>Hành động</td>
</tr>

        <?php
       
        $display=30;

        if(isset($_GET['page']) && (int)$_GET['page']){
            $page = $_GET['page'];
        }else{
            $query = "SELECT COUNT(ss_Id) FROM slideshow";
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

if(!isset($_GET['search'])){
            $sql = "SELECT ss_Id, ss_Picture,ss_Description,ss_IsShow,ss_Title FROM slideshow ORDER BY ss_Id DESC LIMIT $start, $display";
}else{
$search = $_GET['search'];
 $sql = "SELECT ss_Id, ss_Picture,ss_Description,ss_IsShow,ss_Title FROM slideshow WHERE ss_Title LIKE '%$search%' ORDER BY ss_Id DESC LIMIT $start, $display";
}

        $result = mysqli_query($connection, $sql) or die('could not select data'.mysqli_error($connection));
        while($set = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $id = $set['ss_Id'];
            $image = $set['ss_Picture'];
            $title = $set['ss_Title'];

if($set['ss_IsShow'] == "1"){$show = "Có";}else{$show = "Không";}

            echo "<tr>
            <td style='text-align:center;'>$id</td>
            <td style='text-align:center;'>$title</td>
            <td style='text-align:center;'><img src='../public/images/slider/$image' width='50px' height='50px' /></td>
            <td style='text-align:center;'>$show</td>
            <td style='text-align:center;'><a href='quanly.php?page=edit_slideshow&id=$id'><img src='images/edit.png' width='24px' height='24px'></a>&nbsp;&nbsp;&nbsp;<a href='delete_slideshow.php?id=$id'><img src='images/trash-icon.png' width='24px' height='24px'></a></td>
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
                echo "<li><a href='quanly.php?page=slideshow&start=$prev'><i class='fa fa-long-arrow-left'></i>Lùi</a></li>";
            }

            for($i=1;$i<=$page;$i++){
                if($current != $i){
                    echo "<li><a href='quanly.php?page=slideshow&start=".($display*($i-1))."'>$i</a></li>";
                }else{
                    echo "<li class='active'><a>$i</a></li>";
                }
            }

            if($current != $page){
                echo "<li><a href='quanly.php?page=slideshow&start=$next'>Tiến<i class='fa fa-long-arrow-right'></i></a></li>";
            }

        }

        ?>
    </ul></center>

</div>
</div>