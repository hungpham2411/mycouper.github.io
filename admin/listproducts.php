<?php


if(isset($_REQUEST['action']) && $_REQUEST['action'] == "success"){

    echo "<script>alert('Thực hiện thành công !')</script>";

}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "failed"){

    echo "<script>alert('Thực hiện thất bại !')</script>";

}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "error"){

    echo "<script>alert('Bạn cần xoá hoá đơn có sản phẩm này trước !')</script>";

}

?>
<center><h2>..:Danh sách tiêu chí:..</h2></center>
<center>
    <div class="dynamiclabel1">    
<form id="frm" name="frm" method="GET" action="xulitimkiem.php">
<a style="margin-left:10px;" href="quanly.php?page=add_product&id=<?php echo $_GET['id'] ?>" class="btn_timkiem"><img src="images/documents-white-edit-icon.png" width="24px" height="24px" />&nbsp;&nbsp; Thêm mới</a>
<input id="txtSearch" name="txtSearch" placeholder="Thông tin cần tìm" type="text">

<input type="submit" id="btnSearchProducts" name="btnSearchProducts" value="Tìm kiếm" class="btn_timkiem" style="margin-left:10px;" />
</form>

</div>
</center>


<div class="Group_DanhSach">
    <div class="CSSTableGenerator">
<table>
<tr style="text-align:center;">
<td>Mã số</td>
<td>Tiêu đề</td>
<td>Ảnh đại diện</td>
<td>Danh mục</td>
<td>Hiển thị</td>
<td>Hành động</td>
</tr>

        <?php
       
        $display=30;

        if(isset($_GET['pages']) && (int)$_GET['pages']){
            $page = $_GET['pages'];
        }else{
		if(isset($_GET['search']))
		{
		$search = $_GET['search'];
		 $query = "SELECT COUNT(ar_Id) FROM articles WHERE ar_Name LIKE '%$search%' AND ar_Category=".$_GET['id']."";
		}else{
            $query = "SELECT COUNT(ar_Id) FROM articles WHERE ar_Category=".$_GET['id']."";
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


 $sql = "SELECT * FROM articles LEFT JOIN categories ON articles.ar_Category=categories.cate_Id WHERE ar_Name LIKE '%$search%' AND ar_Category=".$_GET['id']." ORDER BY ar_Id DESC LIMIT $start, $display";


        $result = mysqli_query($connection, $sql) or die('could not select data'.mysqli_error($connection));
        while($set = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $id = $set['ar_Id'];
            $title = $set['ar_Name'];
			$image = $set['ar_Picture'];		
			$cate = $set['cate_Name'];
			if($set['ar_IsShow'] == 1){$hot = "Có";}else{$hot = "Không";}
			$cate_id = $set['cate_Id'];

            echo "<tr>
			<td style='text-align:center;'>$id</td>
            <td style='text-align:center;'>$title</td>
            <td style='text-align:center;'><img src='../public/images/icons/$image' width='50px' height='50px' /></td>
            <td style='text-align:center;'>$cate</td>
            <td style='text-align:center;'>$hot</td>
            <td style='text-align:center;'><a href='quanly.php?page=edit_product&id=$id'><img src='images/edit.png' width='24px' height='24px'></a>&nbsp;&nbsp;&nbsp;<a href='delete_products.php?id=$id&cate_id=$cate_id'><img src='images/trash-icon.png' width='24px' height='24px'></a></td>
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
                echo "<li><a href='quanly.php?page=products&start=$prev'><i class='fa fa-long-arrow-left'></i>Lùi</a></li>";
            }

            for($i=1;$i<=$page;$i++){
                if($current != $i){
                    echo "<li><a href='quanly.php?page=products&start=".($display*($i-1))."'>$i</a></li>";
                }else{
                    echo "<li class='active'><a>$i</a></li>";
                }
            }

            if($current != $page){
                echo "<li><a href='quanly.php?page=products&start=$next'>Tiến<i class='fa fa-long-arrow-right'></i></a></li>";
            }

        }

        ?>
    </ul></center>

</div>
</div>