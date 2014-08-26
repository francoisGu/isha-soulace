<?php
$kopa_setting = kopa_get_template_setting();
$sidebars = $kopa_setting['sidebars'];
get_header();

?>

    <div class="bottom-content">
   
        <div class="main-col">
            
	 	<?php
	    if (function_exists('kopa_breadcrumb')){
	    	 kopa_breadcrumb();
			}
		?>
            
                
                <div class="error">
                	<div class="kopa-one-third left-col ">
                    <h1><?php _e('404', kopa_get_domain());?></h1>
                    </div>
                    
                    <div class="kopa-two-third last">
                    <h1><?php _e('Page not found...', kopa_get_domain());?></h1>
                    <p><?php _e("We're sorry, but we can't find the page you were looking for. It's probably some thing we've done wrong but now we know about it we'll try to fix it. In the meantime, try one of this options:", kopa_get_domain());?></p>
                    <ul>
                        <li><a href="javascript: history.go(-1);"><?php _e('Go back to previous page', kopa_get_domain());?></a></li>
                        <li><a href="<?php echo home_url(); ?>"><?php _e('Go to homepage', kopa_get_domain());?></a></li>
                    </ul>
                    </div>
                    
               </div>  
        </div>
        <div class="clear"></div>
    </div>

<?php
get_footer();
?>