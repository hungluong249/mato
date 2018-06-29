<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div class="row">
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div class="row">
                <h3>
                    <?php switch ($this->uri->segment(3)) {
                        case 'index':
                            echo 'Pending';
                            break;
                        case 'success':
                            echo 'Success';
                            break;
                        case 'cancel':
                            echo 'Cancel';
                            break;
                        default:
                            echo 'Pending';
                            break;
                    } ?>
                </h3>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top: 10px;">
                    
                    <table class="table table-hover table-bordered table-condensed">
                        <thead>
                            <tr>
                                <td><b><a href="#">STT</a></b></td>
                                <td><b><a href="#">Name</a></b></td>
                                <td><b><a href="#">Email</a></b></td>
                                <td><b><a href="#">Phone</a></b></td>
                                <td><b><a href="#">Budget</a></b></td>
                                <td><b><a href="#">Timeline</a></b></td>
                                <td><b>Operations</b></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($result): ?>
                        <?php foreach ($result as $key => $value): ?>
                            <tr class="row-<?php echo $value['id'] ?>">
                                <td><b><?php echo $key ?></b></td>
                                <td><b><?php echo $value['name'] ?></b></td>
                                <td><b><?php echo $value['email'] ?></b></td>
                                <td><b><?php echo $value['phone'] ?></b></td>
                                <td><b>
                                    <?php 
                                        switch ($value['price']) {
                                            case 0:
                                                echo 'Under 500$';
                                                break;
                                            case 1:
                                                echo '500$ - 1500$';
                                                break;
                                            case 2:
                                                echo 'Above 1500$';
                                                break;
                                            default:
                                                echo 'Under 500$';
                                                break;
                                        }
                                    ?>
                                </b></td>
                                <td><b>
                                    <?php 
                                        switch ($value['time']) {
                                            case 0:
                                                echo 'Under 1 month';
                                                break;
                                            case 1:
                                                echo '1 month - 3 month';
                                                break;
                                            case 2:
                                                echo 'Above 3 month';
                                                break;
                                            default:
                                                echo 'Under 1 month';
                                                break;
                                        }
                                    ?>
                                </b></td>
                                <td style="text-align: center;">
                                    <a role="button" data-toggle="collapse" href="#collapseExample-<?php echo $value['id'] ?>" aria-expanded="false" aria-controls="collapseExample-<?php echo $value['id'] ?>" title="Xem">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <?php if ($this->uri->segment(3) != 'cancel'): ?>
                                        <?php if ($this->uri->segment(3) != 'cancel' && $this->uri->segment(3) != 'success'): ?>
                                            &nbsp;&nbsp;&nbsp;
                                            <a href="javascript:void(0)" style="color: #5cb85c" title="Xác nhận" class="btn-status" data-id="<?php echo $value['id'] ?>" data-url="<?php echo base_url('admin/register_project/status_success') ?>">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </a>
                                        <?php endif ?>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="javascript:void(0)" style="color: #ac2925" title="Hủy Bỏ" class="btn-status" data-id="<?php echo $value['id'] ?>" data-url="<?php echo base_url('admin/register_project/status_cancel') ?>">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    <?php endif ?>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="collapse" id="collapseExample-<?php echo $value['id'] ?>">
                                        <table class="table" style="background-color: #72bde9; color: #fff">
                                            <tr>
                                                <td>Position</td>
                                                <td><?php echo $value['position'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Company</td>
                                                <td><?php echo $value['company'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Service</td>
                                                <td><?php echo $value['service'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Plan</td>
                                                <td><?php echo $value['plan'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <?php else: ?>
                            <tr class="odd"><td colspan="9">No records</td></tr>
                        <?php endif ?>
                        </tbody>
                    </table>
                    <div class="col-md-6 col-md-offset-5">
                        <?php echo $page_links; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>

<script type="text/javascript">
    $('.btn-status').click(function(){
        var id = $(this).data('id');
        var url = $(this).data('url');
        if(confirm('Chắc chắn thực hiện thao tác này?')){
            $.ajax({
                method: "get",
                url: url,
                data: {
                    id : id
                },
                success: function(response){
                    console.log(response);
                    if(response.status == 200){
                        $('.row-' + id).fadeOut();
                    }
                },
                error: function(jqXHR, exception){
                    console.log(errorHandle(jqXHR, exception));
                    if(jqXHR.status == 404 && jqXHR.responseJSON.message != 'undefined'){
                        alert(jqXHR.responseJSON.message);
                        location.reload();
                    }
                }
            });
        }
    })
</script>
