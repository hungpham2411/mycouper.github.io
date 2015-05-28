<?php
if (isset($_REQUEST["parent"])) {
    $parent = $_REQUEST["parent"];
} else {
    $parent = 0;
}

try {
    $stmt = $pdo->prepare("select * from menu where parent = ? order by order_in_parent");
    $stmt->execute(array($parent));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}
?>

<div class="container-fluid">
    <h3>Menu</h3>
    <hr>
    <a class="btn btn-primary" href="quanly.php?page=menu_add">Thêm menu item</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Thứ tự</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($stmt as $result) {
                    ?>
                    <tr>
                        <td><?php echo $result["id"]; ?></td>
                        <td><a href="quanly.php?page=menu_edit&id=<?php echo $result["id"]; ?>"><?php echo $result["title"]; ?></a></td>
                        <td><?php echo $result["order_in_parent"] ?></td>
                        <td><a href="quanly.php?page=menu&parent=<?php echo $result["id"]; ?>">Open</a> / <a class="menu-delete" data-id="<?php echo $result["id"]; ?>" href="menu_delete.php?id=<?php echo $result["id"]; ?>">Delete</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>