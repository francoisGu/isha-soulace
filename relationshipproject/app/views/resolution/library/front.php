<?php
add_action('after_setup_theme', 'kopa_front_after_setup_theme');

function kopa_front_after_setup_theme() {
    add_theme_support('post-formats', array('gallery', 'audio', 'video'));
    add_theme_support('post-thumbnails');
    add_theme_support('loop-pagination');
    add_theme_support('automatic-feed-links');
    add_theme_support('editor_style');
    add_editor_style('editor-style.css');


    register_nav_menus(array(
        'top-nav' => __('Top Menu', kopa_get_domain()),
        'main-nav' => __('Main Menu', kopa_get_domain()),
        'footer-nav' => __('Footer Menu', kopa_get_domain())
    ));

    if (!is_admin()) {
        add_filter('wp_title', 'kopa_wp_title', 10, 2);
        add_filter('widget_text', 'do_shortcode');
        add_action('wp_enqueue_scripts', 'kopa_front_enqueue_scripts');
        add_filter('body_class', 'kopa_body_class');
        add_action('wp_head', 'kopa_head');
        add_action('wp_head', 'kopa_ie_head');
        add_action('wp_footer', 'kopa_foot');
    } else {
        add_filter('image_size_names_choose', 'kopa_image_size_names_choose');
    }
    kopa_add_image_sizes();
    
    global $content_width;
    if ( ! isset( $content_width ) )
        $content_width = 806;
}

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @package Resolution
 * 
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function kopa_wp_title($title, $sep) {
    global $paged, $page;

    if (is_feed()) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo('name');

    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() )) {
        $title = "$title $sep $site_description";
    }

    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf(__('Page %s', kopa_get_domain()), max($paged, $page));
    }

    return $title;
}

