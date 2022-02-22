<?php
// Redirect Subscriber Accounts

add_action(('admin_init'), 'redirectSubstoFrontEnd');

function redirectSubstoFrontEnd()
{
    $currentUser = wp_get_current_user();
    if (count($currentUser->roles) == 1 and $currentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
    ;
};

add_action('wp_loaded', 'noAdminBarSubs');

function noAdminBarSubs()
{
    $currentUser = wp_get_current_user();
    if (count($currentUser->roles) == 1 and $currentUser->roles[0] == 'subscriber') {
        show_admin_bar(false);
    }
    ;
};