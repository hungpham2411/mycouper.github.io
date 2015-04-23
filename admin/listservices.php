<?php

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "success"){

    echo "<script>alert('Thực hiện thành công !')</script>";

}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "failed"){

    echo "<script>alert('Thực hiện thất bại !')</script>";

}

?>
<center><h2>..:Danh sách dịch vụ:..</h2></center>

<div class="Group_DanhSach">
    <div class="CSSTableGenerator">
<table>
<tr style="text-align:center;">
<td>Mã số</td>
<td>Tiêu đề</td>
<td>Mô tả</td>
<td>Hành động</td>
</tr>

        <?php
       
        $display=30;

        if(isset($_GET['pages']) && (int)$_GET['pages']){
            $page = $_GET['pages'];
        }else{
            $query = "SELECT COUNT(cate_Id) FROM categories WHERE cate_UseFor=2";
			
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


 $sql = "SELECT * FROM categories WHERE cate_UseFor=2 ORDER BY cate_Id DESC LIMIT $start, $display";


        $result = mysqli_query($connection, $sql) or die('could not select data'.mysqli_error($connection));
        while($set = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $id = $set['cate_Id'];
            $title = $set['cate_Name'];
			$logo = $set['cate_Description'];
			if($id == 9 || $id == 10){$d = "<a href='quanly.php?page=articles&id=$id'>Tiêu chí</a> &nbsp;&nbsp;&nbsp;";}else{$d = "<a href='#'>Tiêu chí</a> &nbsp;&nbsp;&nbsp;";}
            echo '<tr>
            <td style="text-align:center;">'.$id.'</td>
            <td style="text-align:center;">'.$title.'</td>
            <td style="text-align:center;">'.$logo.'</td>
            <td style="text-align:center;">'.$d.'<a href="quanly.php?page=edit_services&id='.$id.'"><img src="images/edit.png" width="24px" height="24px"></a></td>
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
                echo "<li><a href='quanly.php?page=add_category&start=$prev'><i class='fa fa-long-arrow-left'></i>Lùi</a></li>";
            }

            for($i=1;$i<=$page;$i++){
                if($current != $i){
                    echo "<li><a href='quanly.php?page=add_category&start=".($display*($i-1))."'>$i</a></li>";
                }else{
                    echo "<li class='active'><a>$i</a></li>";
                }
            }

            if($current != $page){
                echo "<li><a href='quanly.php?page=add_category&start=$next'>Tiến<i class='fa fa-long-arrow-right'></i></a></li>";
            }

        }

        ?>
    </ul></center>

</div>
</div>