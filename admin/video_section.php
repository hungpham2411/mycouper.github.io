<?php
try {
    $stmt = $pdo->prepare("select * from video_section");
    $stmt->execute();
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}
?>

<div class="container-fluid">
    <h3>Video section</h3>
    <hr>
    <a class="btn btn-primary" href="quanly.php?page=video_section_add">Thêm video</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($stmt as $result) {
                    ?>
                    <tr>
                        <td><img class="avatar-1" src="<?php echo IMG_PATH . "/" . $result["preview_image"]; ?>"></td>
                        <td><?php echo $result["title"]; ?></td>
                        <td><a href="video_section_delete.php?id=<?php echo $result["id"]; ?>">Delete</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>