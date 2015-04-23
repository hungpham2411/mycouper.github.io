<?php

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "success"){

    echo "<script>alert('Thực hiện thành công !')</script>";

}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "failed"){

    echo "<script>alert('Thực hiện thất bại !')</script>";

}

?>
<center><h2>..:Danh sách các liên hệ:..</h2></center>

<div class="Group_DanhSach">
    <div class="CSSTableGenerator">
<table>
<tr style="text-align:center;">
<td>Mã số</td>
<td>Người viết</td>
<td>Hòm thư</td>
<td>Tiêu đề</td>
<td>Ngày đăng</td>
<td>Hành động</td>
</tr>

        <?php
       
        $display=30;

        if(isset($_GET['pages']) && (int)$_GET['pages']){
            $page = $_GET['pages'];
        }else{
				$query = "SELECT COUNT(co_Id) FROM contact";
			
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


            $sql = "SELECT * FROM contact ORDER BY co_Id DESC LIMIT $start, $display";


        $result = mysqli_query($connection, $sql) or die('could not select data'.mysqli_error($connection));
        while($set = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $id = $set['co_Id'];
            $name = $set['co_Name'];
			$email = $set['co_Email'];
			$posttime = $set['co_PostTime'];
			$title = $set['co_Title'];

            echo "<tr>
			<td style='text-align:center;'>$id</td>
            <td style='text-align:center;'>$name</td>
            <td style='text-align:center;'>$email</td>
            <td style='text-align:center;'>$title</td>
            <td style='text-align:center;'>$posttime</td>
            <td style='text-align:center;width:90px;'><a href='quanly.php?page=edit_comment&id=$id'><img src='images/edit.png' width='24px' height='24px'></a>&nbsp;&nbsp;&nbsp;<a href='delete_comments.php?id=$id'><img src='images/trash-icon.png' width='24px' height='24px'></a></td>
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
                echo "<li><a href='quanly.php?page=comments&start=$prev'><i class='fa fa-long-arrow-left'></i>Previous</a></li>";
            }

            for($i=1;$i<=$page;$i++){
                if($current != $i){
                    echo "<li><a href='quanly.php?page=comments&start=".($display*($i-1))."'>$i</a></li>";
                }else{
                    echo "<li class='active'><a>$i</a></li>";
                }
            }

            if($current != $page){
                echo "<li><a href='quanly.php?page=comments&start=$next'>Next<i class='fa fa-long-arrow-right'></i></a></li>";
            }

        }

        ?>
    </ul></center>

</div>
</div>