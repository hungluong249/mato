<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="row">
        <div class="container col-md-12">
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0" style="margin-left: 15px;">
                    <h1>Add project</h1>
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>
                    <div class="form-group">
                        <?php
                        echo form_label('Title', 'project_title');
                        echo form_error('project_title');
                        echo form_input('project_title', set_value('project_title'), 'class="form-control"');
                        ?>
                    </div>
					<div class="form-group">
                        <?php
                        echo form_label('Main Color', 'project_color');
                        echo form_error('project_color');
                        echo form_input('project_color', set_value('project_color'), 'class="form-control"');
                        ?>
					</div>
                    <div class="form-group">
                        <?php
                        echo form_label('Customer', 'project_customer');
                        echo form_error('project_customer');
                        echo form_input('project_customer', set_value('project_customer'), 'class="form-control"');
                        ?>
                    </div>
					<div class="form-group">
                        <?php
                        echo form_label('Year', 'project_year');
                        echo form_error('project_year');
                        echo form_input('project_year', set_value('project_year'), 'class="form-control"');
                        ?>
					</div>
                    <div class="form-group">
                        <?php
                        echo form_label('Location', 'project_location');
                        echo form_error('project_location');
                        echo form_input('project_location', set_value('project_location'), 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Type', 'project_type');
                        echo form_error('project_type');
                        echo form_input('project_type', set_value('project_type'), 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="project_description_picture">Special</label><br />
                        <input type="checkbox" name="is_special" value="1" class="btn-special">
                    </div>
                    <div class="form-group picture" id="special">

                    </div>
                    <div class="form-group picture">
                        <?php
                        echo form_label('Description Image', 'project_description_picture');
                        echo form_error('project_description_picture');
                        echo form_upload('project_description_picture[]', set_value('project_description_picture'), 'class="form-control" multiple');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Class', 'project_class').'<br>';
                        echo form_error('project_class');
                        ?>
                        <?php foreach ($project_class as $key => $value): ?>
                            <input type="radio" name="project_class" value="<?php echo $key ?>" > <?php echo $value ?><br>
                        <?php endforeach ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Description', 'project_description');
                        echo form_error('project_description');
                        echo form_textarea('project_description', set_value('project_description', ''), 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Content', 'project_content');
                        echo form_error('project_content');
                        echo form_textarea('project_content', set_value('project_content', '', false), 'class="form-control content"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $options = array(
        	        	'0' => '', 
        	        	'1' => 'hot', 
        	        	'2' => 'branding', 
        	        	'3' => 'design', 
        	        	'4' => 'photography',
        	        	'5' => 'packaging',
        	        	'6' => 'print',
        	        	'7' => 'marketing'
                        );
                        echo form_label('Filter project', 'project_filter');
                        echo form_error('project_filter');
                        echo form_dropdown('project_filter', $options, set_value('project_filter', 0), 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Secondary filter project', 'project_secondary_filter');
                        echo form_error('project_secondary_filter');
                        echo form_dropdown('project_secondary_filter', $options, set_value('project_secondary_filter', 0), 'class="form-control"');
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
    </section>
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

    var input_image = '<label for="project_special">Special Image</label><input type="file" name="project_image_special" class="form-control">';
    $('.btn-special').click(function(){
        if(this.checked){
        $('#special').html(input_image);
        $('#image_special').css('display', 'block');
        }else{
            $('#special').html('');
            $('#image_special').css('display', 'none');
        }
    })
    $('.btn-special').each(function(){
        if(this.checked){
            $('#image_special').css('display', 'block');
            $('#special').html(input_image);
        }
    })
</script>