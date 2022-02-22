<?php

// Customizing Widgets

// function to remove the dashboard widgets, but only for non-admin users
// if you want to remove the widgets for admin(s) too, remove the 'if' statement within the function
function remove_dashboard_widgets()
{
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    if (!current_user_can('manage_options')) {
        remove_meta_box('dashboard_latest_comments', 'dashboard', 'normal');
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
        remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
        remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
        remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
        // remove_meta_box('dashboard_secondary', 'dashboard', 'side');
    }
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'k1_add_dashboard_widgets');

// Add a new widget to the dashboard using a custom function
function k1_add_dashboard_widgets()
{
    $theTitle =  get_bloginfo( 'name' );
    wp_add_dashboard_widget(
        'k1_dashboard_welcome_widget', // Widget slug
        'Welcome to ' . $theTitle, // Widget title
        'k1_dashboard_welcome_widget_function' // Function name to display the widget
    );
}
// Initialize the function to output the contents of your new dashboard widget
function k1_dashboard_welcome_widget_function()
{

    $first_name = get_user_meta(wp_get_current_user()->ID, 'first_name', true);
    $kj_email   = 'kj@kingdomone.co';

    if (!current_user_can('administrator')) {
        echo "Hey $first_name! Welcome to the Kingdom One site. If you have any troubles, questions, or dream features, be sure to reach out to KJ at <a href='mailto:$kj_email'>$kj_email</a>";
    } else {
        echo "<p>Hey there $first_name! Try not to break anything ;) </p> ";
    }

}