function kopa_front_enqueue_scripts() {
    if (!is_admin()) {
        global $wp_styles, $is_IE;

        $dir = get_template_directory_uri();
        /* STYLESHEETs */
        wp_enqueue_style('kopa-google-font', 'http://fonts.googleapis.com/css?family=Oswald:400,300,700', array(), NULL);
        wp_enqueue_style('kopa-bootstrap', $dir . '/css/bootstrap.css', array(), NULL, 'screen');
        wp_enqueue_style('kopa-fontawesome', $dir . '/css/font-awesome.css', array(), NULL);
        wp_enqueue_style('kopa-superfish', $dir . '/css/superfish.css', array(), NULL, 'screen');
        wp_enqueue_style('kopa-flexlisder', $dir . '/css/flexslider.css', array(), NULL, 'screen');
        wp_enqueue_style('kopa-prettyPhoto', $dir . '/css/prettyPhoto.css', array(), NULL, 'screen');
        wp_enqueue_style('kopa-style', get_stylesheet_uri(), array(), NULL);
        wp_enqueue_style('kopa-responsive', $dir . '/css/responsive.css', array(), NULL);
        wp_enqueue_style('kopa-bootstrap-select', $dir . '/css/bootstrap-select.css', array(), NULL);
        wp_enqueue_style('kopa-extra-style', $dir . '/css/extra.css', array(), NULL);
        if ($is_IE) {
            wp_register_style('kopa-ie', $dir . '/css/ie.css', array(), NULL);
            $wp_styles->add_data('kopa-ie', 'conditional', 'lt IE 9');
            wp_enqueue_style('kopa-ie');
        }
        /* JAVASCRIPTs */

        wp_enqueue_script('jquery');
        wp_localize_script('jquery', 'kopa_front_variable', kopa_front_localize_script());
        wp_enqueue_script('kopa-superfish-js', $dir . '/js/superfish.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-retina', $dir . '/js/retina.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-bootstrap-js', $dir . '/js/bootstrap.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-bootstrapselect--js', $dir . '/js/bootstrap-select.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-flexlisder-js', $dir . '/js/jquery.flexslider-min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-carouFredSel-packed', $dir . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-prettyPhoto-js', $dir . '/js/jquery.prettyPhoto.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-jquery-validate', $dir . '/js/jquery.validate.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-jquery-form', $dir . '/js/jquery.form.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-jquery-mousewheel', $dir . '/js/jquery.mousewheel.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-modernizr-transitions', $dir . '/js/modernizr-transitions.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-jquery-masonry', $dir . '/js/jquery.masonry.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-jquery-isotope', $dir . '/js/jquery.isotope.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-tweetable-jquery', $dir . '/js/tweetable.jquery.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-jquery-timeago', $dir . '/js/jquery.timeago.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-jflickrfeed', $dir . '/js/jflickrfeed.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-classie', $dir . '/js/classie.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-uisearch', $dir . '/js/uisearch.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-jquery-exposure', $dir . '/js/jquery.exposure.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-jquery-elevatezoom', $dir . '/js/jquery.elevatezoom.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-set-view-count', $dir . '/js/set-view-count.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('kopa-custom', $dir . '/js/custom.js', array('jquery'), NULL, TRUE);
        if (is_single() || is_page()) {
            wp_enqueue_script('comment-reply');
        }
        wp_localize_script('kopa-custom', 'kopa_custom_front_localization', kopa_custom_front_localization());
    }
}   

function kopa_custom_front_localization(){
    $front_localization = array(
        'validate' => array(
            'form' => array(
                'submit'  => __('SUBMIT', kopa_get_domain()),
                'sending' => __('SENDING...', kopa_get_domain())
            ),
            'name' => array(
                'required'  => __('Please enter your name.', kopa_get_domain()),
                'minlength' => __('At least {0} characters required.', kopa_get_domain())
            ),
            'email' => array(
                'required' => __('Please enter your email.', kopa_get_domain()),
                'email'    => __('Please enter a valid email.', kopa_get_domain())
            ),
            'url' => array(
                'required' => __('Please enter your url.', kopa_get_domain()),
                'url'      => __('Please enter a valid url.', kopa_get_domain())
            ),
            'message' => array(
                'required'  => __('Please enter a message.', kopa_get_domain()),
                'minlength' => __('At least {0} characters required.', kopa_get_domain())
            )
        )
    );
    return $front_localization;
}

function kopa_front_localize_script() {
    $kopa_variable = array(
        'ajax' => array(
            'url' => admin_url('admin-ajax.php')
        ),
        'template' => array(
            'post_id' => (is_singular()) ? get_queried_object_id() : 0
        )
    );
    return $kopa_variable;
}

/* FUNCTION */

function kopa_get_image_sizes() {
    $sizes = array(
        'kopa-image-size-0' => array(810, 426, TRUE, __('Silder Image (Kopatheme)', kopa_get_domain())),
        'kopa-image-size-1' => array(80, 80, TRUE, __('Thumbnail small post (Kopatheme)', kopa_get_domain())),
        'kopa-image-size-2' => array(395, 237, TRUE, __('Big post thumbnail (Kopatheme)', kopa_get_domain())),
        'kopa-image-size-3' => array(100, 70, TRUE, __('Thumbnail small post (2) (Kopatheme)', kopa_get_domain())),
        'kopa-image-size-6' => array(256, 173, TRUE, __('related post thumbnails', kopa_get_domain())),
    );

    return apply_filters('kopa_get_image_sizes', $sizes);
}

function kopa_add_image_sizes() {
    $sizes = kopa_get_image_sizes();
    foreach ($sizes as $slug => $details) {
        add_image_size($slug, $details[0], $details[1], $details[2]);
    }
}

function kopa_image_size_names_choose($sizes) {
    $kopa_sizes = kopa_get_image_sizes();
    foreach ($kopa_sizes as $size => $image) {
        $width = ($image[0]) ? $image[0] : __('auto', kopa_get_domain());
        $height = ($image[1]) ? $image[1] : __('auto', kopa_get_domain());
        $sizes[$size] = $image[3] . " ({$width} x {$height})";
    }
    return $sizes;
}


function kopa_get_view_count($post_id) {
    $key = 'kopa_' . kopa_get_domain() . '_total_view';
    return kopa_get_post_meta($post_id, $key, true, 'Int');
}

function kopa_set_view_count($post_id) {
    $new_view_count = 0;
    $meta_key = 'kopa_' . kopa_get_domain() . '_total_view';

    $current_views = (int) get_post_meta($post_id, $meta_key, true);

    if ($current_views) {
        $new_view_count = $current_views + 1;
        update_post_meta($post_id, $meta_key, $new_view_count);
    } else {
        $new_view_count = 1;
        add_post_meta($post_id, $meta_key, $new_view_count);
    }
    return $new_view_count;
}

function kopa_breadcrumb() {
    $delimiter = '<span>&nbsp;/&nbsp;</span>';
    $name = __('Home', kopa_get_domain());
    $currentBefore = '<span class="current-page">';
    $currentAfter = '</span>';

    if (!is_home() || !is_front_page() || !is_paged()) {
        echo '<div class="breadcrumb clearfix">';

        global $post;
        $home = home_url();
        echo '<a href="' . $home . '"> ' . $name . '</a> ' . $delimiter . ' ';
        if (is_home()) {
            if (get_option('page_for_posts')) {
                echo $currentBefore . get_the_title(get_option('page_for_posts')) . $currentAfter;
            } else {
                echo $currentBefore . __('Blog', kopa_get_domain()) . $currentAfter;
            }
        } if (is_category()) {

            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0)
                echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $currentBefore;
            single_cat_title();
            echo $currentAfter;
        }elseif (is_single()) {

            $cat = get_the_category(); //$cat = $cat[0];
            $i = 1;
            foreach ($cat as $cat_i):
                if ($i < count($cat)) {
                    $i++;
                    echo get_category_parents($cat_i, TRUE, ', ');
                } else {
                    echo get_category_parents($cat_i, TRUE, ' ' . $delimiter . ' ');
                }
            endforeach;

            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_tag()) {

            echo $currentBefore;
            single_tag_title();
            echo $currentAfter;
        } elseif (is_page() && !$post->post_parent) {

            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_page() && $post->post_parent) {

            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb)
                echo $crumb . ' ' . $delimiter . ' ';
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_404()) {

            echo $currentBefore;
            echo ' 404 ';
            echo $currentAfter;
        }
        if (get_query_var('paged')) {

            echo $currentBefore . ' Page ' . get_query_var('paged') . $currentAfter;
        }

        echo '</div>';
    }
}

