<?php
if ($this->ion_auth->logged_in()) {
    ?>
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">                
                <li class="active">
                    <a class="" href="<?php echo site_url('admin/dashboard'); ?>">
                        <i class="icon_house_alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="<?php echo site_url('admin/banners'); ?>" class="">
                        <i class="icon_document_alt"></i>
                        <span>Banners</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="<?php echo site_url('admin/projects'); ?>" class="">
                        <i class="icon_document_alt"></i>
                        <span>Projects</span>
                    </a>
                </li>      
                <li class="sub-menu">
                    <a href="<?php echo site_url('admin/news'); ?>" class="">
                        <i class="icon_document_alt"></i>
                        <span>News</span>
                    </a>
                </li>  
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon_documents_alt"></i>
                        <span>Projects</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo site_url('admin/projects/index'); ?>">List projects</a></li>
                        <li><a class="" href="<?php echo site_url('admin/projects/create'); ?>">Create project</a></li>
                        <li><a class="" href="<?php echo site_url('admin/articles/index'); ?>">List articles</a></li>
                    </ul>
                </li>
                <li>
                    <a class="" href="<?php echo site_url('admin/news'); ?>">
                        <i class="icon_genius"></i>
                        <span>News</span>
                    </a>
                </li>
                <!--            <li>                     
                                <a class="" href="chart-chartjs.html">
                                    <i class="icon_piechart"></i>
                                    <span>Charts</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;" class="">
                                    <i class="icon_table"></i>
                                    <span>Tables</span>
                                    <span class="menu-arrow arrow_carrot-right"></span>
                                </a>
                                <ul class="sub">
                                    <li><a class="" href="basic_table.html">Basic Table</a></li>
                                </ul>
                            </li>
                
                            <li class="sub-menu">
                                <a href="javascript:;" class="">
                                    <i class="icon_documents_alt"></i>
                                    <span>Pages</span>
                                    <span class="menu-arrow arrow_carrot-right"></span>
                                </a>
                                <ul class="sub">                          
                                    <li><a class="" href="profile.html">Profile</a></li>
                                    <li><a class="" href="login.html"><span>Login Page</span></a></li>
                                    <li><a class="" href="blank.html">Blank Page</a></li>
                                    <li><a class="" href="404.html">404 Error</a></li>
                                </ul>
                            </li>-->

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
<?php } ?>



