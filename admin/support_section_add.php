<div class="container-fluid">
    <h3>Add new support</h3>
    <hr>
    <form class="form-horizontal" action="support_section_add_action.php" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label">Tiêu đề</label>
            <div class="col-sm-10">
                <input id="support-section-title" name="support_section_title" type="text"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Tiêu đề phụ</label>
            <div class="col-sm-10">
                <input id="support-section-subtitle" name="support_section_subtitle" type="text"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Mô tả</label>
            <div class="col-sm-10">
                <textarea id="support-section-description" class="form-control" name="support_section_description"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Icon đại diện</label>
            <div class="col-sm-10">
                <input id="support-section-image" name="support_section_image" type="text"/>
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