function kopa_get_related_articles() {
	
    if (is_single()) {
        $get_by = get_option('kopa_theme_options_post_related_get_by', 'post_tag');
        if ('hide' != $get_by) {
            $limit = (int) get_option('kopa_theme_options_post_related_limit', 6);
            if ($limit > 0) {
                global $post;
                $taxs = array();
                if ('category' == $get_by) {
                    $cats = get_the_category(($post->ID));
                    if ($cats) {
                        $ids = array();
                        foreach ($cats as $cat) {
                            $ids[] = $cat->term_id;
                        }
                        $taxs [] = array(
                            'taxonomy' => 'category',
                            'field' => 'id',
                            'terms' => $ids
                        );
                    }
                } else {
                    $tags = get_the_tags($post->ID);
                    if ($tags) {
                        $ids = array();
                        foreach ($tags as $tag) {
                            $ids[] = $tag->term_id;
                        }
                        $taxs [] = array(
                            'taxonomy' => 'post_tag',
                            'field' => 'id',
                            'terms' => $ids
                        );
                    }
                }
				
                if ($taxs) {
                    $related_args = array(
                        'tax_query' => $taxs,
                        'post__not_in' => array($post->ID),
                        'posts_per_page' => $limit
                    ); 
                    $related_posts = new WP_Query( $related_args );
					
                    if ( $related_posts->have_posts() ) { ?>
                    <div id="related-post">
                        <h4><?php _e( 'Related Articles', kopa_get_domain() ); ?></h4>
                        <div class="list-carousel responsive">
                            <ul class="related-post-carousel">
                    
                            <?php while ( $related_posts->have_posts() ) {
                                $related_posts->the_post();
                                ?>

                            <li>
                                <article class="entry-item clearfix">
                                    <div class="entry-thumb">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'kopa-image-size-6' ); ?></a>
                                    </div>
                                    <!-- entry-thumb -->
                                    <h6 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                </article>
                            </li>
                                
                            <?php } // endwhile ?>

                            </ul>

                            <div class="clearfix"></div>
                            <div id="pager2" class="carousel-pager clearfix"></div>
                        </div>
                    </div>

                        <?php
                    } // endif
                    wp_reset_postdata();
                }
            }
        }
    }
}


