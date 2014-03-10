<?php
add_action('init', 'cutback_setup');

function cutback_setup() {

    # REMOVES THE VERSION NUMBERS OF WORDPRESS AND ANY CSS / JS FILES #
    add_filter('style_loader_src', 'at_remove_wp_ver_css_js', 9999);
    add_filter('script_loader_src', 'at_remove_wp_ver_css_js', 9999);

    add_filter('login_errors', 'failed_login');
    remove_action('wp_head', 'wp_generator');

    add_theme_support('post-thumbnails');
    wp_register_script('share', get_bloginfo('template_url').'/js/share.js', 'jquery');
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('share');
}

function at_remove_wp_ver_css_js($src) {
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

function failed_login() {
    return 'Login Unsuccessful';
}

add_filter('wp_title', 'baw_hack_wp_title_for_home');
function baw_hack_wp_title_for_home($title) {
    if (empty($title) && (is_home() || is_front_page())) {
        return __(get_bloginfo('site_name'), 'theme_domain') . ' | ' . get_bloginfo('description');
    }
    return $title;
}

/* ================================================================================================================================
 *
 * CUSTOM IMAGES SIZES
 *
 * ================================================================================================================================ */

add_image_size('background-image', 1910, 9999);

add_image_size('feature-image', 362, 151, true);

add_filter('jpeg_quality', 'compress_jpeg');
function compress_jpeg($quality) {
    $quality = 68;
    return $quality;
}

/* ================================================================================================================================ */

/* ================================================================================================================================
 *
 * REGISTER NAV MENUS
 *
 * ================================================================================================================================ */

register_nav_menus(array('main-menu' => 'Main Menu'));

/* ================================================================================================================================
 *
 * REGISTER SIDEBARS / WIDGETS
 *
 * ================================================================================================================================ */

/* ================================================================================================================================
 *
 * MY FUNCTIONS
 *
 * ================================================================================================================================ */

function bg_image($post_id) {
    $bg_image = '';
    if (get_field('bg-image', $post_id)) {

        $att_id = get_field('bg-image', $post_id);
        $image = wp_get_attachment_image_src($att_id, 'background-image');

        $bg_image = ' style="background-image: url(\'' . $image[0] . '\');"';
    } else {

        $page = get_page_by_path('home');
        $att_id = get_field('bg-image', $page);
        $image = wp_get_attachment_image_src($att_id, 'background-image');
        $bg_image = ' style="background-image: url(\'' . $image[0] . '\');"';
    }
    echo $bg_image;
}

function get_tagline() {

    $tagline = '';

    $page = get_page_by_path('home');

    if (get_field('tagline', $page -> ID)) {
        $tagline = strtoupper(get_field('tagline', $page -> ID));
        $tagline = str_replace('&', '&amp;', $tagline);
        $tagline = nl2br($tagline);
    }
    echo $tagline;
}

function nav_social() {
    $str = '<div class="sn-links">
        <a href="https://' . get_field('facebook', 47) . '" class="icon-facebook"></a>
        <a href="https://' . get_field('twitter', 47) . '" class="icon-twitter"></a>
        <a href="mailto:' . get_field('email', 47) . '" class="icon-email"></a>
    </div>';
    return $str;
}

function image_credits($post_id) {

    $str = '<aside class="image-credits post-' . $post_id . '-credits">';

    if (get_field('photo_by', $post_id)) {
        $str .= '<div><h4>PHOTO BY</h4>';
        $str .= '<p>' . ucwords(get_field('photo_by', $post_id)) . '</p></div>';
    }

    if (get_field('work_of', $post_id)) {
        $str .= '<div><h4>WORK OF</h4>';
        $str .= '<p>' . ucwords(get_field('work_of', $post_id)) . '</p></div>';
    }

    $str .= '</aside>';

    return $str;
}

function is_tree($pid) {// $pid = The ID of the page we're looking for pages underneath
    global $post;
    // load details about this page
    if (is_page() && ($post -> post_parent == $pid || is_page($pid)))
        return true;
    // we're at the page or at a sub page
    else
        return false;
    // we're elsewhere
};

add_filter('enter_title_here', 'enter_title_text', 10, 2);

function enter_title_text() {
    return 'Ensure the title is less than 28 characters';
}

function share_icons($post) {
    global $post;
    
    return '<div id="share"><a href="#" class="share-links"><span class="share">SHARE</span><span class="icon-share"></span></a>
            <div class="fb-share-button" data-href="'.get_permalink($post->ID).'" data-type="button"></div>
            </div>';
}

add_shortcode('share-icons', 'share_icons');

