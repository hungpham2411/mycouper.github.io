<div class="container-fluid">
    <h3>Add video</h3>
    <hr>
    <form class="form-horizontal" action="video_section_add_action.php" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label">Ảnh đại diện</label>
            <div class="col-sm-10">
                <input id="video-section-image-file" name="file" type="file"/>
                <p><i>File allowed extensions is "png", "jpg", "jpeg" and file size do not greater 512KB</i></p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Tiêu đề</label>
            <div class="col-sm-10">
                <input id="video-section-title" class="form-control" name="video_section_title" type="text"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Video URL</label>
            <div class="col-sm-10">
                <input id="video-section-url" class="form-control" name="video_section_url" type="url"/>
                <p><i>Video URL must be Youtube URL or Vimeo URL</i></p>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input class="btn btn-primary" type="submit" value="Lưu"/>
            </div>
        </div>
    </form>
</div>