function kopa_get_template_setting() {
    $kopa_setting = get_option('kopa_setting');
    $setting = array();

    if (is_home()) {
        $setting = $kopa_setting['home'];
    } else if (is_archive()) {
        if (is_category() || is_tag()) {
            $setting = get_option("kopa_category_setting_" . get_queried_object_id(), $kopa_setting['taxonomy']);
        } else {
            $setting = get_option("kopa_category_setting_" . get_queried_object_id(), $kopa_setting['archive']);
        }
    } else if (is_singular()) {
        if (is_singular('post')) {
            $setting = get_option("kopa_post_setting_" . get_queried_object_id(), $kopa_setting['post']);
        } else if (is_page()) {

            $setting = get_option("kopa_page_setting_" . get_queried_object_id());
            if (!$setting) {
                if (is_front_page()) {
                    $setting = $kopa_setting['front-page'];
                } else {
                    $setting = $kopa_setting['page'];
                }
            }
        } else {
            $setting = $kopa_setting['post'];
        }
    } else if (is_404()) {
        $setting = $kopa_setting['_404'];
    } else if (is_search()) {
        $setting = $kopa_setting['search'];
    }

    return $setting;
}

function kopa_content_get_gallery($content, $enable_multi = false) {
    return kopa_content_get_media($content, $enable_multi, array('gallery'));
}

function kopa_content_get_video($content, $enable_multi = false) {
    return kopa_content_get_media($content, $enable_multi, array('vimeo', 'youtube'));
}

function kopa_content_get_audio($content, $enable_multi = false) {
    return kopa_content_get_media($content, $enable_multi, array('audio', 'soundcloud'));
}

function kopa_content_get_media($content, $enable_multi = false, $media_types = array()) {
    $media = array();
    $regex_matches = '';
    $regex_pattern = get_shortcode_regex();
    preg_match_all('/' . $regex_pattern . '/s', $content, $regex_matches);
    foreach ($regex_matches[0] as $shortcode) {
        $regex_matches_new = '';
        preg_match('/' . $regex_pattern . '/s', $shortcode, $regex_matches_new);

        if (in_array($regex_matches_new[2], $media_types)) :
            $media[] = array(
                'shortcode' => $regex_matches_new[0],
                'type' => $regex_matches_new[2],
                'url' => $regex_matches_new[5]
            );
            if (false == $enable_multi) {
                break;
            }
        endif;
    }

    return $media;
}

function kopa_content_get_gallery_attachment_ids($content) {
    $gallery = kopa_content_get_gallery($content);

    if (isset($gallery[0])) {
        $gallery = $gallery[0];
    } else {
        return '';
    }

    if (isset($gallery['shortcode'])) {
        $shortcode = $gallery['shortcode'];
    } else {
        return '';
    }

    // get gallery string ids
    preg_match_all('/ids=\"(?:\d+,*)+\"/', $shortcode, $gallery_string_ids);
    if (isset($gallery_string_ids[0][0])) {
        $gallery_string_ids = $gallery_string_ids[0][0];
    } else {
        return '';
    }

    // get array of image id
    preg_match_all('/\d+/', $gallery_string_ids, $gallery_ids);
    if (isset($gallery_ids[0])) {
        $gallery_ids = $gallery_ids[0];
    } else {
        return '';
    }

    return $gallery_ids;
}

function kopa_get_video_thumbnails_url($type, $url) {
    $thubnails = '';
    $matches = array();
    if ('youtube' === $type) {
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
        $file_url = "http://gdata.youtube.com/feeds/api/videos/" . $matches[0] . "?v=2&alt=jsonc";
        $results = wp_remote_get($file_url);

        if (!is_wp_error($results)) {
            $json = json_decode($results['body']);
            $thubnails = $json->data->thumbnail->hqDefault;
        }
    } else if ('vimeo' === $type) {
        preg_match_all('#(http://vimeo.com)/([0-9]+)#i', $url, $matches);
        $imgid = $matches[2][0];

        $results = wp_remote_get("http://vimeo.com/api/v2/video/$imgid.php");

        if (!is_wp_error($results)) {
            $hash = unserialize($results['body']);
            $thubnails = $hash[0]['thumbnail_large'];
        }
    }
    return $thubnails;
}

