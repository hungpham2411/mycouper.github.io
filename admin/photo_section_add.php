<div class="container-fluid">
    <h3>Add photo</h3>
    <hr>
    <form class="form-horizontal" action="photo_section_add_action.php" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label">Ảnh</label>
            <div class="col-sm-10">
                <input id="photo-section-image-file" name="file" type="file"/>
                <p><i>File allowed extensions is "png", "jpg", "jpeg" and file size do not greater 1MB</i></p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Tiêu đề</label>
            <div class="col-sm-10">
                <input id="photo-section-title" class="form-control" name="photo_section_title" type="text"/>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input class="btn btn-primary" type="submit" value="Lưu"/>
            </div>
        </div>
    </form>
</div>