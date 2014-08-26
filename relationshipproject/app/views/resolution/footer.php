<?php
$kopa_setting = kopa_get_template_setting();
$sidebars = $kopa_setting['sidebars'];
$total = count( $sidebars );
$footer_sidebar[0] = ($kopa_setting) ? $sidebars[$total - 3] : 'sidebar_6';
$footer_sidebar[1] = ($kopa_setting) ? $sidebars[$total - 2] : 'sidebar_7';
$footer_sidebar[2] = ($kopa_setting) ? $sidebars[$total - 1] : 'sidebar_8';

?>

</div>
    <!-- main-content -->    

</div>
<!-- wrapper -->

<div id="bottom-sidebar">
        
    <div class="wrapper">

        <?php if ( is_active_sidebar( $footer_sidebar[0] ) ) { ?>
        <div class="widget-area-9">
            <?php dynamic_sidebar( $footer_sidebar[0] ); ?>
            <div class="r-color"></div>
        </div>
        <!-- widget-area-9 -->
        <?php } ?>

        <?php if ( is_active_sidebar( $footer_sidebar[1] ) ) { ?>
        <div class="widget-area-10">
            <?php dynamic_sidebar( $footer_sidebar[1] ); ?>
            <div class="r-color"></div>
        </div>
        <!-- widget-area-10 -->
        <?php } ?>

        <?php if ( is_active_sidebar( $footer_sidebar[2] ) ) { ?>
        <div class="widget-area-11">
            <?php dynamic_sidebar( $footer_sidebar[2] ); ?>
        </div>
        <!-- widget-area-11 -->
        <?php } ?>

        <div class="clear"></div>

    </div>
    <!-- wrapper -->

</div>
<!-- bottom-sidebar -->


<footer id="kp-page-footer">
    <div class="wrapper clearfix">
        <?php if(get_option('kopa_theme_options_copyright')){ ?>
        <p id="copyright" class="pull-left"> <?php echo htmlspecialchars(stripslashes(get_option('kopa_theme_options_copyright'))); ?></p>       
        <?php }  ?>
            <?php
            if (has_nav_menu('footer-nav')):
                    wp_nav_menu(
                            array(
                                'theme_location' => 'footer-nav',
                                'container_class' => 'clearfix',
                                'container_id' => 'footer-nav',
                                'container_class' => 'pull-right',
                                'menu_id' => 'footer-menu',
                                'menu_class' => 'clearfix',
                                'depth'=>-1
                            )
                    );
            endif;                            
            ?>
        <!-- footer-nav -->
    </div>
    <!-- wrapper -->
</footer>
<!-- kp-page-footer -->
<?php wp_footer();?>
</body>

</html>
