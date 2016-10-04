<?php


///////////////////////////////////////////////////EVENTS///////////////////////////////////////////////////////////////
function nicdark_create_post_type_events() {
    register_post_type('our-events',
        array(
            'labels' => array(
                'name' => __('BK Events', 'nicdark-shortcodes'),
                'singular_name' => __('Events', 'nicdark-shortcodes')
            ),
            'public' => true,
            'has_archive' => true,
            'exclude_from_search' => true,
            'rewrite' => array('slug' => 'our-events'),
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
        )
    );
}
add_action('init', 'nicdark_create_post_type_events');

//add taxonomy
function nicdark_create_taxonomy_events() {
    register_taxonomy(
        'typology-event',
        'post',
        array(
            'label'=>__('TYPES', 'nicdark-shortcodes'),
            'rewrite'=>array('slug'=>'typologies-events'),
            'hierarchical'=>true
        )
    );
}
add_action('init','nicdark_create_taxonomy_events');

//add taxonomy to custom post
function nicdark_add_taxonomy_events(){ register_taxonomy_for_object_type('typology-event', 'our-events'); }
add_action('init', 'nicdark_add_taxonomy_events');

//remove taxonomy from menu
function nicdark_remove_taxonomy_events(){ remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=typology-event'); }
add_action('admin_menu','nicdark_remove_taxonomy_events');