class kopa_main_menu extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output.= "\n$indent<ul class='sf-sub-menu'>";
    }

}

class kopa_mobile_menu extends Walker_Nav_Menu{
    function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat("\t", $depth) : '';

        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        
        if ($depth == 0)
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . ' clearfix"' : 'class="clearfix"';
        else 
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : 'class=""';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .=!empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .=!empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .=!empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        if ($depth == 0) {
            $item_output = $args->before;
            $item_output .= '<h3><a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a></h3>';
            $item_output .= $args->after;
        } else {
            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
        }
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        if ($depth == 0) {
            $output .= "\n$indent<span>+</span><div class='clearfix'></div><div class='menu-panel clearfix'><ul>";
        } else {
            $output .= '<ul>'; // indent for level 2, 3 ...
        } 
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        if ($depth == 0) {
            $output .= "$indent</ul></div>\n";
        } else {
            $output .= '</ul>';
        } 
    }

}

function kopa_pagination() {
    global $wp_query, $paged;
    $big = 99999;
    $total_pages = $wp_query->max_num_pages;    
    if (!$total_pages)                     
        $total_pages = 1;
    if (empty($paged))
        $paged = 1;
    if ($total_pages > 1) {
        echo '<div class="pagination clearfix">';
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $total_pages,
            'type' => 'list',
            'prev_next' => true,
            'prev_text' => __('Previous', kopa_get_domain()),
            'next_text' => __('Next', kopa_get_domain()),
        ));
        echo '</div>';
    }
}

/**
 * get the id of current post, page
 * @return id of current post, page
 */
function kopa_get_the_ID() {
    $queried_object = get_queried_object();
    return $queried_object->term_id;
}

//add_filter('body_class', '');


function kopa_body_class($class) {
    $kopa_setting = kopa_get_template_setting();
    if ($kopa_setting['layout_id'] == 'blog-left-sidebar') {
        $class[] = 'kp-right-sidebar';
    } elseif ($kopa_setting['layout_id'] == 'blog-right-sidebar') {
        $class[] = '';
    } elseif ($kopa_setting['layout_id'] == 'blog-no-sidebar' || $kopa_setting['layout_id'] == '404-page' ) {
        $class[] = 'kp-no-sidebar';
    }
    if (is_singular()) {
        if (get_post_format() == '') {
            $class[] = 'kp-single-standard';
        } elseif (get_post_format()) {
            $class[] = 'kp-single-' . get_post_format();
        }
    }
    return $class;
}

function add_contact_method($contactmethod) {
    $contactmethod['facebook'] = __( 'Facebook', kopa_get_domain() );
    $contactmethod['twitter'] = __( 'Twitter', kopa_get_domain() );
    $contactmethod['linkedin'] = __( 'LinkedIn', kopa_get_domain() );
    $contactmethod['google'] = __( 'Google+', kopa_get_domain() );
    return $contactmethod;
}

add_filter('user_contactmethods', 'add_contact_method', 10, 1);

function kopa_about_author() {

    $author_facebook_url = get_the_author_meta('facebook');
    $author_twitter_url = get_the_author_meta('twitter');
    $author_linkedin_url = get_the_author_meta('linkedin');
    $author_google_url = get_the_author_meta('google');
    ?>

    <div class="about-author clearfix">
        <h4><?php _e( 'About the author /', kopa_get_domain() ); ?></h4>
        <h5 class="author-name"><?php the_author_posts_link(); ?></h5>
        <br>                       
        <a class="avatar-thumb" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
            <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
        </a>
        <div class="author-content">
            <?php if ($author_facebook_url || $author_google_url || $author_linkedin_url || $author_twitter_url) { ?>
                <ul class="socials-link clearfix">
                    <?php if ($author_facebook_url) { ?>
                        <li class="facebook-icon"><a href="<?php echo esc_url( $author_facebook_url ); ?>" class="fa fa-facebook-square"></a></li>
                    <?php } ?>
                    <?php if ($author_twitter_url) { ?>
                        <li class="twitter-icon"><a href="<?php echo esc_url( $author_twitter_url ); ?>" class="fa fa-twitter-square"></a></li>
                    <?php } ?>
                    <?php if ($author_linkedin_url) { ?>
                        <li class="linkedin-icon"><a href="<?php echo esc_url( $author_linkedin_url ); ?>" class="fa fa-linkedin-square"></a></li>
                    <?php } ?>
                    <?php if ($author_google_url) { ?>
                        <li class="gplus-icon"><a href="<?php echo esc_url( $author_google_url ); ?>" class="fa fa-google-plus-square"></a></li>
                    <?php } ?>
                </ul>
            <?php } ?>
            <!-- social-links -->
            <p><?php the_author_meta('description'); ?></p>  
        </div><!--author-content-->
        <div class="clear"></div>
    </div>
    <!-- about-author -->
    <?php
}



