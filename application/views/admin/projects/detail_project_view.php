
<style type="text/css">
    [class*='close-'] {
  color: #777;
  font: 14px/100% arial, sans-serif;
  position: absolute;
  right: 5px;
  text-decoration: none;
  text-shadow: 0 1px 0 #fff;
  top: 5px;
}

.close-classic:after {
  content: '✖'; /* ANSI X letter */
  color: red;
}
.close-classic:hover{
    color: #ffffff;
}
/* Dialog */

.dialog {
  border: 1px solid #ccc;
  border-radius: 5px;
  float: left;
  margin: 20px;
  position: relative;
  width: 150px;
  
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>
                Sản Phẩm
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chi tiết</a></li>
            <li class="active">
                Sản Phẩm
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom: 10px">
                                <label for="project_description_picture">Image special in use</label><br />
                                <?php if ($detail['project_is_special'] == 1): ?>
                                    <img src="<?php echo base_url('assets/upload/projects/'. $detail['project_image_special']) ?>" width=150>
                                <?php else: ?>
                                    Not special!
                                <?php endif ?>
                                
                            </div>
                            <div class="detail-image col-md-12">
                                <label>Hình ảnh</label>
                                <div class="row">
                                    <?php if ($detail['project_description_image'] != ''): ?>
                                        <?php $image = json_decode($detail['project_description_image']) ?>
                                        <?php foreach ($image as $key => $value): ?>
                                            <div class="dialog remove_<?php echo $key ?>">
                                                <img src="<?php echo base_url('assets/upload/projects/'.$value) ?>" width=150 style="cursor: pointer;" class="btn-active-img" data-id="<?php echo $detail['project_id'] ?>" data-image="<?php echo $value ?>" data-key="<?php echo $key ?>" >

                                                <a href="#" class="close-classic" data-id="<?php echo $detail['project_id'] ?>" data-image="<?php echo $value ?>" data-key="<?php echo $key ?>" ></a>
                                                <?php if ($value == $detail['project_avatar']): ?>
                                                    <i class="fa fa-thumb-tack" aria-hidden="true" style="color: red"></i>
                                                <?php endif ?>

                                            </div>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="detail-info col-md-12">
                                <div class="table-responsive">
                                    <label>Thông tin</label>
                                    <table class="table table-striped">
                                        <tr>
                                            <th colspan="2">Thông tin cơ bản</th>
                                        </tr>
                                        <tr>
                                            <th>Title</th>
                                            <td><?php echo $detail['project_title'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Customer</th>
                                            <td><?php echo $detail['project_customer'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Location</th>
                                            <td><?php echo $detail['project_location'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td><?php echo $detail['project_type'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td><?php echo $detail['project_description'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Content</th>
                                            <td><?php echo $detail['project_content'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Filter project</th>
                                            <td><?php echo $detail['project_filter'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Secondary filter project</th>
                                            <td><?php echo $detail['project_secondary_filter'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Chỉnh sửa 
                            Sản Phẩm
                         này?</h3>
                    </div>
                    <div class="box-body">
                        <a href="<?php echo base_url('admin/projects/edit/'. $detail['project_id']) ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
<script type="text/javascript">
    $('.close-classic').click(function(){
        var url = 'http://localhost/mato/admin/projects/remove_image';
        var key = $(this).data('key');
        var id = $(this).data('id');
        var image = $(this).data('image');
        if(confirm('Chắc chắn xóa?')){
            $.ajax({
                method: "get",
                url: url,
                data: {
                    id : id, image : image
                },
                success: function(response){
                    if(response.status == 200 && response.message == ''){
                        $('.remove_' + key).fadeOut();
                    }
                    if(response.status == 200 && response.message != ''){
                        alert(response.message);
                    }
                },
                error: function(jqXHR, exception){
                    console.log(errorHandle(jqXHR, exception));
                }
            });
        }
    });

    $('.btn-active-img').click(function(){
        var url = 'http://localhost/mato/admin/projects/active_image';
        var id = $(this).data('id');
        var image = $(this).data('image');
        if(confirm('Chắc chắn chọn ảnh này làm Avatar?')){
             $.ajax({
                method: "get",
                url: url,
                data: {
                    id : id, image : image
                },
                success: function(response){
                    if(response.status == 200){
                        location.reload();
                    }
                },
                error: function(jqXHR, exception){
                    console.log(errorHandle(jqXHR, exception));
                }
            });
        }
    });
</script>