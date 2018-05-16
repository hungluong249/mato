<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div class="row">
                <?php if ($this->session->flashdata('message_error')): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> alert!</h4>
                        <?php echo $this->session->flashdata('message_error'); ?>
                    </div>
                <?php endif ?>
                <?php if ($this->session->flashdata('message_success')): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> alert!</h4>
                        <?php echo $this->session->flashdata('message_success'); ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="row">
                <a type="button" href="<?php echo site_url('admin/partners/create'); ?>" class="btn btn-primary">ADD NEWS</a>
                <a type="button" class="btn btn-danger disabled">DELETE ALL SELECTED NEWS</a>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top: 10px;">
                    <table class="table table-hover table-bordered table-condensed">
                        <tr>
                            <td><input type="checkbox" class="check-all" id="check-all" /></td>
                            <td><b><a href="#">ID</a></b></td>
                            <td><b><a href="#">Image</a></b></td>
                            <td><b><a href="#">Title</a></b></td>
                            <td><b>Operations</b></td>
                        </tr>
                    <?php if (!empty($result)): ?>
                        <?php foreach ($result as $key => $item): ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="checkbox" name="checkbox['<?php echo $item['id'] ?>']" value="<?php echo $item['id'] ?>" />
                                </td>
                                <td><?php echo $item['id'] ?></td>
                                <td width="30%"><img src="<?php echo base_url('assets/upload/partners/'. $item['image']) ?>"></td>
                                <td><?php echo $item['title'] ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/partners/edit/'. $item['id']) ?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="<?php echo base_url('admin/partners/delete/'. $item['id']) ?>">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    <?php endif ?>
                    </table>
                    <div class="col-md-6 col-md-offset-5">
                        <?php echo $page_links; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>   
</div>
