<?php
$id = $_GET["id"];
try {
    $stmt = $pdo->prepare("select * from menu where id=?");
    $stmt->execute(array($id));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

$result = $stmt->fetch();

try {
    $stmt = $pdo->prepare("select * from menu where id <> ? and parent <> ?");
    $stmt->execute(array($id, $id));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

$menuItems = $stmt->fetchAll();
?>

<div class="container-fluid">
    <h3>Edit menu</h3>
    <hr>
    <form class="form-horizontal" action="menu_edit_action.php?id=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label">Tiêu đề</label>
            <div class="col-sm-10">
                <input id="menu-title" name="menu_title" type="text" value="<?php echo $result["title"]; ?>"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Menu cha</label>
            <div class="col-sm-10">
                <select id="menu-parent" name="menu_parent">
                    <option value="0">--No parent--</option>
                    <?php
                    foreach ($menuItems as $menuItem) {
                        if ($menuItem["id"] == $result["parent"]) {
                            echo '<option value="' . $menuItem["id"] . '" selected>' . $menuItem["title"] . '</option>';
                        } else {
                            echo '<option value="' . $menuItem["id"] . '">' . $menuItem["title"] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Thứ tự</label>
            <div class="col-sm-10">
                <input id="menu-order-in-parent" name="menu_order_in_parent" type="number" value="<?php echo $result["order_in_parent"]; ?>"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Mô tả</label>
            <div class="col-sm-10">
                <textarea id="menu-description" class="form-control" name="menu_description"><?php echo $result["description"]; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">URL</label>
            <div class="col-sm-10">
                <input id="menu-url" class="form-control" name="menu_url" type="text" value="<?php echo $result["url"]; ?>"/>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input class="btn btn-primary" type="submit" value="Lưu"/>
            </div>
        </div>
    </form>
</div>