<?php

class Kopa_Flex_Slider_Widget extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => '', 'description' => __('Flex Slider show posts by categories and/or tags', kopa_get_domain()));
        $control_ops = array('width' => '500', 'height' => 'auto');
        parent::__construct('kopa_flex_slider_widget', __('Kopa Flex Slider', kopa_get_domain()), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);
        
        $animation = $instance['animation'];
        $direction = $instance['direction'];
        $slideshowSpeed = $instance['slideshowSpeed'];
        $animationSpeed = $instance['animationSpeed'];
        $is_Autoplay = $instance['isAutoplay'];
        $query_args['categories'] = $instance['categories'];
        $query_args['relation'] = $instance['relation'];
        $query_args['tags'] = $instance['tags'];
        $query_args['posts_per_page'] = intval($instance['number_of_article']);
        $query_args['orderby'] = $instance['orderby'];
        $slider = kopa_widget_posttype_build_query($query_args);
        
        if ($slider->have_posts()):
            ?>
            <div class="flexslider kp-blogpost-slider loading" data-animation = "<?php echo $animation; ?>" data-direction = "<?php echo $direction; ?>" data-slideshow-speed = "<?php echo $slideshowSpeed; ?>" data-animation-speed = "<?php echo $animationSpeed; ?>" data-autoplay = "<?php echo $is_Autoplay; ?>" >
                <ul class="slides">
                    <?php
                    while ($slider->have_posts()):
                        $slider->the_post();
                        $post_format = get_post_format(get_the_ID());
                        if ($post_format == '') {
                            $post_format = 'standard';
                        }
                        ?>
                        <li class="<?php echo $post_format; ?>-post">
                            <?php
                            if (has_post_thumbnail()):
                                ?>
                                <div class="entry-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('kopa-image-size-0'); ?>
                                    </a>
                                </div>
                                <!-- entry-thumb -->
                            <?php endif; ?>
                            <div class="entry-content">
                                <span class="h-line"></span>
                                <header class="clearfix">
                                    <span class="entry-icon pull-right text-center"><span class="fa fa-camera-retro"></span></span>
                                    <div class="header-content">
                                        <h6 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="bottom-line"></span></h6>
                                        <?php if (get_the_category()) { ?>
                                            <span class="entry-categories"> <?php the_category(', '); ?></span>
                                        <?php } // endif ?>
                                    </div>
                                    <!-- header-content -->
                                </header>
                            </div>
                            <!-- entry-content -->
                        </li>
                        <?php
                    endwhile;
                    ?>
                </ul>
            </div>
            <?php
        endif;
        wp_reset_postdata();
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        
        $instance['categories'] = (empty($new_instance['categories'])) ? array() : array_filter($new_instance['categories']);
        $instance['relation'] = $new_instance['relation'];
        $instance['tags'] = (empty($new_instance['tags'])) ? array() : array_filter($new_instance['tags']);
        $instance['number_of_article'] = $new_instance['number_of_article'];
        $instance['orderby'] = $new_instance['orderby'];
        $instance['animation'] = $new_instance['animation'];
        $instance['direction'] = $new_instance['direction'];
        $instance['slideshowSpeed'] = $new_instance['slideshowSpeed'];
        $instance['animationSpeed'] = $new_instance['animationSpeed'];
        $instance['isAutoplay'] =  isset($new_instance['isAutoplay']) ? $new_instance['isAutoplay']: 'false';
        return $instance;
    }

    function form($instance) {

        $default = array(
            'title' => '',
            'categories' => array(),
            'relation' => 'OR',
            'tags' => array(),
            'number_of_article' => 8,
            'orderby' => 'latest',
            'animation' => 'slide',
            'direction' => 'horizontal',
            'slideshowSpeed' => 7000,
            'animationSpeed' => 600,
            'isAutoplay' => 'true',
            
        );
        $instance = wp_parse_args((array) $instance, $default);
        
        $form['categories'] = $instance['categories'];
        $form['relation'] = esc_attr($instance['relation']);
        $form['tags'] = $instance['tags'];
        $form['number_of_article'] = (int) $instance['number_of_article'];
        $form['orderby'] = $instance['orderby'];
        $form['animation'] = $instance['animation'];
        $form['direction'] = $instance['direction'];
        $form['slideshowSpeed'] = (int) $instance['slideshowSpeed'];
        $form['animationSpeed'] = (int) $instance['animationSpeed'];
        ?>
        
        <div class="kopa-one-half">
            <p>
                <label for="<?php echo $this->get_field_id('categories'); ?>"><?php echo __('Categories:', kopa_get_domain()); ?></label>                
                <select class="widefat" id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>[]" multiple="multiple" size="5" autocomplete="off">
                    <option value=""><?php echo __('-- None --', kopa_get_domain()); ?></option>
                    <?php
                    $categories = get_categories();
                    foreach ($categories as $category) {
                        printf('<option value="%1$s" %4$s>%2$s (%3$s)</option>', $category->term_id, $category->name, $category->count, (in_array($category->term_id, (isset($form['categories']) ? $form['categories'] : array())) ) ? 'selected="selected"' : '');
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('relation'); ?>"><?php echo __('Relation:', kopa_get_domain()); ?></label>                
                <select class="widefat" id="<?php echo $this->get_field_id('relation'); ?>" name="<?php echo $this->get_field_name('relation'); ?>" autocomplete="off">
                    <?php
                    $relation = array(
                        'AND' => __('And', kopa_get_domain()),
                        'OR' => __('Or', kopa_get_domain())
                    );
                    foreach ($relation as $value => $title) {
                        printf('<option value="%1$s" %3$s>%2$s</option>', $value, $title, ($value === $form['relation']) ? 'selected="selected"' : '');
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('tags'); ?>"><?php echo __('Tags:', kopa_get_domain()); ?></label>                
                <select class="widefat" id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>[]" multiple="multiple" size="5" autocomplete="off">
                    <option value=""><?php echo __('-- None --', kopa_get_domain()); ?></option>
                    <?php
                    $tags = get_tags();
                    foreach ($tags as $tag) {
                        printf('<option value="%1$s" %4$s>%2$s (%3$s)</option>', $tag->term_id, $tag->name, $tag->count, (in_array($tag->term_id, (isset($form['tags']) ? $form['tags'] : array()))) ? 'selected="selected"' : '');
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('number_of_article'); ?>"><?php echo __('Number of articles', kopa_get_domain()); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('number_of_article'); ?>" name="<?php echo $this->get_field_name('number_of_article'); ?>" type="number" value="<?php echo $form['number_of_article']; ?>" />

            </p>
            <p>
                <label for="<?php echo $this->get_field_id('orderby'); ?>"><?php echo __('Orderby:', kopa_get_domain()); ?></label>                
                <select class="widefat" id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" autocomplete="off">
                    <?php
                    $orderby = array(
                        'latest' => __('Latest', kopa_get_domain()),
                        'popular' => __('Popular by View Count', kopa_get_domain()),
                        'most_comment' => __('Popular by Comment Count', kopa_get_domain()),
                        'random' => __('Random', kopa_get_domain()),
                    );
                    foreach ($orderby as $value => $title) {
                        printf('<option value="%1$s" %3$s>%2$s</option>', $value, $title, ($value === $form['orderby']) ? 'selected="selected"' : '');
                    }
                    ?>
                </select>
            </p>
        </div>
        <div class="kopa-one-half last">
            <p>
                <label for="<?php echo $this->get_field_id('animation'); ?>"><?php echo __('Animation:', kopa_get_domain()); ?></label>                
                <select class="widefat" id="<?php echo $this->get_field_id('animation'); ?>" name="<?php echo $this->get_field_name('animation'); ?>" autocomplete="off" >
                    <?php
                    $relation = array(
                        'fade' => __('Fade', kopa_get_domain()),
                        'slide' => __('Slide', kopa_get_domain())
                    );
                    foreach ($relation as $value => $title) {
                        printf('<option id="%4$s" value="%1$s" %3$s >%2$s</option>', $value, $title, ($value === $form['animation']) ? 'selected="selected"' : '', $value);
                    }
                    ?>
                </select>
            </p>       
            <p>
                <label for="<?php echo $this->get_field_id('direction'); ?>"><?php echo __('Direction:', kopa_get_domain()); ?></label>                
                <select class="widefat" id="<?php echo $this->get_field_id('direction'); ?>" name="<?php echo $this->get_field_name('direction'); ?>" autocomplete="off">
                    <?php
                    $relation = array(
                        'horizontal' => __('Horizontal', kopa_get_domain()),
                    );
                    foreach ($relation as $value => $title) {
                        printf('<option value="%1$s" %3$s  >%2$s</option>', $value, $title, ($value === $form['direction']) ? 'selected="selected"' : '');
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('slideshowSpeed'); ?>"><?php echo __('Slideshow Speed (ms):', kopa_get_domain()); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('slideshowSpeed'); ?>" name="<?php echo $this->get_field_name('slideshowSpeed'); ?>" type="number" value="<?php echo $form['slideshowSpeed'] ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('animationSpeed'); ?>"><?php echo __('Animation Speed (ms):', kopa_get_domain()); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('animationSpeed'); ?>" name="<?php echo $this->get_field_name('animationSpeed'); ?>" type="number" value="<?php echo $form['animationSpeed'] ?>" />
            </p>

            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['isAutoplay'], 'true',true); ?> id="<?php echo $this->get_field_id('isAutoplay'); ?>" name="<?php echo $this->get_field_name('isAutoplay'); ?>" value="true" /> 
                <label for="<?php echo $this->get_field_id('isAutoplay'); ?>"><?php echo __('Auto play slider', kopa_get_domain()); ?> </label>
            </p>
        </div>
        <div class="kopa-clear"></div>
        <?php
    }

}
