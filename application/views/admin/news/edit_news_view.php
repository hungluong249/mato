<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="row modified-mode">
        <div class="col-lg-10 col-lg-offset-0">
            <h1>Edit news</h1>
            <?php
            echo form_open_multipart('', array('class' => 'form-horizontal'));
            ?>
            <div class="form-group">
                <?php
                echo form_label('Title', 'news_title');
                echo form_error('news_title');
                echo form_input('news_title', set_value('news_title', $news['news_title']), 'class="form-control"');
                ?>
            </div>
            <div class="form-group picture">
                <?php
                echo form_label('Description Image', 'news_description_picture');
                echo form_error('news_description_picture');
                echo form_upload('news_description_picture', set_value('news_description_picture'), 'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Description', 'news_description');
                echo form_error('news_description');
                echo form_textarea('news_description', set_value('news_description', $news['news_description'], false), 'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Content', 'news_content');
                echo form_error('news_content');
                echo form_textarea('news_content', set_value('news_content', $news['news_content'], false), 'class="form-control content"');
                ?>
            </div>
            <br>
            <div class="form-group col-sm-12 text-right">
                <?php
                echo form_submit('submit', 'OK', 'class="btn btn-primary"');
                echo form_close();
                ?>
                <a class="btn btn-default cancel" href="javascript:window.history.go(-1);">Go back</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo site_url('tinymce/tinymce.min.js'); ?>"></script>
<script>
    tinymce.init({
        selector: ".content",
        theme: "modern",
        height: 200,
        relative_urls: false,
        remove_script_host: false,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
        ],
        content_css: "css/content.css",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: "Bold text", inline: "b"},
            {title: "Red text", inline: "span", styles: {color: "#ff0000"}},
            {title: "Red header", block: "h1", styles: {color: "#ff0000"}},
            {title: "Example 1", inline: "span", classes: "example1"},
            {title: "Example 2", inline: "span", classes: "example2"},
            {title: "Table styles"},
            {title: "Table row 1", selector: "tr", classes: "tablerow1"}
        ],
        external_filemanager_path: "<?php echo site_url('filemanager/'); ?>",
        filemanager_title: "Responsive Filemanager",
        external_plugins: {"filemanager": "<?php echo site_url('filemanager/plugin.min.js'); ?>"}
    });
</script>