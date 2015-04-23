<?php

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "success"){

    echo "<script>alert('Thực hiện thành công !')</script>";

}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "failed"){

    echo "<script>alert('Thực hiện thất bại !')</script>";

}

?>
<center><h2>..:Danh sách Tags chung:..</h2></center>
<center>
    <div class="dynamiclabel1">    
<form id="frm" name="frm" method="GET" action="xulitimkiem.php">
<a style="margin-left:10px;" href="quanly.php?page=add_tag" class="btn_timkiem"><img src="images/documents-white-edit-icon.png" width="24px" height="24px" />&nbsp;&nbsp; Thêm mới</a>
<input id="txtSearch" name="txtSearch" placeholder="Thông tin cần tìm" type="text">

<input type="submit" id="btnSearchTags" name="btnSearchTags" value="Tìm kiếm" class="btn_timkiem" style="margin-left:10px;" />
</form>

</div>
</center>


<div class="Group_DanhSach">
    <div class="CSSTableGenerator">
<table>
<tr style="text-align:center;">
<td style="text-align:center;">Mã số</td>
<td>Tiêu đề</td>
<td>Hành động</td>
</tr>

        <?php
       
        $display=15;

        if(isset($_GET['pages']) && (int)$_GET['pages']){
            $page = $_GET['pages'];
        }else{
			if(isset($_GET['search']))
			{
				$query = "SELECT COUNT(ta_Id) FROM tags WHERE ta_Name LIKE '".$_GET['search']."'";
			}else{
				$query = "SELECT COUNT(ta_Id) FROM tags";
			}
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


 $sql = "SELECT * FROM tags WHERE ta_Name LIKE '%".$_GET['search']."%' ORDER BY ta_Id DESC LIMIT $start, $display";


        $result = mysqli_query($connection, $sql) or die('could not select data'.mysqli_error($connection));
        while($set = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $id = $set['ta_Id'];
            $title = $set['ta_Name'];

if($set['bl_IsShow'] == "1"){$show = "Có";}else{$show = "Không";}

            echo "<tr>
            <td style='text-align:center;'>$id</td>
            <td style='text-align:center;'>$title</td>
            <td style='text-align:center;'><a href='quanly.php?page=edit_tag&id=$id'><img src='images/edit.png' width='24px' height='24px'></a>&nbsp;&nbsp;&nbsp;<a href='delete_tags.php?id=$id'><img src='images/trash-icon.png' width='24px' height='24px'></a></td>
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
                echo "<li><a href='quanly.php?page=tags&start=$prev'><i class='fa fa-long-arrow-left'></i>Lùi</a></li>";
            }

            for($i=1;$i<=$page;$i++){
                if($current != $i){
                    echo "<li><a href='quanly.php?page=tags&start=".($display*($i-1))."'>$i</a></li>";
                }else{
                    echo "<li class='active'><a>$i</a></li>";
                }
            }

            if($current != $page){
                echo "<li><a href='quanly.php?page=tags&start=$next'>Tiến<i class='fa fa-long-arrow-right'></i></a></li>";
            }

        }

        ?>
    </ul></center>

</div>
</div>