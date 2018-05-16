<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <?php if ($this->session->flashdata('message_error')): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> alert!</h4>
                <?php echo $this->session->flashdata('message_error'); ?>
            </div>
        <?php endif ?>
    </section>
    <section class="row">
        <div class="container col-md-12">
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0" style="margin-left: 15px;">
                    <h1>Edit Partner</h1>
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>
                    <div class="form-group">
                        <?php
                        echo form_label('Title', 'title');
                        echo form_error('title');
                        echo form_input('title', set_value('title', $detail['title']), 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="title">Image is in use</label><br />
                        <img src="<?php echo base_url('assets/upload/partners/'. $detail['image']) ?>" width=150>
                    </div>
                    <div class="form-group picture">
                        <?php
                        echo form_label('Image', 'image');
                        echo form_error('image');
                        echo form_upload('image', set_value('image'), 'class="form-control"');
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