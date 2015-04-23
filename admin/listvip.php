<?php

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "success"){

    echo "<script>alert('Thực hiện thành công !')</script>";

}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "failed"){

    echo "<script>alert('Thực hiện thất bại !')</script>";

}

?>
<center><h2>..:Danh sách những người quan trọng:..</h2></center>
<center>
    <div class="dynamiclabel1">    
<form id="frm" name="frm" method="GET" action="xulitimkiem.php">
<a style="margin-left:10px;" href="quanly.php?page=add_vip" class="btn_timkiem"><img src="images/documents-white-edit-icon.png" width="24px" height="24px" />&nbsp;&nbsp; Thêm mới</a>
<input id="txtSearch" name="txtSearch" placeholder="Thông tin cần tìm" type="text">
<input type="submit" id="btnSearchVip" name="btnSearchVip" value="Tìm kiếm" class="btn_timkiem" style="margin-left:10px;" />
</form>

</div>
</center>
<div class="Group_DanhSach">
    <div class="CSSTableGenerator">
<table>
<tr style="text-align:center;">
<td>Liên kết</td>
<td>Mã số</td>
<td>Họ và tên</td>
<td>Chức vụ</td>
<td>Ảnh đại diện</td>
<td>Hiển thị</td>
<td>Hành động</td>
</tr>

        <?php
       
        $display=15;

        if(isset($_GET['pages']) && (int)$_GET['pages']){
            $page = $_GET['pages'];
        }else{
				if(isset($_GET['search']))
				{
					$query = "SELECT COUNT(vi_Id) FROM vip WHERE vi_Name LIKE '%".$_GET['search']."%' OR vi_Position LIKE '%".$_GET['search']."%'";
				}else{
					$query = "SELECT COUNT(vi_Id) FROM vip";
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


			$sql = "SELECT * FROM vip WHERE vi_Name LIKE '%".$_GET['search']."%' OR vi_Position LIKE '%".$_GET['search']."%' ORDER BY vi_Id DESC LIMIT $start, $display";
		

        $result = mysqli_query($connection, $sql) or die('could not select data'.mysqli_error($connection));
        while($set = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $id = $set['vi_Id'];
            $title = $set['vi_Name'];
			$desc = $set['vi_Position'];
			$desc1 = $set['vi_Picture'];
			if($set['vi_IsShow'] == 1){$show = "Có";}else{$show = "Không";}
		
			echo '<tr>
            <td style="text-align:center;"><a href="quanly.php?page=vip_link&id='.$id.'">Liên kết</a></td>
            <td style="text-align:center;">'.$id.'</td>
            <td style="text-align:center;">'.$title.'</td>
            <td style="text-align:center;">'.$desc.'</td>
            <td style="text-align:center;"><img src="../public/images/'.$desc1.'" width="50px" height="50px" /></td>
            <td style="text-align:center;">'.$show.'</td>
            <td style="text-align:center;"><a href="quanly.php?page=edit_vip&id='.$id.'"><img src="images/edit.png" width="24px" height="24px"></a>&nbsp;&nbsp;&nbsp;<a href="delete_vip.php?id='.$id.'"><img src="images/trash-icon.png" width="24px" height="24px"></a></td>
            </tr>';

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
                echo "<li><a href='quanly.php?page=vip&$id=".$_GET['id']."&start=$prev'><i class='fa fa-long-arrow-left'></i>Lùi</a></li>";
            }

            for($i=1;$i<=$page;$i++){
                if($current != $i){
                    echo "<li><a href='quanly.php?page=vip&$id=".$_GET['id']."&start=".($display*($i-1))."'>$i</a></li>";
                }else{
                    echo "<li class='active'><a>$i</a></li>";
                }
            }

            if($current != $page){
                echo "<li><a href='quanly.php?page=vip&$id=".$_GET['id']."&start=$next'>Tiến<i class='fa fa-long-arrow-right'></i></a></li>";
            }

        }

        ?>
    </ul></center>

</div>
</div>