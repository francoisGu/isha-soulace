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
$audio = kopa_content_get_audio(get_the_content());

if (isset($audio[0])) {
    $audio = $audio[0];
    if (isset($audio['shortcode'])) {
?>
            <div class="entry-thumb">
                <?php
				echo do_shortcode($audio['shortcode']);
				//echo $audio['shortcode'];
			?>
                <!-- video-wrapper -->
            </div>
            <?php
			} elseif (has_post_thumbnail() && 'show' === get_option('kopa_theme_options_thumbnail_image','show')) {
			echo '<div class="entry-thumb">';
			the_post_thumbnail($featured_image_size);
			echo '</div>';
			} // endif
			}
		?>

    <div class="entry-content">
        
        <div class="clear"></div>
        <?php
		$content = get_the_content();
		$content = preg_replace("/\[audio.*].*\[\/audio]/", '', $content);
		$content = preg_replace('/\[soundcloud.*].*\[\/soundcloud]/', '', $content);
		$content = apply_filters('the_content', $content);
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
     <?php if (get_the_tags()) { ?>
    <div class="tag-box pull-left">
        <span><?php echo __('Tagged with:', kopa_get_domain()); ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <?php
		the_tags('', ', ', '');
	?>
    </div>
    <?php } ?>
    <div class="clear"></div>

    <?php $post_link = get_option('kopa_theme_options_post_link'); ?>
    <?php if ($post_link == 'show') {
    	kopa_post_navigation();
    } ?>

</div>



