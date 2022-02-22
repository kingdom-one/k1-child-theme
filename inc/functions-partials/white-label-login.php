<?php
// Customize Login Screen

add_action('login_enqueue_scripts', 'ourLoginCSS');
function ourLoginCSS() {
    wp_enqueue_style('pro-child', get_theme_file_uri() . ('/css/dist/login.min.css'));
};

add_filter('login_headertitle', 'theLoginTitle');
function theLoginTitle() {
    return get_bloginfo('name');
}
add_filter('login_headerurl', 'ourHeaderUrl');
function ourHeaderUrl() {
    return esc_url(site_url('/'));
};