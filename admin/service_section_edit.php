<?php
$id = $_GET["id"];
try {
    $stmt = $pdo->prepare("select * from service_section where id=?");
    $stmt->execute(array($id));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

$service = $stmt->fetch();
?>

<div class="container-fluid">
    <h3>Edit service</h3>
    <hr>
    <form class="form-horizontal" action="service_section_edit_action.php?id=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label">Tiêu đề</label>
            <div class="col-sm-10">
                <input id="service-section-title" name="service_section_title" type="text" value="<?php echo $service["title"]; ?>"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Tiêu đề phụ</label>
            <div class="col-sm-10">
                <input id="service-section-subtitle" name="service_section_subtitle" type="text" value="<?php echo $service["subtitle"]; ?>"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Mô tả</label>
            <div class="col-sm-10">
                <textarea id="service-section-description" class="form-control" name="service_section_description"><?php echo $service["description"]; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Icon đại diện</label>
            <div class="col-sm-10">
                <input id="service-section-image" name="service_section_image" type="text" value="<?php echo $service["image"]; ?>"/>
                <p><i>Icon đại diện là một hình ảnh vector được biểu diễn bởi một css class name nằm trong thư viện <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/">font awesome</a></i></p>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input class="btn btn-primary" type="submit" value="Lưu"/>
            </div>
        </div>
    </form>
</div>