<?php
/*
Plugin Name: Kopa Resolution Shortcodes
Plugin URI: http://kopatheme.com
Description: A plugin to generate shortcodes in the WordPress visual editor.
Version: 1.0
Author: Kopatheme
Author URI: http://kopatheme.com
License: GPLv2 or later
*/

function kopa_plugin_init() {
  load_plugin_textdomain( 'kopa-shortcodes', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
add_action('plugins_loaded', 'kopa_plugin_init');


/**
 * Shortcodes Defination
 */



/* SHORTCODE : ONE_HALF */

add_shortcode('one_half', 'kopa_shortcode_one_half');

function kopa_shortcode_one_half($atts, $content = null) {
    $atts = shortcode_atts(
            array(
        'last' => 'no',
            ), $atts);

    if ($atts['last'] == 'yes') {
        return '<div class="kopa-one-half last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    } else {
        return '<div class="kopa-one-half">' . do_shortcode($content) . '</div>';
    }
}

/* SHORTCODE : ONE_THIRD */

add_shortcode('one_third', 'kopa_shortcode_one_third');

function kopa_shortcode_one_third($atts, $content = null) {
    $atts = shortcode_atts(
            array(
        'last' => 'no',
            ), $atts);

    if ($atts['last'] == 'yes') {
        return '<div class="kopa-one-third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    } else {
        return '<div class="kopa-one-third">' . do_shortcode($content) . '</div>';
    }
}

add_shortcode('two_third', 'kopa_shortcode_two_third');

function kopa_shortcode_two_third($atts, $content = null) {
    $atts = shortcode_atts(
            array(
        'last' => 'no',
            ), $atts);

    if ($atts['last'] == 'yes') {
        return '<div class="kopa-two-third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    } else {
        return '<div class="kopa-two-third">' . do_shortcode($content) . '</div>';
    }
}

/* SHORTCODE : ONE_FOURTH */

add_shortcode('one_fourth', 'kopa_shortcode_one_fourth');

function kopa_shortcode_one_fourth($atts, $content = null) {
    $atts = shortcode_atts(
            array(
        'last' => 'no',
            ), $atts);

    if ($atts['last'] == 'yes') {
        return '<div class="kopa-one-fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    } else {
        return '<div class="kopa-one-fourth">' . do_shortcode($content) . '</div>';
    }
}

/* SHORTCODE : THREE_FOURTH */

add_shortcode('three_fourth', 'kopa_shortcode_three_fourth');

function kopa_shortcode_three_fourth($atts, $content = null) {
    $atts = shortcode_atts(
            array(
        'last' => 'no',
            ), $atts);

    if ($atts['last'] == 'yes') {
        return '<div class="kopa-three-fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    } else {
        return '<div class="kopa-three-fourth">' . do_shortcode($content) . '</div>';
    }
}


/* SHORTCODE : ACCORDIONS */

add_shortcode('accordions', 'kopa_shortcode_accordions');

function kopa_shortcode_accordions($atts, $content = null) {
    extract(shortcode_atts(array(), $atts));
    return '<div class="acc-wrapper">' . do_shortcode($content) . '</div>';
}


/* SHORTCODE : DROPCAPS */

add_shortcode('dropcaps', 'kopa_shortcode_dropcaps');

function kopa_shortcode_dropcaps($atts, $content = null) {
    $atts = shortcode_atts(array('round' => 'no'), $atts);
    return '<span class="kp-dropcap '.($atts['round'] === 'yes' ? 'radius' : '').'">' . do_shortcode($content) . '</span>';
}

/* SHORTCODE : BUTTON */

add_shortcode('button', 'kopa_shortcode_button');

function kopa_shortcode_button($atts, $content = null) {
    $atts = shortcode_atts( array(
  
        'size' => 'small',
        'link' => '',
        'target' => '_self',
        ), $atts);


    if (!in_array($atts['size'], array('small', 'medium', 'big'))) {
        $atts['size'] = 'small';
    }
    $out = sprintf('<a href="%1$s" class="kp-button %2$s-button" target="%3$s"><span>%4$s</span></a>', $atts['link'],  $atts['size'], $atts['target'], do_shortcode($content));
    return apply_filters('kopa_shortcode_button', $out);
}

/* SHORTCODE : ALERT */

add_shortcode('alert', 'kopa_shortcode_alert');

function kopa_shortcode_alert($atts, $content = null) {
    $atts = shortcode_atts(
            array(
        'type' => 'info',
        'title' => ''
            ), $atts);

    $class = '';

    if (!in_array($atts['type'], array('warning', 'danger', 'success', 'info'))) {
        $atts['type'] = 'info';
    }

    $out = "<div class='alert alert-{$atts['type']}'>";
    $out .= "<h4>{$atts['title']}</h4>";
    $out .= '<p>' . do_shortcode($content) . '</p>';
    $out .= "</div >";

    return $out;
}

/* SHORTCODE : CONTACT */
add_shortcode('contact_form', 'kopa_shortcode_contact_form');

function kopa_shortcode_contact_form($atts, $content = null) {
    $atts = shortcode_atts( array(
        'caption' => '',
        'description' =>''
        ), $atts );

    $out = '<div id="contact-box">';

    if ($atts['caption']) {
        $out .= "<h4><span class='title-line'></span><span class='title-text'>{$atts['caption']}</span></h4>";
    }

    $out .= '<form id ="contact-form" class="clearfix" action="' . admin_url('admin-ajax.php') . '" method="post">';
	$out .= '<span class="c-note">'.$atts['description'] .'</span>';
    $out .= '<div class="contact-left pull-left">
      <p class="input-block">
                                <label for="contact_name" class="required">'.__( 'Name', 'kopa-shortcodes' ).' <span>*</span></label>
                                <input type="text" value="Name *" onfocus="if(this.value==\'Name *\')this.value=\'\';" onblur="if(this.value==\'\')this.value=\'Name *\';"  id="contact_name" name="name" class="valid">
                            </p>
                            <p class="input-block">
                                <label for="contact_email" class="required">'.__( 'Email', 'kopa-shortcodes' ).' <span>*</span></label>
                                <input type="text" value="Email *" onfocus="if(this.value==\'Email *\')this.value=\'\';" onblur="if(this.value==\'\')this.value=\'Email *\';" id="contact_email" name="email" class="valid">
                            </p>
                            <p class="input-block">                                                
                                <label for="contact_url" class="required">'.__( 'Website', 'kopa-shortcodes' ).'</label>
                                <input type="text" name="url" class="valid" value="Website" onfocus="if(this.value==\'Website\')this.value=\'\';" onblur="if(this.value==\'\')this.value=\'Website\';" id="contact_url">                                                
                            </p>
    </div>
    <!-- pull-left -->
    <div class="contact-right pull-right">
                            <p class="textarea-block">                        
                                <label for="contact_message" class="required">'.__( 'Your message', 'kopa-shortcodes' ).' <span>*</span></label>
                                <textarea onfocus="if(this.value==\'Your message *\')this.value=\'\';" onblur="if(this.value==\'\')this.value=\'Your message *\';" name="message" id="contact_message" cols="88" rows="7"></textarea>
                            </p>
                        </div>
                        <!-- contact-right -->
                        <div class="clear"></div>

                        <p class="contact-button">                    
                            <span><input type="submit" value="Submit" id="submit-contact"></span>
                        </p>';


    $out .= '<input type="hidden" name="action" value="kopa_send_contact">';
    $out .= wp_nonce_field('kopa_send_contact_nicole_kidman', 'kopa_send_contact_nonce', true, false);

    $out .= '</form>';

    $out .= '<div id="response"></div>';

    $out .= '</div>';

    return $out;
}



add_shortcode('youtube', 'kopa_shortcode_youtube');

function kopa_shortcode_youtube($atts, $content = null) {
    $atts = shortcode_atts(array(), $atts);
    $out = '';
    if ($content) {
        $matches = array();
        preg_match('#(\.be/|/embed/|/v/|/watch\?v=)([A-Za-z0-9_-]{5,11})#', $content, $matches);
        if (isset($matches[2]) && $matches[2] != '') {
            $out .= '<div class="video-wrapper"><iframe src="http://www.youtube.com/embed/' . $matches[2] . '" width="560" height="315" frameborder="0" allowfullscreen></iframe></div>';
        }
    }

    return $out;
}

add_shortcode('vimeo', 'kopa_shortcode_vimeo');

function kopa_shortcode_vimeo($atts, $content = null) {
    $atts = shortcode_atts(array(), $atts);
    $out = '';
    if ($content) {
        $matches = array();
        preg_match('/(\d+)/', $content, $matches);
        if (isset($matches[0]) && $matches[0] != '') {
            $out .= '<div class="video-wrapper"><iframe src="http://player.vimeo.com/video/' . $matches[0] . '" width="560" height="315" frameborder="0" allowfullscreen></iframe></div>';
        }
    }
    return $out;
}

add_shortcode('google_map', 'kopa_shortcode_google_map');

function kopa_shortcode_google_map($atts, $content = null) {
    $atts = shortcode_atts(array(
        'caption' => ''
            ), $atts);

    $out = '<div class="kp-map">';
    if ($atts['caption'])
        $out .= '<h4 class="widget-title">' . $atts['caption'] . '</h4>';
    $out .= $content . '</div>';

    return $out;
}



add_shortcode('soundcloud', 'kopa_shortcode_soundcloud');

function kopa_shortcode_soundcloud($atts, $content = null) {
    $atts = shortcode_atts(array(), $atts);
    $out = '';

    if ($content) {
        $out = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.esc_attr( urlencode( $content ) ).'"></iframe>';
    }
    return $out;
}

add_action('init', 'kopa_shortcode_add_button');

function kopa_shortcode_add_button() {
    if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
        add_filter('mce_external_plugins', 'kopa_add_plugin');
        add_filter('mce_buttons_3', 'kopa_register_button');
    }
}

function kopa_add_plugin($plugin_array) {
    $plugin_array['one_half'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/one_half.js';
    $plugin_array['one_third'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/one_third.js';
    $plugin_array['two_third'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/two_third.js';
    $plugin_array['one_fourth'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/one_fourth.js';
    $plugin_array['three_fourth'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/three_fourth.js';
    $plugin_array['dropcaps'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/dropcaps.js';
    $plugin_array['button'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/button.js';
    $plugin_array['alert'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/alert.js';
    $plugin_array['contact_form'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/contact_form.js';
    $plugin_array['google_map'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/google_map.js';
    $plugin_array['youtube'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/youtube.js';
    $plugin_array['vimeo'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/vimeo.js';
    $plugin_array['audio'] = plugins_url( 'js/shortcodes', __FILE__ ) . '/audio.js';

    return $plugin_array;
}

function kopa_register_button($buttons) {
    array_push($buttons, 'one_half');
    array_push($buttons, 'one_third');
    array_push($buttons, 'two_third');
    array_push($buttons, 'one_fourth');
    array_push($buttons, 'three_fourth');
    array_push($buttons, 'dropcaps');
    array_push($buttons, 'button');
    array_push($buttons, 'alert');
    array_push($buttons, 'contact_form');
    array_push($buttons, 'google_map');
    array_push($buttons, 'youtube');
    array_push($buttons, 'vimeo');
    array_push($buttons, 'audio');

    return $buttons;
}