<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to Pro in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter('x_enqueue_parent_stylesheet', '__return_true');

// Additional Functions
// =============================================================================
// function to remove the dashboard widgets, but only for non-admin users
// if you want to remove the widgets for admin(s) too, remove the 'if' statement within the function

require get_theme_file_path('/inc/functions-partials/white-label-login.php');
require get_theme_file_path('/inc/functions-partials/custom-admin.php');
require get_theme_file_path('/inc/functions-partials/custom-json.php');
require get_theme_file_path('/inc/functions-partials/subscribers.php');

function child_enqueue_styles() {
    // enqueue child styles
    wp_enqueue_style('k1-styles', get_stylesheet_directory_uri() . '/build/index.css', array(), '2.0.0');
    wp_enqueue_script('k1-js', get_stylesheet_directory_uri() . '/build/index.js', array(), '2.0.0', true);
    wp_localize_script('k1-js', 'k1SiteData', array(
        'root_url' => get_site_url()
    ));
}
add_action('wp_enqueue_scripts', 'child_enqueue_styles');