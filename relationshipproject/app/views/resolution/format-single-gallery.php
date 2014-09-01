<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('entry-box'); ?>>
    
    <h4 class="entry-title">
        <span class="bold-line"><span></span></span>
        <span class="solid-line"></span>
        <span class="text-title"><?php the_title(); ?></span>
    </h4>
    <!-- entry-title -->
    <?php
    
    
    $src = kopa_content_get_gallery_attachment_ids(get_the_content());
   
    if(!empty($src)){
        ?>
        <div class="entry-thumb">
            <div class="flexslider kp-blogpost-thumb-slider loading">
                <ul class="slides">
                    <?php for ($_i = 0; $_i < count($src); $_i++): ?>
                    <?php $image_src =wp_get_attachment_image_src($src[$_i],'kopa-image-size-2');  ?>
                    <li data-thumb="<?php echo $image_src[0]; ?>">
                            <?php wp_get_attachment_image($src[$_i],'kopa-image-size-2') ?>
                        </li>
                    <?php endfor; ?>
                </ul>
                <!-- slides -->
            </div>
            <!-- kp-blogpost-thumb-slider -->
        </div><!-- entry-thumb -->
    <?php } ?>
    <div class="entry-content">
        
        <div class="clear"></div>
        <?php 
        $content = get_the_content(); 
        $content = preg_replace('/\[gallery.*](.*\[gallery]){0,1}/', '', $content);
        $content = apply_filters( 'the_content', $content );
        $content = str_replace(']]>', ']]&gt;', $content);
        echo $content;
        ?>
    </div>
    <!-- entry-content -->

    <?php
    $args = array(
		'before' => '<div class="page-links pull-right"><span class="page-links-title">'.__('Pages',kopa_get_domain()).':</span>',
        'after' => '</div>',
        'pagelink'=>'<span>%</span>'
        );
    wp_link_pages($args); ?>
    <!-- page-links -->
     <?php if(get_the_tags()){ ?>
    <div class="tag-box pull-left">
        <span><?php echo __('Tagged with:', kopa_get_domain()); ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <?php
         the_tags('', ', ', ''); 
        ?>
    </div>
    <?php } ?>
    <div class="clear"></div>

    <?php $post_link = get_option('kopa_theme_options_post_link'); ?>
    <?php if($post_link=='show'){
    	kopa_post_navigation();
    } ?>

</div>



