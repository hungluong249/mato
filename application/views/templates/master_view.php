<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('templates/public_parts/master_header_view');
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <?php
        echo $the_view_content;
        ?>
    </section>
</section>
<!--main content end-->
<?php
$this->load->view('templates/public_parts/master_footer_view');
?>