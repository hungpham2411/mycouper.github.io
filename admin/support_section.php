<?php
try {
    $stmt = $pdo->prepare("select * from support_section");
    $stmt->execute();
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}
?>

<div class="container-fluid">
    <h3>Service section</h3>
    <hr>
    <a class="btn btn-primary" href="quanly.php?page=support_section_add">Thêm mới</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Tiêu đề phụ</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($stmt as $result) {
                    ?>
                    <tr>
                        <td><?php echo $result["id"]; ?></td>
                        <td><a href="quanly.php?page=support_section_edit&id=<?php echo $result["id"]; ?>"><?php echo $result["title"]; ?></a></td>
                        <td><?php echo $result["subtitle"]; ?></td>
                        <td><a href="support_section_delete.php?id=<?php echo $result["id"]; ?>">Delete</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>