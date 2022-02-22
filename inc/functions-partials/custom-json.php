<?php // Custom Rest API
function k1_custom_rest()
{
    register_rest_field('page', 'authorName', array(
        'get_callback' => function () {return 'Wow';},
    ));
};
add_action('rest_api_init', 'k1_custom_rest');