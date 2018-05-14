<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="row">
        <span><?php echo $this->session->flashdata('message'); ?></span>
    </div>
    <div class="row">
        <a type="button" href="<?php echo site_url('admin/news/create'); ?>" class="btn btn-primary">ADD NEWS</a>
        <a type="button" class="btn btn-danger disabled">DELETE ALL SELECTED NEWS</a>
    </div>
    <div class="row">
        <div class="col-lg-12" style="margin-top: 10px;">
            <?php
            echo '<table class="table table-hover table-bordered table-condensed">';
            echo '<tr>';
            echo '<td><input type="checkbox" class="check-all" id="check-all" /></td>';
            echo '<td><b><a href="#">ID</a></b></td>';
            echo '<td><b><a href="#">Title</a></b></td>';
//            echo '<td><b><a href="#">Image</a></b></td>';
            echo '<td><b><a href="#">Description</a></b></td>';
            echo '<td><b>Operations</b></td>';
            echo '</tr>';
            if (!empty($news)) {
                foreach ($news as $item):
                    echo '<tr>';
                    echo '<td><input type="checkbox" class="checkbox" name="checkbox[' . $item['news_id'] . ']" value="' . $item['news_id'] . '" /></td>';
                    echo '<td>' . $item['news_id'] . '</td>';
                    echo '<td>' . $item['news_title'] . '</td>';
                    echo '<td>' . $item['news_description'] . '</td>';
                    echo '<td>' . anchor('admin/news/edit/' . $item['news_id'], '<span class="glyphicon glyphicon-pencil"></span>');
                    echo ' ' . anchor('admin/news/delete/' . $item['news_id'], '<span class="glyphicon glyphicon-remove"></span>') . '</td>';
                    echo '</tr>';
                endforeach;
            }else {
                echo '<tr class="odd"><td colspan="9">No records</td></tr>';
            }
            echo '</table>';
            ?>
            <div class="col-md-6 col-md-offset-5">
                <?php echo $page_links; ?>
            </div>
        </div>
    </div>  
</div>
