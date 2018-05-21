<?php
if ($this->ion_auth->logged_in()) {
    ?>
    <!--sidebar start-->
    <aside class="main-sidebar">
        <section class="sidebar" style="height: auto;">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo site_url('assets/admin/'); ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>MaTo Creative</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
                <!-- sidebar menu start-->
                <ul class="sidebar-menu tree" data-widget="tree">          
                    <li class="">
                        <a href="<?php echo base_url('admin/dashboard'); ?>">
                            <i class="fa fa-tachometer" aria-hidden="true"></i>
                            <span>Dashboard</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo site_url('admin/banners'); ?>" class="">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                            <span>Banners</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo site_url('admin/projects'); ?>" class="">
                            <i class="icon_document_alt"></i>
                            <span>Projects</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>      
                    <li class="">
                        <a href="<?php echo site_url('admin/news'); ?>" class="">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            <span>News</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>  
                    <li class="treeview">
                        <a href="javascript:;" class="">
                            <i class="icon_documents_alt"></i>
                            <span>Projects</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a class="" href="<?php echo site_url('admin/projects/index'); ?>">List projects</a>
                            </li>
                            <li>
                                <a class="" href="<?php echo site_url('admin/projects/create'); ?>">Create project</a>
                            </li>
                            <li>
                                <a class="" href="<?php echo site_url('admin/articles/index'); ?>">List articles</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="" href="<?php echo site_url('admin/partners'); ?>">
                            <i class="icon_genius"></i>
                            <span>Partners</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?php echo site_url('admin/teams'); ?>">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Teams</span>
                        </a>
                    </li>
                </ul>
                <!-- sidebar menu end-->
        </section>
    </aside>
    <!--sidebar end-->
<?php } ?>



