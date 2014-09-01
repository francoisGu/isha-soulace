<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class kopa_text_widget extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'kopa_widget_text widget_text', 'description' => __('Arbitrary text, HTML or shortcodes', kopa_get_domain()));
        $control_ops = array('width' => 600, 'height' => 400);
        parent::__construct('kopa_widget_text', __('Kopa Text', kopa_get_domain()), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $text = apply_filters('widget_text', empty($instance['text']) ? '' : $instance['text'], $instance);

        echo $before_widget;

        if ( !empty( $title ) ) {
            echo $before_title . $title . $after_title;
        } 
        ?>
        
        <?php echo !empty($instance['filter']) ? wpautop($text) : $text; ?>
        
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['title-icon'] = $new_instance['title-icon'];
        if (current_user_can('unfiltered_html')) {
            $instance['text'] = $new_instance['text'];
        } else {
            $instance['text'] = stripslashes(wp_filter_post_kses(addslashes($new_instance['text'])));
        }
        $instance['filter'] = isset($new_instance['filter']);

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
            'title'      => '', 
            'text'       => ''));
        $title = strip_tags($instance['title']);
        $text = esc_textarea($instance['text']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', kopa_get_domain()); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>  
        <ul class="kopa_shortcode_icons">
            <?php
            $shortcodes = array(
                'one_half'           => __( 'One Half Column', kopa_get_domain() ),
                'one_third'          => __( 'One Thirtd Column', kopa_get_domain() ),
                'two_third'          => __( 'Two Third Column', kopa_get_domain() ),
                'one_fourth'         => __( 'One Fourth Column', kopa_get_domain() ),
                'three_fourth'       => __( 'Three Fourth Column', kopa_get_domain() ),
                'dropcaps'           => __( 'Add Dropcaps Text', kopa_get_domain() ),
                'button'             => __( 'Add A Button', kopa_get_domain() ),
                'alert'              => __( 'Add A Alert Box', kopa_get_domain() ),
                'accordions'         => __( 'Add A Accordions Content', kopa_get_domain() ),
                'toggle'             => __( 'Add A Toggle Content', kopa_get_domain() ),
                'contact_form'       => __( 'Add A Contact Form', kopa_get_domain() ),
                'youtube'            => __( 'Add A Yoube Video Box', kopa_get_domain() ),
                'vimeo'              => __( 'Add A Vimeo Video Box', kopa_get_domain() ),
            );
            foreach ($shortcodes as $rel => $title):
                ?>
                <li>
                    <a onclick="return kopa_shortcode_icon_click('<?php echo $rel; ?>', jQuery('#<?php echo $this->get_field_id('text'); ?>'));" href="#" class="<?php echo "kopa-icon-{$rel}"; ?>" rel="<?php echo $rel; ?>" title="<?php echo $title; ?>"></a>
                </li>
            <?php endforeach; ?>
        </ul>        
        <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
        <p>
            <input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs', kopa_get_domain()); ?></label>
        </p>
        <?php
    }

}
