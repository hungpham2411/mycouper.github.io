<?php

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "success"){

    echo "<script>alert('Thực hiện thành công !')</script>";

}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "failed"){

    echo "<script>alert('Thực hiện thất bại !')</script>";

}

?>
<center><h2>..:Danh sách dịch vụ:..</h2></center>
<center>
    <div class="dynamiclabel1">    
<form id="frm" name="frm" method="GET" action="xulitimkiem.php">
<a style="margin-left:10px;" href="<?php if($_GET['id'] == 9){echo "quanly.php?page=add_service";}else{echo "quanly.php?page=add_service1";} ?>" class="btn_timkiem"><img src="images/documents-white-edit-icon.png" width="24px" height="24px" />&nbsp;&nbsp; Thêm mới</a>
<input id="txtSearch" name="txtSearch" placeholder="Thông tin cần tìm" type="text">
<input id="id" name="id" placeholder="Thông tin cần tìm" type="hidden" value="<?php echo $_GET['id'] ?>">
<input type="submit" id="btnSearchServices" name="btnSearchServices" value="Tìm kiếm" class="btn_timkiem" style="margin-left:10px;" />
</form>

</div>
</center>
<div class="Group_DanhSach">
    <div class="CSSTableGenerator">
<table>
<tr style="text-align:center;">
<td>Mã số</td>
<td>Tiêu đề</td>
<td>Mô tả</td>
<td>Dùng cho</td>
<td>Hiển thị</td>
<td>Hành động</td>
</tr>

        <?php
       
        $display=30;

        if(isset($_GET['pages']) && (int)$_GET['pages']){
            $page = $_GET['pages'];
        }else{
			if($_GET['id'] == 9)
			{
				if(isset($_GET['search']))
				{
					$query = "SELECT COUNT(ar_Id) FROM articles WHERE ar_Category=1 AND ar_Name LIKE '%".$_GET['search']."%'";
				}else{
					$query = "SELECT COUNT(ar_Id) FROM articles WHERE ar_Category=1";
				}
			}else{
				if(isset($_GET['search']))
				{
					$query = "SELECT COUNT(ar_Id) FROM articles WHERE ar_Category=2 AND ar_Name LIKE '%".$_GET['search']."%'";
				}else{
					$query = "SELECT COUNT(ar_Id) FROM articles WHERE ar_Category=2";
				}			
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

		if($_GET['id'] == 9)
		{
			$sql = "SELECT * FROM articles WHERE ar_Category=1 AND ar_Name LIKE '%".$_GET['search']."%' ORDER BY ar_Id DESC LIMIT $start, $display";
		}else{
			$sql = "SELECT * FROM articles WHERE ar_Category=2 AND ar_Name LIKE '%".$_GET['search']."%' ORDER BY ar_Id DESC LIMIT $start, $display";
		}

        $result = mysqli_query($connection, $sql) or die('could not select data'.mysqli_error($connection));
        while($set = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $id = $set['ar_Id'];
            $title = $set['ar_Name'];
			$desc = $set['ar_Description'];
			
			if($set['ar_Category'] == 1)
			{
				$cateInfo = $pdo->query("SELECT cate_Id,cate_Name FROM categories WHERE cate_Id=9");
				$cateInfo = $cateInfo->fetch();
				
				$link = "<a href='quanly.php?page=edit_service&id=".$id."'><img src='images/edit.png' width='24px' height='24px'></a>";
			}else{
				$cateInfo = $pdo->query("SELECT cate_Id,cate_Name FROM categories WHERE cate_Id=10");
				$cateInfo = $cateInfo->fetch();
			
				$link = "<a href='quanly.php?page=edit_service1&id=".$id."'><img src='images/edit.png' width='24px' height='24px'></a>";
			}
			
			if($set['ar_IsShow'] == 1){$show = "Có";}else{$show = "Không";}
			echo '<tr>
            <td style="text-align:center;">'.$id.'</td>
            <td style="text-align:center;">'.$title.'</td>
            <td style="text-align:center;">'.$desc.'</td>
            <td style="text-align:center;">'.$cateInfo['cate_Name'].'</td>
            <td style="text-align:center;">'.$show.'</td>
            <td style="text-align:center;">'.$link.'&nbsp;&nbsp;&nbsp;<a href="delete_articles.php?id='.$id.'&cateId='.$_GET['id'].'"><img src="images/trash-icon.png" width="24px" height="24px"></a></td>
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
                echo "<li><a href='quanly.php?page=articles&$id=".$_GET['id']."&start=$prev'><i class='fa fa-long-arrow-left'></i>Lùi</a></li>";
            }

            for($i=1;$i<=$page;$i++){
                if($current != $i){
                    echo "<li><a href='quanly.php?page=articles&$id=".$_GET['id']."&start=".($display*($i-1))."'>$i</a></li>";
                }else{
                    echo "<li class='active'><a>$i</a></li>";
                }
            }

            if($current != $page){
                echo "<li><a href='quanly.php?page=articles&$id=".$_GET['id']."&start=$next'>Tiến<i class='fa fa-long-arrow-right'></i></a></li>";
            }

        }

        ?>
    </ul></center>

</div>
</div>