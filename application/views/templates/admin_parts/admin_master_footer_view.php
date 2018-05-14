

<!-- javascripts -->
<script src="<?php echo site_url('assets/admin/js/jquery.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/jquery-ui-1.10.4.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/jquery-1.8.3.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/admin/js/jquery-ui-1.9.2.custom.min.js'); ?>"></script>
<!-- bootstrap -->
<script src="<?php echo site_url('assets/admin/js/bootstrap.min.js'); ?>"></script>
<!-- nice scroll -->
<script src="<?php echo site_url('assets/admin/js/jquery.scrollTo.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/admin/js/owl.carousel.js'); ?>" ></script>
<script src="<?php echo site_url('assets/admin/js/jquery.rateit.min.js'); ?>"></script>
<!-- custom select -->
<script src="<?php echo site_url('assets/admin/js/jquery.customSelect.min.js'); ?>" ></script>

<!--custome script for all page-->
<script src="<?php echo site_url('assets/admin/js/scripts.js'); ?>"></script>
<!-- custom script for this page-->
<script src="<?php echo site_url('assets/admin/js/jquery.autosize.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/jquery.placeholder.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/gdp-data.js'); ?>"></script>	
<script src="<?php echo site_url('assets/admin/js/jquery.slimscroll.min.js'); ?>"></script>

<script src="<?php echo site_url('assets/admin/js/admin/users.js'); ?>"></script>	
<script src="<?php echo site_url('assets/admin/js/admin/groups.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/admin/languages.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/admin/dashboard.js'); ?>"></script>

<script type="text/javascript">

    $("document").ready(function () {
        var pathname = window.location.pathname;

        if (pathname.indexOf("groups") >= 0) {
            GROUPS.initial();
        } else if (pathname.indexOf("users") >= 0) {
            USERS.initial();
        } else if (pathname.indexOf("languages") >= 0) {
            LANGUAGES.initial();
        } else if (pathname.indexOf("dashboard") >= 0) {
            DASHBOARD.initial();
        }

    });
</script>

</body>
</html>

