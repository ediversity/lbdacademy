<?php


///////////////////////////////////////////////////EXCURSIONS///////////////////////////////////////////////////////////////
function nicdark_create_post_type_excursions() {
    register_post_type('excursions',
        array(
            'labels' => array(
                'name' => __('BK Excursions', 'nicdark-shortcodes'),
                'singular_name' => __('Excursion', 'nicdark-shortcodes')
            ),
            'public' => true,
            'has_archive' => true,
            'exclude_from_search' => true,
            'rewrite' => array('slug' => 'excursions'),
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
        )
    );
}
add_action('init', 'nicdark_create_post_type_excursions');

//add taxonomy
function nicdark_create_taxonomy_excursions() {
    register_taxonomy(
        'typology-excursion',
        'post',
        array(
            'label'=>__('CATEGORIES', 'nicdark-shortcodes'),
            'rewrite'=>array('slug'=>'typologies-excursions'),
            'hierarchical'=>true
        )
    );
}
add_action('init','nicdark_create_taxonomy_excursions');

//add taxonomy to custom post
function nicdark_add_taxonomy_excursions(){ register_taxonomy_for_object_type('typology-excursion', 'excursions'); }
add_action('init', 'nicdark_add_taxonomy_excursions');

//remove taxonomy from menu
function nicdark_remove_taxonomy_excursions(){ remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=typology-excursion'); }
add_action('admin_menu','nicdark_remove_taxonomy_excursions');