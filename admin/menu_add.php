<?php
try {
    $stmt = $pdo->prepare("select * from menu");
    $stmt->execute();
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

$menuItems = $stmt->fetchAll();
?>

<div class="container-fluid">
    <h3>Add new menu</h3>
    <hr>
    <form class="form-horizontal" action="menu_add_action.php" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label">Tiêu đề</label>
            <div class="col-sm-10">
                <input id="menu-title" name="menu_title" type="text"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Menu cha</label>
            <div class="col-sm-10">
                <select id="menu-parent" name="menu_parent">
                    <option value="0">--No parent--</option>
                    <?php
                    foreach ($menuItems as $menuItem) {
                        echo '<option value="' . $menuItem["id"] . '">' . $menuItem["title"] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Thứ tự</label>
            <div class="col-sm-10">
                <input id="menu-order-in-parent" name="menu_order_in_parent" type="number"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Mô tả</label>
            <div class="col-sm-10">
                <textarea id="menu-description" class="form-control" name="menu_description"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">URL</label>
            <div class="col-sm-10">
                <input id="menu-url" class="form-control" name="menu_url" type="text"/>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input class="btn btn-primary" type="submit" value="Lưu"/>
            </div>
        </div>
    </form>
</div>