function kopa_head() {
    // Logo margin
    $logo_style = '';
    $logo_top_margin = get_option('kopa_theme_options_logo_margin_top');
    $logo_bottom_margin = get_option('kopa_theme_options_logo_margin_bottom');
    $logo_left_margin = get_option('kopa_theme_options_logo_margin_left');
    $logo_right_margin = get_option('kopa_theme_options_logo_margin_right');
    $logo_margin = '';
    if ($logo_top_margin) {
        $logo_margin.='margin-top:'.$logo_top_margin.'px;';
    }
    if ($logo_bottom_margin) {
        $logo_margin.='margin-bottom:'.$logo_bottom_margin.'px;';
    }
    if ($logo_left_margin) {
        $logo_margin.='margin-left:'.$logo_left_margin.'px;';
    }
    if ($logo_right_margin) {
        $logo_margin.='margin-right:'.$logo_right_margin.'px;';
    }
    if($logo_margin){
        $logo_style.='#logo-image{'.$logo_margin.' }';
    }
     echo '<style type="text/css" id="kopa-theme-options-custom-styles">'.$logo_style.'</style>';
     
     if (get_option('kopa_theme_options_custom_css')) {
            ?>
            <style type="text/css" id='kopa-user-custom-css'>
    <?php echo get_option('kopa_theme_options_custom_css'); ?>
            </style>
            <?php
        }
        
}

function kopa_foot(){
    $kopa_theme_options_tracking_code = get_option('kopa_theme_options_tracking_code');
    if (!empty($kopa_theme_options_tracking_code)) {
        echo htmlspecialchars_decode(stripslashes($kopa_theme_options_tracking_code));
    }
    wp_nonce_field('kopa_set_view_count', 'kopa_set_view_count_wpnonce', false);
}

function kopa_ie_head(){
    echo '<!--[if lt IE 9]>
          <script src="'.esc_url(get_template_directory_uri().'/js/html5shiv.js').'"></script>
          <script src="'.esc_url(get_template_directory_uri().'/js/respond.min.js').'"></script>
          <script src="'.esc_url(get_template_directory_uri().'/js/css3-mediaqueries.js').'"></script>
          <script src="'.esc_url(get_template_directory_uri().'/js/PIE_IE678.js').'"></script>
          <style>
            .progress-bar,
            .progress {
                behavior: url('.esc_url(get_template_directory_uri()).'/js/PIE.htc);
            }
          </style>
         <![endif]-->';
}

function kopa_post_navigation(){
	$prev_post = get_previous_post(); 
    $next_post = get_next_post();
    ?>

    <footer class="clearfix">
        <?php if ( $prev_post ) { ?>
        <p class="prev-post pull-left clearfix">                        
            <a class="clearfix" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>"><span class="icon-arrow-left"></span><?php _e( 'Previous article', kopa_get_domain() ); ?></a>
            <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="article-title"><?php echo $prev_post->post_title; ?></a>
        </p>
        <?php } ?>

        <?php if ( $next_post ) { ?>
        <p class="next-post pull-right clearfix">
            <a class="clearfix" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php _e( 'Next article', kopa_get_domain() ); ?><span class="icon-arrow-right"></span></a>
            <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="article-title"><?php echo $next_post->post_title; ?></a>  
        </p>
        <?php } ?>
    </footer>

    <?php
}
